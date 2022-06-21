<?php

namespace App\Http\Controllers\Web\Frontend\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderDetail;
use App\Models\OrderTracking;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Seller;
use App\Models\SellerShipping;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Vinkla\Hashids\Facades\Hashids;

class CartController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Keranjang',
            'rates' => $this->getCouriers(),
            'customerAddress' => auth()->user()->userable->address[0],
            'bankAccount' => PaymentMethod::where('is_active', true)->get(),
            'uniqueCode' => rand(pow(10, 3 - 1), pow(10, 3) - 1)

        ];

        return view('frontend.cart.index', $data);
    }

    private function getCouriers()
    {
        $cart = Cart::where(['customer_id' => auth()->user()->userable->id, 'is_checkout' => false])->with(['product.seller.address', 'customer.address']);
        $shippings = SellerShipping::where(['seller_id' => $cart->first()->product->seller->id])->with('shipping')->get();
        $shippingCodes = '';

        foreach ($shippings as $item) {
            $shippingCodes != "" && $shippingCodes .= ",";
            $shippingCodes .= $item->shipping->code;
        }
        $products = [];
        foreach ($cart->get() as $p) {
            $products[] = [
                "name" => $p->product->name,
                "description" => $p->product->description,
                "length" => $p->product->long_size,
                "width" => $p->product->width_size,
                "height" => $p->product->height_size,
                "weight" => $p->product->weight,
                "quantity" => $p->quantity,
                "value" => $p->quantity * $p->product->price,
            ];
        }

        $getCouriers = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => env('SHIPPING_API_KEY'),
        ])->post(env('SHIPPING_API_URL') . 'rates/couriers', [
            "origin_postal_code" => $cart->first()->product->seller->address[0]->postal_code,
            "destination_postal_code" => $cart->first()->customer->address[0]->postal_code,
            "couriers" => $shippingCodes,
            "items" => $products
        ]);
        return $getCouriers->json();
    }

    public function addCart(Request $request)
    {
        try {
            if (auth()->user()) {
                $product = Product::find(Hashids::decode($request->id)[0]);
                Cart::create([
                    'customer_id' => auth()->user()->userable->id,
                    'product_id' => $product->id,
                    'quantity' => $request->quantity != "" ? $request->quantity : $product->min_order,
                    'notes' => $request->notes != "" ? $request->notes : '',
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produk berhasil ditambahkan ke keranjang',
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Silahkan login terlebih dahulu',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function destroy(Cart $cart)
    {
        try {
            if (auth()->user()) {
                $cart->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produk berhasil dihapus dari keranjang',
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Silahkan login terlebih dahulu',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function getCart()
    {
        $carts = [];
        if (auth()->user() && (auth()->user()->roles[0]->name == 'Customer')) {
            $customer = auth()->user()->userable;
            $carts = Cart::where(['customer_id' => $customer->id, 'is_checkout' => false])->with('product')->orderBy('id', 'desc');
            $total = 0;
            foreach ($carts->get() as $key => $value) {
                $total += $value->product->price * $value->quantity;
            };
        }
        return response()->json([
            'status' => 'success',
            'data' => $carts->take(2)->get(),
            'total' => $total,
            'count' => $carts->count(),
        ]);
    }

    public function checkout(Request $request)
    {
        try {
            DB::beginTransaction();
            $cart = Cart::where(['customer_id' => auth()->user()->userable->id])->with('product.seller')->first();
            $request->merge([
                'shipping_code' => explode('-', $request->shipping)[0],
                'shipping_price' => explode('-', $request->shipping)[1],
            ]);
            $shipping = Shipping::where(['code' => $request->shipping_code])->first();
            return dd($request->all());
            $order = Order::create([
                'customer_id' => auth()->user()->userable->id,
                'shipping_id' => $shipping->id,
                'seller_id' => $cart->product->seller->id,
                'payment_method_id' => $request->bank_account,
                'order_code' => $this->generateOrderCode(),
                'receipt_number' => null,
                'proof_of_payment' => null,
                'payment_date' => null,
                'unique_code' => $request->unique_code,
                'payment_status' => 'pending',
                'shipping_total' => $request->shipping_price,
                'discount_total' => 0,
                'status_order' => 'pending',
                'created_at' => Carbon::now()
            ]);
            foreach ($request->product as $key => $p) {
                $product = Product::find(Hashids::decode($p)[0]);
                $orderDetail = OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'discount_product_detail_id' => null,
                    'variant' => null,
                    'price' => $product->price,
                    'quantity' => $request->qty[$key],
                    'discount' => 0,
                    'total' => $product->price * $request->qty[$key],
                    'notes' => $request->notes[$key],
                    'created_at' => Carbon::now()
                ]);
            }

            OrderTracking::create([
                'order_id' => $order->id,
                'status_order' => 'pending',
                'description' => 'Transaksi Berhasil Dibuat',
                'created_at' => Carbon::now()

            ]);

            OrderAddress::create([
                'order_id' => $order->id,
                'customer_phone_number' => auth()->user()->userable->phone_number,
                'province' => auth()->user()->userable->address[0]->province,
                'city' => auth()->user()->userable->address[0]->city,
                'district' => auth()->user()->userable->address[0]->district,
                'postal_code' => auth()->user()->userable->address[0]->postal_code,
                'address' => auth()->user()->userable->address[0]->address,
                'created_at' => Carbon::now()
            ]);
            $cart->update(['is_checkout' => false]);
            DB::commit();
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    private function generateOrderCode()
    {
        $lastOrder = Order::whereDate('created_at', Carbon::today())->orderBy('created_at', 'DESC')->first();
        $number = $lastOrder ? substr($lastOrder->transaction_code, -4) + 1 : 1;

        return 'INV' . date('Ymd') . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}
