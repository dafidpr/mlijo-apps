@extends('frontend.layouts.app')
@section('breadcrumb')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('frontend.home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                @if ($product != null)
                    <span></span> <a
                        href="{{ route('frontend.sub-category', $product->productSubCategory->slug) }}">{{ $product->productSubCategory->name }}</a>
                    <span></span> {{ $product->name }}
                @endif
            </div>
        </div>
    </div>
@endsection
@section('content')
    @if ($product != null)
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-11 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="product-detail accordion-detail">
                                <div class="row mb-50 mt-30">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                        <div class="detail-gallery">
                                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                            <!-- MAIN SLIDES -->
                                            <div class="product-image-slider">
                                                <figure class="border-radius-10">
                                                    <img src="{{ asset('storage/images/products/' . $product->thumbnail) }}"
                                                        alt="product image" />
                                                </figure>
                                                @foreach ($product->productImage as $item)
                                                    <figure class="border-radius-10">
                                                        <img src="{{ asset('storage/images/product-images/' . $item->image) }}"
                                                            alt="product image" />
                                                    </figure>
                                                @endforeach
                                            </div>
                                            <!-- THUMBNAILS -->
                                            <div class="slider-nav-thumbnails">
                                                <div>
                                                    <img src="{{ asset('storage/images/products/' . $product->thumbnail) }}"
                                                        alt="product image" />
                                                </div>
                                                @foreach ($product->productImage as $item)
                                                    <div>
                                                        <img src="{{ asset('storage/images/product-images/' . $item->image) }}"
                                                            alt="product image" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- End Gallery -->
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="detail-info pr-30 pl-30">
                                            <span class="stock-status out-stock"> Sale Off </span>
                                            <h2 class="title-detail">{{ $product->name }}</h2>
                                            <div class="product-detail-rating">
                                                <div class="product-rate-cover text-end">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                                </div>
                                            </div>
                                            <div class="clearfix product-price-cover">
                                                <div class="product-price primary-color float-left">
                                                    <span class="current-price text-brand"
                                                        style="font-size: 48px;">Rp{{ number_format($product->price) }}</span>
                                                    {{-- <span>
                                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                                        <span class="old-price font-md ml-15">$52</span>
                                                    </span> --}}
                                                </div>
                                            </div>
                                            <div class="short-desc mb-30">
                                                <p class="font-lg">{{ $product->summary }}</p>
                                            </div>
                                            @if (count($product->productVariant) > 0)
                                                <div class="attr-detail attr-size mb-30">
                                                    <strong
                                                        class="mr-10">{{ $product->productVariant[0]->name }}:
                                                    </strong>
                                                    <ul class="list-filter size-filter font-small">

                                                        @foreach ($product->productVariant[0]->productVariantDetail as $item)
                                                            <li class="{{ $loop->iteration == 1 ? 'active' : '' }}"><a
                                                                    href="#">{{ $item->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="detail-extralink mb-50">
                                                <div class="detail-qty border radius">
                                                    <a href="#" class="qty-down"><i
                                                            class="fi-rs-angle-small-down"></i></a>
                                                    <span class="qty-val">1</span>
                                                    <a href="#" class="qty-up"><i
                                                            class="fi-rs-angle-small-up"></i></a>
                                                </div>
                                                <div class="product-extra-link2">
                                                    <button type="submit" class="button button-add-to-cart"><i
                                                            class="fi-rs-shopping-cart"></i>Keranjang</button>
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Detail Info -->
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="tab-style3">
                                        <ul class="nav nav-tabs text-uppercase">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                                    href="#Description">Deskripsi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                                    href="#Additional-info">Informasi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab"
                                                    href="#Vendor-info">Seller</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                                    href="#Reviews">Reviews (3)</a>
                                            </li> --}}
                                            @if (count($product->seller->sellerNote) > 0)
                                                <li class="nav-item">
                                                    <a class="nav-link" id="SellerNotes-tab" data-bs-toggle="tab"
                                                        href="#SellerNotes">Catatan Toko</a>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Description">
                                                <div class="">
                                                    {!! $product->description !!}
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Additional-info">
                                                <table class="font-md">
                                                    <tbody>
                                                        <tr class="stand-up">
                                                            <th>Kategori Produk</th>
                                                            <td>
                                                                <p>{{ $product->productSubCategory->productCategory->name }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr class="folded-wo-wheels">
                                                            <th>Sub Kategori Produk</th>
                                                            <td>
                                                                <p>{{ $product->productSubCategory->name }}</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="folded-w-wheels">
                                                            <th>Stok</th>
                                                            <td>
                                                                <p>{{ $product->stock }}</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="door-pass-through">
                                                            <th>SKU</th>
                                                            <td>
                                                                <p>{{ $product->sku != null ? $product->sku : '-' }}</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="frame">
                                                            <th>Minimal Order</th>
                                                            <td>
                                                                <p>{{ $product->min_order }}</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="weight-wo-wheels">
                                                            <th>Berat</th>
                                                            <td>
                                                                <p>{{ $product->weight . '' . $product->weight_unit }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        @if ($product->long_size != null && $product->width_size != null && $product->height_size != null)
                                                            <tr class="weight-capacity">
                                                                <th>Ukuran</th>
                                                                <td>
                                                                    <p>{{ $product->long_size . 'x' . $product->width_size . 'x' . $product->height_size . ' (PxLxT)' }}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if (count($product->productVariant) > 0)
                                                            <tr class="width">
                                                                <th>Variasi</th>
                                                                <td>
                                                                    <p>
                                                                        @foreach ($product->productVariant[0]->productVariantDetail as $item)
                                                                            {{ $item->name . (count($product->productVariant[0]->productVariantDetail) <= $loop->iteration ? '' : ',') }}
                                                                        @endforeach
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="Vendor-info">
                                                <div class="vendor-logo d-flex mb-30">
                                                    <img src="{{ asset('assets/frontend/imgs/vendor/vendor-18.svg') }}"
                                                        alt="" />
                                                    <div class="vendor-name ml-15">
                                                        <h6>
                                                            <a href="#">{{ $product->seller->store_name }}</a>
                                                        </h6>
                                                        <div class="product-rate-cover text-end">
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width: 90%"></div>
                                                            </div>
                                                            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="contact-infor mb-50">
                                                    <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-location.svg') }}"
                                                            alt="" /><strong>Alamat: </strong>
                                                        <span>-</span>
                                                    </li>
                                                    <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-contact.svg') }}"
                                                            alt="" /><strong>Kontak Toko:
                                                        </strong><span> {{ $product->seller->store_phone_number }}</span>
                                                    </li>
                                                </ul>
                                                <h4 class="mt-30">Slogan Toko</h4>
                                                <hr class="wp-block-separator is-style-wide">
                                                <p>
                                                    {{ $product->seller->store_slogan }}
                                                </p>
                                                <h4 class="mt-30">Deksripsi Toko</h4>
                                                <hr class="wp-block-separator is-style-wide">
                                                <p>
                                                    {{ $product->seller->store_description }}
                                                </p>
                                            </div>
                                            {{-- <div class="tab-pane fade" id="Reviews">
                                                <!--Comments-->
                                                <div class="comments-area">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <h4 class="mb-30">Customer questions & answers</h4>
                                                            <div class="comment-list">
                                                                <div
                                                                    class="single-comment justify-content-between d-flex mb-30">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="assets/imgs/blog/author-2.png"
                                                                                alt="" />
                                                                            <a href="#"
                                                                                class="font-heading text-brand">Sienna</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div
                                                                                class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span
                                                                                        class="font-xs text-muted">December
                                                                                        4, 2021 at 3:12 pm </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating"
                                                                                        style="width: 100%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">Lorem ipsum dolor sit
                                                                                amet, consectetur adipisicing elit.
                                                                                Delectus, suscipit exercitationem
                                                                                accusantium obcaecati quos voluptate
                                                                                nesciunt facilis itaque modi commodi
                                                                                dignissimos sequi repudiandae minus ab
                                                                                deleniti totam officia id incidunt? <a
                                                                                    href="#"
                                                                                    class="reply">Reply</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="assets/imgs/blog/author-3.png"
                                                                                alt="" />
                                                                            <a href="#"
                                                                                class="font-heading text-brand">Brenna</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div
                                                                                class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span
                                                                                        class="font-xs text-muted">December
                                                                                        4, 2021 at 3:12 pm </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating"
                                                                                        style="width: 80%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">Lorem ipsum dolor sit
                                                                                amet, consectetur adipisicing elit.
                                                                                Delectus, suscipit exercitationem
                                                                                accusantium obcaecati quos voluptate
                                                                                nesciunt facilis itaque modi commodi
                                                                                dignissimos sequi repudiandae minus ab
                                                                                deleniti totam officia id incidunt? <a
                                                                                    href="#"
                                                                                    class="reply">Reply</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="single-comment justify-content-between d-flex">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="assets/imgs/blog/author-4.png"
                                                                                alt="" />
                                                                            <a href="#"
                                                                                class="font-heading text-brand">Gemma</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div
                                                                                class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span
                                                                                        class="font-xs text-muted">December
                                                                                        4, 2021 at 3:12 pm </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating"
                                                                                        style="width: 80%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">Lorem ipsum dolor sit
                                                                                amet, consectetur adipisicing elit.
                                                                                Delectus, suscipit exercitationem
                                                                                accusantium obcaecati quos voluptate
                                                                                nesciunt facilis itaque modi commodi
                                                                                dignissimos sequi repudiandae minus ab
                                                                                deleniti totam officia id incidunt? <a
                                                                                    href="#"
                                                                                    class="reply">Reply</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <h4 class="mb-30">Customer reviews</h4>
                                                            <div class="d-flex mb-30">
                                                                <div class="product-rate d-inline-block mr-15">
                                                                    <div class="product-rating" style="width: 90%"></div>
                                                                </div>
                                                                <h6>4.8 out of 5</h6>
                                                            </div>
                                                            <div class="progress">
                                                                <span>5 star</span>
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                    aria-valuemax="100">50%</div>
                                                            </div>
                                                            <div class="progress">
                                                                <span>4 star</span>
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">25%</div>
                                                            </div>
                                                            <div class="progress">
                                                                <span>3 star</span>
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                                    aria-valuemax="100">45%</div>
                                                            </div>
                                                            <div class="progress">
                                                                <span>2 star</span>
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                                    aria-valuemax="100">65%</div>
                                                            </div>
                                                            <div class="progress mb-30">
                                                                <span>1 star</span>
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                                    aria-valuemax="100">85%</div>
                                                            </div>
                                                            <a href="#" class="font-xs text-muted">How are ratings
                                                                calculated?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--comment form-->
                                                <div class="comment-form">
                                                    <h4 class="mb-15">Add a review</h4>
                                                    <div class="product-rate d-inline-block mb-30"></div>
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-12">
                                                            <form class="form-contact comment_form" action="#"
                                                                id="commentForm">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                                                placeholder="Write Comment"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input class="form-control" name="name"
                                                                                id="name" type="text" placeholder="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input class="form-control" name="email"
                                                                                id="email" type="email"
                                                                                placeholder="Email" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-control" name="website"
                                                                                id="website" type="text"
                                                                                placeholder="Website" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        class="button button-contactForm">Submit
                                                                        Review</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            @if (count($product->seller->sellerNote) > 0)
                                                <div class="tab-pane fade" id="SellerNotes">
                                                    <!--Comments-->
                                                    <div class="comments-area">
                                                        <div class="">
                                                            @foreach ($product->seller->sellerNote as $item)
                                                                <h4 class="mt-30">{{ $item->title }}</h4>
                                                                <hr class="wp-block-separator is-style-wide">
                                                                {!! $item->note !!}
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-60">
                                    <div class="col-12">
                                        <h2 class="section-title style-1 mb-30">Produk Terkait</h2>
                                    </div>
                                    <div class="col-12">
                                        <div class="row related-products">
                                            @foreach ($productRelatedCategory as $item)
                                                <div class="col-lg-3 col-md-4 col-12 col-sm-6" style="margin-bottom:20px">
                                                    <div class="product-cart-wrap hover-up">
                                                        <div class="product-img-action-wrap">
                                                            <div class="product-img product-img-zoom">
                                                                <a href="{{ route('frontend.product', $item->slug) }}"
                                                                    tabindex="0">
                                                                    <img class="default-img"
                                                                        src="{{ asset('storage/images/products/' . $item->thumbnail) }}"
                                                                        alt="" />
                                                                    <img class="hover-img"
                                                                        src="{{ asset('storage/images/products/' . $item->thumbnail) }}"
                                                                        alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="product-action-1">
                                                                <a aria-label="Quick view"
                                                                    class="action-btn small hover-up"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#quickViewModal"><i
                                                                        class="fi-rs-search"></i></a>
                                                                <a aria-label="Add To Wishlist"
                                                                    class="action-btn small hover-up"
                                                                    href="shop-wishlist.html" tabindex="0"><i
                                                                        class="fi-rs-heart"></i></a>
                                                            </div>
                                                            <div
                                                                class="product-badges product-badges-position product-badges-mrg">
                                                                <span class="hot">Hot</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-content-wrap">
                                                            <h2><a href="{{ route('frontend.product', $item->slug) }}"
                                                                    tabindex="0">{{ strlen($item->name) > 35 ? substr($item->name, 0, 35) . '...' : $item->name }}</a>
                                                            </h2>
                                                            <div class="rating-result" title="90%">
                                                                <span> </span>
                                                            </div>
                                                            <div class="product-price">
                                                                <span>Rp{{ number_format($item->price) }} </span>
                                                                {{-- <span class="old-price">$245.8</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                            <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">Kategori</h5>
                                <ul>
                                    @foreach (getProductCategories(5, 'id', 'desc', true) as $item)
                                        <li>
                                            <a href="{{ route('frontend.category', $item->slug) }}"> <img
                                                    src="{{ asset('storage/images/product-categories/' . $item->icon) }}"
                                                    alt="" />{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Product sidebar Widget -->
                            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                                <h5 class="section-title style-1 mb-30">Produk Terbaru</h5>
                                @foreach ($newProducts as $item)
                                    <div class="single-post clearfix">
                                        <div class="image">
                                            <img src="{{ asset('storage/images/products/' . $item->thumbnail) }}"
                                                alt="#" />
                                        </div>
                                        <div class="content pt-10">
                                            <h6><a
                                                    href="{{ route('frontend.product', $item->slug) }}">{{ strlen($item->name) > 13 ? substr($item->name, 0, 13) . '...' : $item->name }}</a>
                                            </h6>
                                            <p class="price mb-0 mt-5">Rp{{ number_format($item->price) }}</p>
                                            <div class="product-rate">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container" style="margin-bottom: 50px">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <p class="mb-20"><img src="{{ asset('storage/images/themes/illustrations/404.svg') }}"
                            width="40%" alt="" class="hover-up"></p>
                    <h2 class="mb-30">Opps! Halaman tidak ditemukan</h1>
                        <a class="btn btn-default submit-auto-width font-xs hover-up mt-30"
                            href="{{ route('frontend.home') }}"><i class="fi-rs-home mr-5"></i> Kembali ke halaman
                            utama</a>
                </div>
            </div>
        </div>
    @endif
@endsection
