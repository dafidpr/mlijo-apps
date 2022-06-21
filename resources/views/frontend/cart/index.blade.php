   @extends('frontend.layouts.app')
   @section('breadcrumb')
       <div class="page-header breadcrumb-wrap">
           <div class="container">
               <div class="breadcrumb">
                   <a href="{{ route('frontend.home') }}" rel="nofollow">
                       <i class="fi-rs-home mr-5"></i>
                       Home
                   </a>
                   <span></span> Keranjang
               </div>
           </div>
       </div>
   @endsection
   @section('content')
       <form method="post" action="{{ route('frontend.carts.chechout') }}" data-request="ajax">
           <div class="container mb-80 mt-50">
               <div class="row">
                   <div class="col-lg-8 mb-40">
                       <h1 class="heading-2 mb-10">Keranjang Kamu</h1>
                       <div class="d-flex justify-content-between">
                           <h6 class="text-body">Kamu mempunyai <span
                                   class="text-brand">{{ count(getCart(true, 0, false)) }}</span> produk dalam keranjang
                           </h6>
                           <h6 class="text-body"><a href="#" class="text-muted"><i
                                       class="fi-rs-trash mr-5"></i>Bersihkan
                                   Keranjang</a></h6>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-8">
                       <div class="table-responsive shopping-summery">
                           <table class="table table-wishlist">
                               <thead>
                                   <tr class="main-heading">
                                       <th class="custome-checkbox start pl-30">
                                           {{-- <input class="form-check-input" type="checkbox" name="checkbox"
                                           id="exampleCheckbox11" value="">
                                       <label class="form-check-label" for="exampleCheckbox11"></label> --}}
                                       </th>
                                       <th scope="col" colspan="2">Produk</th>
                                       <th scope="col">Harga</th>
                                       <th scope="col">Jumlah</th>
                                       <th scope="col">Subtotal</th>
                                       <th scope="col" class="end">Hapus</th>
                                   </tr>
                               </thead>

                               <tbody>
                                   @if (count(getCart(true, 0, false)) > 0)
                                       @foreach (getCart(true, 0, false) as $item)
                                           <input type="hidden"name="product[]" value="{{ $item->product->hashid }}">
                                           <input type="hidden"name="qty[]" value="{{ $item->quantity }}">
                                           <tr class="pt-30">
                                               <td class="custome-checkbox pl-30">
                                                   {{-- <input class="form-check-input" type="checkbox" name="checkbox"
                                                   id="exampleCheckbox1" value="">
                                               <label class="form-check-label" for="exampleCheckbox1"></label> --}}
                                               </td>
                                               <td class="image product-thumbnail pt-40"><img
                                                       src="{{ asset('storage/images/products/' . $item->product->thumbnail) }}"
                                                       alt="#">
                                               </td>
                                               <td class="product-des product-name">
                                                   <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                           href="{{ route('frontend.product', $item->product->slug) }}">{{ $item->product->name }}
                                                       </a>
                                                   </h6>
                                                   <div class="product-rate-cover">
                                                       <input type="hidden" name="notes" id="notes"
                                                           value="{{ $item->notes }}">
                                                       <span class="font-small ml-5 text-muted"> {{ $item->notes }}</span>
                                                   </div>
                                               </td>
                                               <td class="price" data-title="Price" id="price-{{ $item->hashid }}"
                                                   data-price="{{ $item->product->price }}">
                                                   <h5 class="text-body">Rp{{ number_format($item->product->price) }}
                                                   </h5>
                                               </td>
                                               <td class="text-center detail-info" data-title="Stock">
                                                   <div class="detail-extralink mr-15">
                                                       <div class="detail-qty border radius">
                                                           <a href="#" class="qty-down qty-bt"
                                                               data-id="{{ $item->hashid }}"><i
                                                                   class="fi-rs-angle-small-down"></i></a>
                                                           <span
                                                               class="qty-val qty-{{ $item->hashid }}">{{ $item->quantity }}</span>
                                                           <a href="#" class="qty-up qty-bt"
                                                               data-id="{{ $item->hashid }}"><i
                                                                   class="fi-rs-angle-small-up"></i></a>
                                                       </div>
                                                   </div>
                                               </td>
                                               <td class="price" data-title="Price">
                                                   <h5 class="text-brand" id="subtotal-{{ $item->hashid }}">Rp
                                                       {{ number_format($item->product->price * $item->quantity) }} </h5>
                                               </td>
                                               <td class="action text-center" data-title="Remove"><a
                                                       onclick="deleteItem('{{ $item->hashid }}', true)" href="#"
                                                       class="text-body"><i class="fi-rs-trash"></i></a></td>
                                           </tr>
                                       @endforeach
                                   @else
                                       <tr>
                                           <td colspan="7">
                                               <img src="{{ asset('storage/images/themes/illustrations/empty.svg') }}"
                                                   style="max-width: 220px;border:0;  display: block;margin-left: auto;margin-right: auto;"
                                                   alt="">
                                               <h4 style="text-align: center; padding:10px">Opps! Keranjang kamu masih
                                                   kosong
                                               </h4>
                                           </td>
                                       </tr>
                                   @endif
                               </tbody>
                           </table>
                       </div>
                       <div class="divider-2 mb-30"></div>
                       <div class="cart-action d-flex justify-content-between">
                           <a class="btn" href="{{ route('frontend.home') }}"><i
                                   class="fi-rs-arrow-left mr-10"></i>Lanjut
                               Belanja</a>
                       </div>
                       <div class="row mt-50">
                           <div class="col-lg-7">
                               <div class="calculate-shiping p-40 border-radius-15 border">
                                   <h4 class="mb-10">Estimasi Pengiriman</h4>

                                   <form class="field_form shipping_calculator">
                                       <div class="form-row">
                                           <div class="card mb-3 p-2">
                                               <div class="card-body">
                                                   <div class="vendor-info mb-15">
                                                       <ul class="font-sm">
                                                           <li>
                                                               <h6 class="mb-1">Alamat</h6>
                                                               <strong>{{ $customerAddress->name }}
                                                                   ({{ $customerAddress->phone_number }}) </strong><br>
                                                               <span>{{ $customerAddress->address }}</span><br>
                                                               <span>{{ $customerAddress->district }},
                                                                   {{ $customerAddress->city }},
                                                                   {{ $customerAddress->province }}
                                                                   {{ $customerAddress->postal_code }}</span><br>
                                                           </li>
                                                       </ul>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="form-group col-lg-12">
                                               <div class="custom_select">
                                                   <select class="form-control select-active w-100" name="shipping"
                                                       id="shipping" required style="width: 100% !important">
                                                       <option value="">Pilih Kurir</option>
                                                       @foreach ($rates['pricing'] as $item)
                                                           <option
                                                               value="{{ $item['courier_code'] }}-{{ $item['price'] }}">
                                                               {{ $item['courier_name'] . ' ' . $item['courier_service_name'] . ' (' . $item['shipment_duration_range'] . ' hari) - Rp' . number_format($item['price']) }}
                                                           </option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="divider-2 mt-10 mb-10"></div>
                                       <div class="mt-5">
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <h6 class="mb-0">Ongkos Kirim</h6>
                                               </div>
                                               <div class="col-md-6">
                                                   <h6 class="mb-0 text-warning" id="shipping_total"
                                                       style="text-align: right !important">Rp0</h6>

                                               </div>
                                           </div>
                                       </div>
                                   </form>
                               </div>
                           </div>
                           <div class="col-lg-5">
                               <div class="calculate-shiping p-40 border-radius-15 border">
                                   <h4 class="mb-10">Metode Pembayaran</h4>

                                   <form class="field_form shipping_calculator">
                                       <div class="form-row">
                                           <div class="form-group col-lg-12">
                                               <div class="custom_select">
                                                   <select class="form-control select-active w-100" name="bank_account"
                                                       required>
                                                       <option value="">Pilih Metode Pembayaran</option>
                                                       @foreach ($bankAccount as $item)
                                                           <option value="{{ $item->hashid }}">{{ $item->name }}
                                                               ({{ $item->account_number }})
                                                           </option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                           </div>
                                       </div>

                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-4">
                       <div class="border p-md-4 cart-totals ml-30">
                           <div class="table-responsive">
                               <table class="table no-border">
                                   <tbody>
                                       <tr>
                                           <td class="cart_total_label">
                                               <h6 class="text-muted">Subtotal</h6>
                                           </td>
                                           <td class="cart_total_amount">
                                               <h4 class="text-brand text-end">Rp
                                                   {{ number_format(count(getCart(true, 0, false)) > 0 ? getCart(true, 0, true) : 0) }}
                                               </h4>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td scope="col" colspan="2">
                                               <div class="divider-2 mt-10 mb-10"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td class="cart_total_label">
                                               <h6 class="text-muted">Shipping</h6>
                                           </td>
                                           <td class="cart_total_amount">
                                               <h5 class="text-heading text-end" id="shippment-total-checkout">Rp0</h5
                                                   </td>
                                       </tr>
                                       <tr>
                                           <td class="cart_total_label">
                                               <h6 class="text-muted">Pengiriman</h6>
                                           </td>
                                           <td class="cart_total_amount">
                                               <h5 class="text-heading text-end">{{ $customerAddress->city }}</h5>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td class="cart_total_label">
                                               <h6 class="text-muted">Kode Unik</h6>
                                           </td>
                                           <td class="cart_total_amount">
                                               <input type="hidden" name="unique_code" id="unique-code"
                                                   value="{{ $uniqueCode }}">
                                               <h5 class="text-heading text-end">{{ $uniqueCode }}</h5>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td scope="col" colspan="2">
                                               <div class="divider-2 mt-10 mb-10"></div>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td class="cart_total_label">
                                               <h6 class="text-muted">Total</h6>
                                           </td>
                                           <td class="cart_total_amount">
                                               <input type="hidden" name="subtotal" id="subtotal"
                                                   value="{{ count(getCart(true, 0, false)) > 0 ? getCart(true, 0, true) : 0 }}">
                                               <h4 class="text-brand text-end" id="cart-subtotal">
                                                   Rp
                                                   {{ number_format(count(getCart(true, 0, false)) > 0 ? getCart(true, 0, true) + $uniqueCode : 0) }}
                                               </h4>
                                           </td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>
                           <button type="submit" class="btn mb-20 w-100">Checkout<i
                                   class="fi-rs-sign-out ml-15"></i></button>
                       </div>
                   </div>
               </div>
           </div>
       </form>
   @endsection
