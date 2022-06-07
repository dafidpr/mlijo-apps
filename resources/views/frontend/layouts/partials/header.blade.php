<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a href="#">Akun Saya</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>100% Secure delivery without contacting the courier</li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>Perlu Bantuan ? Hubungi: <strong class="text-brand">
                                    {{ getSetting('cs') }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="index.html"><img src="{{ asset('storage/images/themes/' . getSetting('logo')) }}"
                            alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#" style="max-width: 100%;">
                            <select class="select-active">
                                <option value="">Semua</option>
                                @foreach (getProductCategories() as $item)
                                    <option value="{{ hashId($item->id) }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" placeholder="Cari sesuatu.." style="max-width: 100%;" />
                        </form>
                    </div>
                    <div class="header-action-right">
                        @if (auth()->user() && (auth()->user()->roles[0]->name == 'Customer' || auth()->user()->roles[0]->name == 'Seller'))
                            <div class="header-action-2" style="margin-left:35px">
                                {{-- <div class="header-action-icon-2">
                                    <a href="shop-compare.html">
                                        <img class="svgInject" alt="Nest"
                                            src="{{ asset('assets/frontend/imgs/theme/icons/icon-notification.svg') }}" />
                                        <span class="pro-count blue">3</span>
                                    </a>
                                    <a href="shop-compare.html"><span class="lable ml-0">Notifikasi</span></a>
                                </div> --}}
                                <div class="header-action-icon-2">
                                    <a href="{{ route('frontend.wishlists') }}">
                                        <img class="svgInject" alt="Nest"
                                            src="{{ asset('assets/frontend/imgs/theme/icons/icon-heart.svg') }}" />
                                        @if (count(getWishlist(true)) > 0)
                                            <span class="pro-count blue">{{ count(getWishlist(true)) }}</span>
                                        @endif
                                    </a>
                                    <a href="{{ route('frontend.wishlists') }}"><span
                                            class="lable">Wishlist</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="shop-cart.html">
                                        <img alt="Nest"
                                            src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}" />
                                        @if (count(getCart(true)) > 0)
                                            <span class="pro-count blue">{{ count(getCart(true)) }}</span>
                                        @endif
                                    </a>
                                    <a href="{{ route('frontend.carts') }}"><span
                                            class="lable">Keranjang</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            @foreach (getCart(true, 2) as $item)
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a
                                                            href="{{ route('frontend.product', $item->product->slug) }}"><img
                                                                alt="Nest"
                                                                src="{{ asset('storage/images/products/' . $item->product->thumbnail) }}" /></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a
                                                                href="{{ route('frontend.product', $item->product->slug) }}">{{ strlen($item->product->name) > 15 ? substr($item->product->name, 0, 15) . '...' : $item->product->name }}</a>
                                                        </h4>
                                                        <h4><span>{{ $item->quantity }} ×
                                                            </span>Rp{{ number_format($item->product->price) }}</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>Rp
                                                        {{ number_format(getCart(false, 0, true)) }}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{ route('frontend.carts') }}" class="outline">View
                                                    cart</a>
                                                <a href="shop-checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="page-account.html">
                                        <img class="svgInject" alt="Nest"
                                            src="{{ asset('assets/frontend/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href="page-account.html"><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-user mr-10"></i>My
                                                    Account</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i
                                                        class="fi fi-rs-location-alt mr-10"></i>Order
                                                    Tracking</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-label mr-10"></i>My
                                                    Voucher</a>
                                            </li>
                                            <li>
                                                <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My
                                                    Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i
                                                        class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}" data-toggle="logout"
                                                    data-form="#formLogout"><i class="fi fi-rs-sign-out mr-10"></i>Sign
                                                    out</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="header-action-2" style="margin-left:35px">
                                <div class="header-action-icon-2">
                                    <div class="shopping-cart-button">
                                        <a href="{{ route('frontend.login') }}" class="outline btn hover-up"
                                            style="background-color: transparent;border: 2px solid #3BB77E;color: #3BB77E;">Masuk</a>
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                                    <div class="shopping-cart-button">
                                        <a href="{{ route('frontend.register') }}" class="outline btn"
                                            style="">Daftar</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{ asset('storage/images/themes/' . getSetting('logo')) }}"
                            alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> Semua Kategori
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach (getProductCategories(5, 'id', 'desc', true) as $item)
                                        <li>
                                            <a href="{{ route('frontend.category', $item->slug) }}"> <img
                                                    src="{{ asset('storage/images/product-categories/' . $item->icon) }}"
                                                    alt="" />{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="end">
                                    @foreach (getProductCategories(5, 'id', 'desc', false)->skip(5)->get()
    as $item)
                                        <li>
                                            <a href="{{ route('frontend.category', $item->slug) }}"> <img
                                                    src="{{ asset('storage/images/product-categories/' . $item->icon) }}"
                                                    alt="" />{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach (getProductCategories(2, 'id', 'desc', false)->skip(10)->get()
    as $item)
                                            <li>
                                                <a href="{{ route('frontend.category', $item->slug) }}"> <img
                                                        src="{{ asset('storage/images/product-categories/' . $item->icon) }}"
                                                        alt="" />{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="end">
                                        @foreach (getProductCategories(2, 'id', 'desc', false)->skip(12)->get()
    as $item)
                                            <li>
                                                <a href="{{ route('frontend.category', $item->slug) }}"> <img
                                                        src="{{ asset('storage/images/product-categories/' . $item->icon) }}"
                                                        alt="" />{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span
                                    class="heading-sm-1">Show more...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img
                                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-hot.svg') }}"
                                        alt="hot deals" /><a href="shop-grid-right.html">Hot Deals</a></li>
                                <li>
                                    <a href="#">Flesh Sale</a>
                                </li>
                                <li>
                                    <a href="#">Produk Diskon</a>
                                </li>
                                <li>
                                    <a href="#">Produk Terbaru</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <p>{{ getSetting('cs') }}<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        @if (auth()->user() && (auth()->user()->roles[0]->name == 'Customer' || auth()->user()->roles[0]->name == 'Seller'))
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="#">
                                    <img alt="Nest"
                                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest"
                                                        src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest"
                                                        src="{{ asset('assets/frontend/imgs/shop/thumbnail-4.jpg') }}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="shop-cart.html">View cart</a>
                                            <a href="shop-checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2" style="margin-left:5px">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest"
                                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-user mr-10"></i>My
                                                Account</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i
                                                    class="fi fi-rs-location-alt mr-10"></i>Order
                                                Tracking</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-label mr-10"></i>My
                                                Voucher</a>
                                        </li>
                                        <li>
                                            <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My
                                                Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i
                                                    class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}" data-toggle="logout"
                                                data-form="#formLogout"><i class="fi fi-rs-sign-out mr-10"></i>Sign
                                                out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="index.html"><img src="{{ asset('storage/images/themes/' . getSetting('logo')) }}"
                        alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Cari sesuatu" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border" style="margin-bottom: 40px">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li>
                            <a href="#">Hot Deals</a>
                        </li>
                        <li>
                            <a href="#">Flesh Sale</a>
                        </li>
                        <li>
                            <a href="#">Produk Diskon</a>
                        </li>
                        <li>
                            <a href="#">Produk Terbaru</a>
                        </li>

                        <li>
                            @if (!auth()->user())
                                <div class="header-action-2" style="margin-left:35px">
                                    <div class="header-action-icon-2">
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('frontend.login') }}" class="outline btn hover-up"
                                                style="background-color: transparent;border: 2px solid #3BB77E;color: #3BB77E;">Masuk</a>
                                        </div>
                                    </div>
                                    <div class="header-action-icon-2">
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('frontend.register') }}" class="outline btn"
                                                style="color:white">Daftar</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Temukan Kami Di</h6>
                <a href="https://facebook.com/{{ getSetting('fb') }}"><img
                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
                <a href="https://twitter.com/{{ getSetting('fb') }}"><img
                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-twitter-white.svg') }}" alt="" /></a>
                <a href="https://instagram.com/{{ getSetting('fb') }}"><img
                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>
                <a href="https://youtube.com/c/{{ getSetting('fb') }}"><img
                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2021 © PT Mlijo Mart Indonesia. All rights reserved.</div>
        </div>
    </div>
</div>

<form action="{{ route('logout') }}" method="post" id="formLogout">
    @csrf
</form>
