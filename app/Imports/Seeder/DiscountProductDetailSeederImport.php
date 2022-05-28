<?php

namespace App\Imports\Seeder;

use App\Models\DiscountProduct;
use App\Models\DiscountProductDetail;
use App\Models\ProductVariantDetail;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DiscountProductDetailSeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $data = [];
        foreach ($collection as $key => $value) {
            $discountProduct = DiscountProduct::with('product')->where('id', $value['id_diskon_produk'])
                ->first();
            $data[] = [
                'discount_product_id' => $value['id_diskon_produk'],
                'product_variant_detail_id' => $value['id_detail_variasi'],
                'starting_price' => $discountProduct->product->price,
                'price_discount' => $discountProduct->product->price - ($discountProduct->product->price * $value['presentase'] / 100),
                'discount_percent' => $value['presentase'],
                'quantity' => $value['jumlah'],
            ];
            if ($value['id_detail_variasi'] != null) {
                $detailVariant = ProductVariantDetail::where('id', $value['id_detail_variasi'])->first();
                $data[$key]['starting_price'] = $detailVariant->price;
                $data[$key]['price_discount'] = $detailVariant->price - ($detailVariant->price * $value['presentase'] / 100);
            }
        }
        DiscountProductDetail::insert($data);
    }
}
