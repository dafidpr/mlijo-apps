@extends('frontend.layouts.app')
@section('breadcrumb')
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-8">
                        <h1 class="mb-15">{{ $title }}</h1>
                        <div class="breadcrumb">
                            <a href="{{ route('frontend.home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Kategori <span></span> {{ $title }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @if ($products != null)
        <div class="container mb-30">
            <div class="row">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>Kami menemukan <strong class="text-brand">0</strong>
                                produk
                                untukmu!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Price: Low to High</a></li>
                                        <li><a href="#">Price: High to Low</a></li>
                                        <li><a href="#">Release Date</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid">
                        @foreach ($productCategory->productSubCategory as $item)
                            @if (count($item->product) > 0 && isset($item->product))
                                @foreach ($item->product as $p)
                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap mb-30">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('frontend.product', $p->slug) }}">
                                                        <img class="default-img"
                                                            src="{{ asset('storage/images/products/' . $p->thumbnail) }}"
                                                            alt="" />
                                                        <img class="hover-img"
                                                            src="{{ asset('storage/images/products/' . $p->thumbnail) }}"
                                                            alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn"
                                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a
                                                        href="{{ route('frontend.product', $p->slug) }}">{{ $item->name }}</a>
                                                </div>
                                                <h2><a
                                                        href="{{ route('frontend.product', $p->slug) }}">{{ strlen($p->name) > 35 ? substr($p->name, 0, 35) . '...' : $p->name }}</a>
                                                </h2>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                </div>
                                                <div>
                                                    <span class="font-small text-muted">By <a
                                                            href="vendor-details-1.html">{{ $p->seller->store_name }}</a></span>
                                                </div>
                                                <div class="product-card-bottom">
                                                    <div class="product-price">
                                                        <span>Rp {{ number_format($p->price) }}</span>
                                                        {{-- <span class="old-price">$32.8</span> --}}
                                                    </div>
                                                    <div class="add-cart">
                                                        <a class="add add-cart-bt" data-id="{{ hashId($p->id) }}"
                                                            href="#"><i class="fi-rs-shopping-cart mr-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                        <!--end product card-->
                    </div>
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    {{-- <section class="section-padding pb-5">
                        <div class="section-title">
                            <h3 class="">Deals Of The Day</h3>
                            <a class="show-all" href="shop-grid-right.html">
                                All Deals
                                <i class="fi-rs-angle-right"></i>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="shop-product-right.html">
                                                <img src="assets/imgs/banner/banner-5.png" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown</a>
                                            </h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="vendor-details-1.html">NestFood</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$32.85</span>
                                                    <span class="old-price">$33.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="shop-product-right.html">
                                                <img src="assets/imgs/banner/banner-6.png" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten</a>
                                            </h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a href="vendor-details-1.html">Old
                                                        El Paso</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$24.85</span>
                                                    <span class="old-price">$26.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="shop-product-right.html">
                                                <img src="assets/imgs/banner/banner-7.png" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (3.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="vendor-details-1.html">Progresso</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$12.85</span>
                                                    <span class="old-price">$13.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="shop-product-right.html">
                                                <img src="assets/imgs/banner/banner-8.png" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a>
                                            </h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (3.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="vendor-details-1.html">Yoplait</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$15.85</span>
                                                    <span class="old-price">$16.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> --}}
                    <!--End Deals-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">Kategori</h5>
                        <ul>
                            @foreach (getProductCategories(5, 'id', 'desc', 'true') as $item)
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
                        <h5 class="section-title style-1 mb-30">New products</h5>
                        @foreach (getProductCategories(3, 'id', 'desc', false) as $item)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('storage/images/products/' . $item->thumbnail) }}"
                                        alt="#" />
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="shop-product-detail.html">{{ $item->name }}</a></h5>
                                    <p class="price mb-0 mt-5">$99.50</p>
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
