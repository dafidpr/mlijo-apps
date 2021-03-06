  @extends('frontend.layouts.app')
  @section('content')
      <!-- Quick view -->
      <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                              <div class="detail-gallery">
                                  <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                  <!-- MAIN SLIDES -->
                                  <div class="product-image-slider">
                                      <figure class="border-radius-10">
                                          <img src="{{ asset('assets/frontend/imgs/shop/product-16-2.jpg') }}"
                                              alt="product image" />
                                      </figure>
                                      <figure class="border-radius-10">
                                          <img src="{{ asset('assets/frontend/imgs/shop/product-16-1.jpg') }}"
                                              alt="product image" />
                                      </figure>
                                      <figure class="border-radius-10">
                                          <img src="{{ asset('assets/frontend/imgs/shop/product-16-3.jpg') }}"
                                              alt="product image" />
                                      </figure>
                                      <figure class="border-radius-10">
                                          <img src="{{ asset('assets/frontend/imgs/shop/product-16-4.jpg') }}"
                                              alt="product image" />
                                      </figure>
                                      <figure class="border-radius-10">
                                          <img src="{{ asset('assets/frontend/imgs/shop/product-16-5.jpg') }}"
                                              alt="product image" />
                                      </figure>
                                      <figure class="border-radius-10">
                                          <img src="{{ asset('assets/frontend/imgs/shop/product-16-6.jpg') }}"
                                              alt="product image" />
                                      </figure>
                                      <figure class="border-radius-10">
                                          <img src="{{ asset('assets/frontend/imgs/shop/product-16-7.jpg') }}"
                                              alt="product image" />
                                      </figure>
                                  </div>
                                  <!-- THUMBNAILS -->
                                  <div class="slider-nav-thumbnails">
                                      <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}"
                                              alt="product image" /></div>
                                      <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-4.jpg') }}"
                                              alt="product image" /></div>
                                      <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-5.jpg') }}"
                                              alt="product image" /></div>
                                      <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-6.jpg') }}"
                                              alt="product image" /></div>
                                      <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-7.jpg') }}"
                                              alt="product image" /></div>
                                      <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-8.jpg') }}"
                                              alt="product image" /></div>
                                      <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-9.jpg') }}"
                                              alt="product image" /></div>
                                  </div>
                              </div>
                              <!-- End Gallery -->
                          </div>
                          <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="detail-info pr-30 pl-30">
                                  <span class="stock-status out-stock"> Sale Off </span>
                                  <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds
                                          of Change Organic Quinoa, Brown</a></h3>
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
                                          <span class="current-price text-brand">$38</span>
                                          <span>
                                              <span class="save-price font-md color3 ml-15">26% Off</span>
                                              <span class="old-price font-md ml-15">$52</span>
                                          </span>
                                      </div>
                                  </div>
                                  <div class="detail-extralink mb-30">
                                      <div class="detail-qty border radius">
                                          <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                          <span class="qty-val">1</span>
                                          <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                      </div>
                                      <div class="product-extra-link2">
                                          <button type="submit" class="button button-add-to-cart"><i
                                                  class="fi-rs-shopping-cart"></i>Add to cart</button>
                                      </div>
                                  </div>
                                  <div class="font-xs">
                                      <ul>
                                          <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                          <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                              <!-- Detail Info -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>



      <section class="home-slider position-relative mb-30">
          <div class="container">
              <div class="home-slide-cover mt-30">
                  <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                      @foreach (getBanners('/') as $item)
                          <div class="single-hero-slider single-animation-wrap"
                              style="background-image: url({{ asset('storage/images/banners/' . $item->image_path) }})">
                              <div class="slider-content">
                                  <h1 class="display-2 mb-40">
                                      {!! $item->title !!}
                                  </h1>
                                  <p class="mb-65">{{ $item->subtitle }}</p>
                                  @if ($item->button_action == true)
                                      <a href="{{ url($item->button_link) }}"
                                          class="btn">{{ $item->button_text }}</a>
                                  @endif
                              </div>
                          </div>
                      @endforeach
                  </div>
                  <div class="slider-arrow hero-slider-1-arrow"></div>
              </div>
          </div>
      </section>
      <!--End hero slider-->
      <section class="popular-categories section-padding">
          <div class="container wow animate__animated animate__fadeIn">
              <div class="section-title">
                  <div class="title">
                      <h3>Kategori Pilihan</h3>
                  </div>
                  <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                      id="carausel-10-columns-arrows"></div>
              </div>
              <div class="carausel-10-columns-cover position-relative">
                  <div class="carausel-10-columns" id="carausel-10-columns">
                      @foreach ($productSubCategories as $item)
                          <div class="card-2 bg-{{ rand(1, 5) }} wow animate__animated animate__fadeInUp"
                              data-wow-delay=".1s">
                              <figure class="img-hover-scale overflow-hidden">
                                  <a href="#"><img
                                          src="{{ asset('storage/images/product-sub-categories/' . $item->image) }}"
                                          alt="" /></a>
                              </figure>
                              <h6><a href="{{ route('frontend.sub-category', $item->slug) }}">{{ $item->name }}</a>
                              </h6>
                              <span>{{ $item->product->count() }} produk</span>
                          </div>
                      @endforeach
                  </div>
              </div>
          </div>
      </section>
      <!--End category slider-->
      <section class="banners mb-25">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-6">
                      <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                          <img src="{{ asset('storage/images/banners/banner-3.png') }}" alt="" />
                          <div class="banner-text">
                              <h4>
                                  Segar Setiap Hari & <br />Bersih dengan<br />
                                  Produk Kami
                              </h4>
                              <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                      class="fi-rs-arrow-small-right"></i></a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                      <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                          <img src="{{ asset('storage/images/banners/banner-4.png') }}" alt="" />
                          <div class="banner-text">
                              <h4>
                                  Buat Sarapanmu<br />
                                  Mudah dan Sehat
                              </h4>
                              <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                      class="fi-rs-arrow-small-right"></i></a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 d-md-none d-lg-flex">
                      <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                          <img src="{{ asset('storage/images/banners/banner-5.png') }}" alt="" />
                          <div class="banner-text">
                              <h4>Produk Organik <br /> Online Terbaik</h4>
                              <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                      class="fi-rs-arrow-small-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--End banners-->
      <section class="product-tabs section-padding position-relative">
          <div class="container">
              <div class="section-title style-2 wow animate__animated animate__fadeIn">
                  <h3>Produk Popular</h3>
              </div>
              <!--End nav-tabs-->
              <div class="row product-grid-4">
                  @foreach ($popularProducts as $item)
                      <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                          <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                              <div class="product-img-action-wrap">
                                  <div class="product-img product-img-zoom">
                                      <a href="{{ route('frontend.product', $item->slug) }}">
                                          <img class="default-img"
                                              src="{{ asset('storage/images/products/' . $item->thumbnail) }}"
                                              alt="" />
                                          <img class="hover-img"
                                              src="{{ asset('storage/images/products/' . $item->thumbnail) }}"
                                              alt="" />
                                      </a>
                                  </div>
                                  <div class="product-action-1">
                                      <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                                              class="fi-rs-heart"></i></a>
                                      <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                          data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                  </div>
                                  <div class="product-badges product-badges-position product-badges-mrg">
                                      <span class="hot">Hot</span>
                                  </div>
                              </div>
                              <div class="product-content-wrap">
                                  <div class="product-category">
                                      <a href="shop-grid-right.html">{{ $item->sub_category_name }}</a>
                                  </div>
                                  <h2><a
                                          href="{{ route('frontend.product', $item->slug) }}">{{ strlen($item->name) > 35 ? substr($item->name, 0, 35) . '...' : $item->name }}</a>
                                  </h2>
                                  <div class="product-rate-cover">
                                      <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width: 90%"></div>
                                      </div>
                                      <span class="font-small ml-5 text-muted"> (4.0)</span>
                                  </div>
                                  <div>
                                      <span class="font-small text-muted">By <a
                                              href="vendor-details-1.html">{{ $item->store_name }}</a></span>
                                  </div>
                                  <div class="product-card-bottom">
                                      <div class="product-price">
                                          <span>Rp{{ number_format($item->price) }}</span>
                                          {{-- <span class="old-price">$32.8</span> --}}
                                      </div>
                                      <div class="add-cart">
                                          <a class="add add-cart-bt" data-id="{{ hashId($item->product_id) }}"
                                              href="#"><i class="fi-rs-shopping-cart mr-2"></i> </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
                  <!--end product card-->
              </div>
          </div>
      </section>
      <!--Products Tabs-->
      {{-- <section class="section-padding pb-5">
          <div class="container">
              <div class="section-title wow animate__animated animate__fadeIn">
                  <h3 class="">Penjualan Terbaik Harian</h3>
                  <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                      <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab"
                              data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one"
                              aria-selected="true">Diskon</button>
                      </li>
                      <li class="nav-item" role="presentation">
                          <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab"
                              data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two"
                              aria-selected="false">Terlaris</button>
                      </li>
                      <li class="nav-item" role="presentation">
                          <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab"
                              data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three"
                              aria-selected="false">Produk Baru</button>
                      </li>
                  </ul>
              </div>
              <div class="row">
                  <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                      <div class="banner-img style-2"
                          style="background: url({{ asset('storage/images/banners/banner-6.png') }}) no-repeat center bottom !important;background-size: cover !important;">
                          <div class="banner-text">
                              <h2 class="mb-100">Bawa pulang produk favofit Anda</h2>
                              <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                      class="fi-rs-arrow-small-right"></i></a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                      <div class="tab-content" id="myTabContent-1">
                          <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                              aria-labelledby="tab-one-1">
                              <div class="carausel-4-columns-cover arrow-center position-relative">
                                  <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                      id="carausel-4-columns-arrows"></div>
                                  <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-1-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-1-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="hot">Save 15%</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa,
                                                      Brown</a></h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-5-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-5-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="new">Save 35%</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">All Natural Italian-Style Chicken
                                                      Meatballs</a></h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-2-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="sale">Sale</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Angie???s Boomchickapop Sweet and
                                                      womnies</a></h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-3-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-3-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="best">Best sale</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Foster Farms Takeout Crispy
                                                      Classic </a></h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-4-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-4-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="hot">Save 15%</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Blue Diamond Almonds Lightly
                                                      Salted</a></h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                  </div>
                              </div>
                          </div>
                          <!--End tab-pane-->
                          <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                              <div class="carausel-4-columns-cover arrow-center position-relative">
                                  <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                      id="carausel-4-columns-2-arrows"></div>
                                  <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-10-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-10-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="hot">Save 15%</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Canada Dry Ginger Ale ??? 2 L
                                                      Bottle</a></h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-15-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-15-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="new">Save 35%</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Encore Seafoods Stuffed
                                                      Alaskan</a></h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-12-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-12-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="sale">Sale</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Gorton???s Beer Battered Fish </a>
                                              </h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-13-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-13-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="best">Best sale</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Haagen-Dazs Caramel Cone Ice</a>
                                              </h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-14-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-14-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="hot">Save 15%</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Italian-Style Chicken Meatball</a>
                                              </h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                              <div class="carausel-4-columns-cover arrow-center position-relative">
                                  <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                      id="carausel-4-columns-3-arrows"></div>
                                  <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-7-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-7-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="hot">Save 15%</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Perdue Simply Smart Organics
                                                      Gluten Free</a></h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-8-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-8-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="new">Save 35%</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa</a>
                                              </h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-9-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-9-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="sale">Sale</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom</a>
                                              </h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-13-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-13-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="best">Best sale</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry
                                                      Juice</a></h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                      <div class="product-cart-wrap">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="shop-product-right.html">
                                                      <img class="default-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-14-1.jpg') }}"
                                                          alt="" />
                                                      <img class="hover-img"
                                                          src="{{ asset('assets/frontend/imgs/shop/product-14-2.jpg') }}"
                                                          alt="" />
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up"
                                                      data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                          class="fi-rs-eye"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                      href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up"
                                                      href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                  <span class="hot">Save 15%</span>
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <div class="product-category">
                                                  <a href="shop-grid-right.html">Hodo Foods</a>
                                              </div>
                                              <h2><a href="shop-product-right.html">Organic Quinoa, Brown, & Red
                                                      Rice</a></h2>
                                              <div class="product-rate d-inline-block">
                                                  <div class="product-rating" style="width: 80%"></div>
                                              </div>
                                              <div class="product-price mt-10">
                                                  <span>$238.85 </span>
                                                  <span class="old-price">$245.8</span>
                                              </div>
                                              <div class="sold mt-15 mb-15">
                                                  <div class="progress mb-5">
                                                      <div class="progress-bar" role="progressbar" style="width: 50%"
                                                          aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                                  <span class="font-xs text-heading"> Sold: 90/120</span>
                                              </div>
                                              <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                      class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                          </div>
                                      </div>
                                      <!--End product Wrap-->
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!--End tab-content-->
                  </div>
                  <!--End Col-lg-9-->
              </div>
          </div>
      </section> --}}
      <!--End Best Sales-->
      {{-- <section class="section-padding pb-5">
          <div class="container">
              <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                  <h3 class="">Promo Hari Ini</h3>
                  <a class="show-all" href="shop-grid-right.html">
                      All Deals
                      <i class="fi-rs-angle-right"></i>
                  </a>
              </div>
              <div class="row">
                  <div class="col-xl-3 col-lg-4 col-md-6">
                      <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                          <div class="product-img-action-wrap">
                              <div class="product-img">
                                  <a href="shop-product-right.html">
                                      <img src="{{ asset('assets/frontend/imgs/banner/banner-5.png') }}"
                                          alt="" />
                                  </a>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="deals-countdown-wrap">
                                  <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                              </div>
                              <div class="deals-content">
                                  <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red
                                          Rice</a></h2>
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
                      <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                          <div class="product-img-action-wrap">
                              <div class="product-img">
                                  <a href="shop-product-right.html">
                                      <img src="{{ asset('assets/frontend/imgs/banner/banner-6.png') }}"
                                          alt="" />
                                  </a>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="deals-countdown-wrap">
                                  <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                              </div>
                              <div class="deals-content">
                                  <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten Free</a>
                                  </h2>
                                  <div class="product-rate-cover">
                                      <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width: 90%"></div>
                                      </div>
                                      <span class="font-small ml-5 text-muted"> (4.0)</span>
                                  </div>
                                  <div>
                                      <span class="font-small text-muted">By <a href="vendor-details-1.html">Old El
                                              Paso</a></span>
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
                      <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                          <div class="product-img-action-wrap">
                              <div class="product-img">
                                  <a href="shop-product-right.html">
                                      <img src="{{ asset('assets/frontend/imgs/banner/banner-7.png') }}"
                                          alt="" />
                                  </a>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="deals-countdown-wrap">
                                  <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                              </div>
                              <div class="deals-content">
                                  <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom and
                                          Caramelized</a></h2>
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
                      <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                          <div class="product-img-action-wrap">
                              <div class="product-img">
                                  <a href="shop-product-right.html">
                                      <img src="{{ asset('assets/frontend/imgs/banner/banner-8.png') }}"
                                          alt="" />
                                  </a>
                              </div>
                          </div>
                          <div class="product-content-wrap">
                              <div class="deals-countdown-wrap">
                                  <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                              </div>
                              <div class="deals-content">
                                  <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a></h2>
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
          </div>
      </section> --}}
      <!--End Deals-->
      <section class="section-padding mb-30">
          <div class="container">
              <div class="row">
                  <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
                      data-wow-delay="0">
                      <h4 class="section-title style-1 mb-30 animated animated">Produk Terlaris</h4>
                      <div class="product-list-small animated animated">
                          @foreach ($bestSellingProducts as $item)
                              <article class="row align-items-center hover-up">
                                  <figure class="col-md-4 mb-0">
                                      <a href="{{ route('frontend.product', $item->slug) }}"><img
                                              src="{{ asset('storage/images/products/' . $item->thumbnail) }}"
                                              alt="" /></a>
                                  </figure>
                                  <div class="col-md-8 mb-0">
                                      <h6>
                                          <a
                                              href="{{ route('frontend.product', $item->slug) }}">{{ strlen($item->name) > 35 ? substr($item->name, 0, 35) . '...' : $item->name }}</a>
                                      </h6>
                                      <div class="product-rate-cover">
                                          <div class="product-rate d-inline-block">
                                              <div class="product-rating" style="width: 90%"></div>
                                          </div>
                                          <span class="font-small ml-5 text-muted"> (4.0)</span>
                                      </div>
                                      <div class="product-price">
                                          <span>Rp{{ number_format($item->price) }}</span>
                                          {{-- <span class="old-price">$33.8</span> --}}
                                      </div>
                                  </div>
                              </article>
                          @endforeach
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp"
                      data-wow-delay=".1s">
                      <h4 class="section-title style-1 mb-30 animated animated">Super Promo</h4>
                      <div class="product-list-small animated animated">
                          <article class="row align-items-center hover-up">
                              <figure class="col-md-4 mb-0">
                                  <a href="shop-product-right.html"><img
                                          src="{{ asset('assets/frontend/imgs/shop/thumbnail-4.jpg') }}"
                                          alt="" /></a>
                              </figure>
                              <div class="col-md-8 mb-0">
                                  <h6>
                                      <a href="shop-product-right.html">Organic Cage-Free Grade A Large Brown Eggs</a>
                                  </h6>
                                  <div class="product-rate-cover">
                                      <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width: 90%"></div>
                                      </div>
                                      <span class="font-small ml-5 text-muted"> (4.0)</span>
                                  </div>
                                  <div class="product-price">
                                      <span>$32.85</span>
                                      <span class="old-price">$33.8</span>
                                  </div>
                              </div>
                          </article>
                          <article class="row align-items-center hover-up">
                              <figure class="col-md-4 mb-0">
                                  <a href="shop-product-right.html"><img
                                          src="{{ asset('assets/frontend/imgs/shop/thumbnail-5.jpg') }}"
                                          alt="" /></a>
                              </figure>
                              <div class="col-md-8 mb-0">
                                  <h6>
                                      <a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red
                                          Rice</a>
                                  </h6>
                                  <div class="product-rate-cover">
                                      <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width: 90%"></div>
                                      </div>
                                      <span class="font-small ml-5 text-muted"> (4.0)</span>
                                  </div>
                                  <div class="product-price">
                                      <span>$32.85</span>
                                      <span class="old-price">$33.8</span>
                                  </div>
                              </div>
                          </article>
                          <article class="row align-items-center hover-up">
                              <figure class="col-md-4 mb-0">
                                  <a href="shop-product-right.html"><img
                                          src="{{ asset('assets/frontend/imgs/shop/thumbnail-6.jpg') }}"
                                          alt="" /></a>
                              </figure>
                              <div class="col-md-8 mb-0">
                                  <h6>
                                      <a href="shop-product-right.html">Naturally Flavored Cinnamon Vanilla Light
                                          Roast Coffee</a>
                                  </h6>
                                  <div class="product-rate-cover">
                                      <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width: 90%"></div>
                                      </div>
                                      <span class="font-small ml-5 text-muted"> (4.0)</span>
                                  </div>
                                  <div class="product-price">
                                      <span>$32.85</span>
                                      <span class="old-price">$33.8</span>
                                  </div>
                              </div>
                          </article>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
                      data-wow-delay=".2s">
                      <h4 class="section-title style-1 mb-30 animated animated">Produk Baru</h4>
                      <div class="product-list-small animated animated">
                          @foreach ($newProducts as $item)
                              <article class="row align-items-center hover-up">
                                  <figure class="col-md-4 mb-0">
                                      <a href="{{ route('frontend.product', $item->slug) }}"><img
                                              src="{{ asset('storage/images/products/' . $item->thumbnail) }}"
                                              alt="" /></a>
                                  </figure>
                                  <div class="col-md-8 mb-0">
                                      <h6>
                                          <a
                                              href="{{ route('frontend.product', $item->slug) }}">{{ strlen($item->name) > 35 ? substr($item->name, 0, 35) . '...' : $item->name }}</a>
                                      </h6>
                                      <div class="product-rate-cover">
                                          <div class="product-rate d-inline-block">
                                              <div class="product-rating" style="width: 90%"></div>
                                          </div>
                                          <span class="font-small ml-5 text-muted"> (4.0)</span>
                                      </div>
                                      <div class="product-price">
                                          <span>Rp{{ number_format($item->price) }}</span>
                                          {{-- <span class="old-price">$33.8</span> --}}
                                      </div>
                                  </div>
                              </article>
                          @endforeach
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                      data-wow-delay=".3s">
                      <h4 class="section-title style-1 mb-30 animated animated">Penilaian Teratas</h4>
                      <div class="product-list-small animated animated">
                          <article class="row align-items-center hover-up">
                              <figure class="col-md-4 mb-0">
                                  <a href="shop-product-right.html"><img
                                          src="{{ asset('assets/frontend/imgs/shop/thumbnail-10.jpg') }}"
                                          alt="" /></a>
                              </figure>
                              <div class="col-md-8 mb-0">
                                  <h6>
                                      <a href="shop-product-right.html">Foster Farms Takeout Crispy Classic Buffalo
                                          Wings</a>
                                  </h6>
                                  <div class="product-rate-cover">
                                      <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width: 90%"></div>
                                      </div>
                                      <span class="font-small ml-5 text-muted"> (4.0)</span>
                                  </div>
                                  <div class="product-price">
                                      <span>$32.85</span>
                                      <span class="old-price">$33.8</span>
                                  </div>
                              </div>
                          </article>
                          <article class="row align-items-center hover-up">
                              <figure class="col-md-4 mb-0">
                                  <a href="shop-product-right.html"><img
                                          src="{{ asset('assets/frontend/imgs/shop/thumbnail-11.jpg') }}"
                                          alt="" /></a>
                              </figure>
                              <div class="col-md-8 mb-0">
                                  <h6>
                                      <a href="shop-product-right.html">Angie???s Boomchickapop Sweet & Salty Kettle
                                          Corn</a>
                                  </h6>
                                  <div class="product-rate-cover">
                                      <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width: 90%"></div>
                                      </div>
                                      <span class="font-small ml-5 text-muted"> (4.0)</span>
                                  </div>
                                  <div class="product-price">
                                      <span>$32.85</span>
                                      <span class="old-price">$33.8</span>
                                  </div>
                              </div>
                          </article>
                          <article class="row align-items-center hover-up">
                              <figure class="col-md-4 mb-0">
                                  <a href="shop-product-right.html"><img
                                          src="{{ asset('assets/frontend/imgs/shop/thumbnail-12.jpg') }}"
                                          alt="" /></a>
                              </figure>
                              <div class="col-md-8 mb-0">
                                  <h6>
                                      <a href="shop-product-right.html">All Natural Italian-Style Chicken
                                          Meatballs</a>
                                  </h6>
                                  <div class="product-rate-cover">
                                      <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width: 90%"></div>
                                      </div>
                                      <span class="font-small ml-5 text-muted"> (4.0)</span>
                                  </div>
                                  <div class="product-price">
                                      <span>$32.85</span>
                                      <span class="old-price">$33.8</span>
                                  </div>
                              </div>
                          </article>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--End 4 columns-->
  @endsection
