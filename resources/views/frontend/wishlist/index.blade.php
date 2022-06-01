   @extends('frontend.layouts.app')
   @section('breadcrumb')
       <div class="page-header breadcrumb-wrap">
           <div class="container">
               <div class="breadcrumb">
                   <a href="{{ route('frontend.home') }}" rel="nofollow">
                       <i class="fi-rs-home mr-5"></i>
                       Home
                   </a>
                   <span></span> Wishlist
               </div>
           </div>
       </div>
   @endsection
   @section('content')
       <div class="container mb-30 mt-50">
           <div class="row">
               <div class="col-xl-10 col-lg-12 m-auto">
                   <div class="mb-50">
                       <h1 class="heading-2 mb-10">Wishlist Kamu</h1>
                       <h6 class="text-body">Kamu mempunyai <span
                               class="text-brand">{{ count(getWishlist(true)) }}</span> produk dalam list.</h6>
                   </div>
                   <div class="table-responsive shopping-summery">
                       <table class="table table-wishlist">
                           <thead>
                               <tr class="main-heading">
                                   <th class="custome-checkbox start pl-30">
                                       No
                                   </th>
                                   <th scope="col" colspan="2">Produk</th>
                                   <th scope="col">Harga</th>
                                   <th scope="col">Status Stok</th>
                                   <th scope="col">Aksi</th>
                                   <th scope="col" class="end">Hapus</th>
                               </tr>
                           </thead>
                           <tbody>
                               @if (count(getWishlist(true)) > 0)
                                   @foreach (getWishlist(true) as $item)
                                       <tr class="pt-30">
                                           <td class="custome-checkbox pl-30">
                                               {{ $loop->iteration }}
                                           </td>
                                           <td class="image product-thumbnail pt-40"><img
                                                   src="{{ asset('storage/images/products/' . $item->product->thumbnail) }}"
                                                   alt="#" />
                                           </td>
                                           <td class="product-des product-name">
                                               <h6><a class="product-name mb-10"
                                                       href="{{ route('frontend.product', $item->product->slug) }}">{{ $item->product->name }}</a>
                                               </h6>
                                               <div class="product-rate-cover">
                                                   <div class="product-rate d-inline-block">
                                                       <div class="product-rating" style="width: 90%"></div>
                                                   </div>
                                                   <span class="font-small ml-5 text-muted"> (4.0)</span>
                                               </div>
                                           </td>
                                           <td class="price" data-title="Price">
                                               <h5 class="text-brand">Rp. {{ number_format($item->product->price) }}
                                               </h5>
                                           </td>
                                           <td class="text-center detail-info" data-title="Stock">
                                               @if ($item->product->stock > 0)
                                                   <span class="stock-status in-stock mb-0"> Tersedia </span>
                                               @else
                                                   <span class="stock-status out-stock mb-0"> Tersedia </span>
                                               @endif
                                           </td>
                                           <td class="text-right" data-title="Cart">
                                               <button class="btn btn-sm"
                                                   {{ $item->product->stock > 0 ? '' : 'disabled' }}>
                                                   Keranjang</button>
                                           </td>
                                           <td class="action text-center" data-title="Remove">
                                               <a href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                                           </td>
                                       </tr>
                                   @endforeach
                               @else
                                   <tr>
                                       <td colspan="6">
                                           <img src="{{ asset('storage/images/themes/illustrations/empty.svg') }}"
                                               style="max-width: 220px;border:0;  display: block;margin-left: auto;margin-right: auto;"
                                               alt="">
                                           <h4 style="text-align: center; padding:10px">Opps! Wishlist kamu masih kosong
                                           </h4>
                                       </td>
                                   </tr>
                               @endif
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
   @endsection
