 <footer class="main">
     <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="position-relative newsletter-inner"
                         style="background: url({{ asset('storage/images/banners/banner-10.png') }}) no-repeat center;">
                         <div class="newsletter-content">
                             <h2 class="mb-20">
                                 Tetap dirumah dan nikmati harimu <br />
                                 dengan belanja kebutuhan dari rumah
                             </h2>
                             <p class="mb-45">Mulai belanja segala kebutuhan dapur di <span
                                     class="text-brand">Mlijo Mart & Grocery</span></p>
                         </div>
                         <img src="{{ asset('storage/images/banners/banner-9.png') }}" alt="newsletter" />
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section class="featured section-padding">
         <div class="container">
             <div class="row">
                 <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                     <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay="0">
                         <div class="banner-icon">
                             <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-1.svg') }}" alt="" />
                         </div>
                         <div class="banner-text">
                             <h3 class="icon-box-title">Harga terbaik</h3>
                             <p>Menawarkan harga termurah</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                     <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".1s">
                         <div class="banner-icon">
                             <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-2.svg') }}" alt="" />
                         </div>
                         <div class="banner-text">
                             <h3 class="icon-box-title">Free ongkir</h3>
                             <p>Bebas ongkir seluruh daerah</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                     <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".2s">
                         <div class="banner-icon">
                             <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-3.svg') }}" alt="" />
                         </div>
                         <div class="banner-text">
                             <h3 class="icon-box-title">Banyak promo</h3>
                             <p>Temukan banyak promo dengan mendaftar</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                     <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".3s">
                         <div class="banner-icon">
                             <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-4.svg') }}" alt="" />
                         </div>
                         <div class="banner-text">
                             <h3 class="icon-box-title">Banyak pilihan</h3>
                             <p>Banyak pilihan produk menarik</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                     <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".4s">
                         <div class="banner-icon">
                             <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-5.svg') }}" alt="" />
                         </div>
                         <div class="banner-text">
                             <h3 class="icon-box-title">Produk berkualitas</h3>
                             <p>Harga termurah dan produk berkualitas</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section class="section-padding footer-mid">
         <div class="container pt-15 pb-20">
             <div class="row">
                 <div class="col">
                     <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                         data-wow-delay="0">
                         <div class="logo mb-30">
                             <a href="index.html" class="mb-15"><img
                                     src="{{ asset('storage/images/themes/' . getSetting('logo')) }}"
                                     alt="logo" /></a>
                             <p class="font-lg text-heading">{{ getSetting('web_description') }}</p>
                         </div>
                         <ul class="contact-infor">
                             <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-location.svg') }}"
                                     alt="" /><strong>Alamat:
                                 </strong> <span>{{ getSetting('address') }}</span>
                             </li>
                             <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-contact.svg') }}"
                                     alt="" /><strong>Kontak:</strong><span>{{ getSetting('phone') }}</span></li>
                             <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-email-2.svg') }}"
                                     alt="" /><strong>Email:</strong><span>{{ getSetting('email') }}</span></li>
                         </ul>
                     </div>
                 </div>
                 <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                     <h4 class="widget-title">Miljo Mart</h4>
                     <ul class="footer-list mb-sm-5 mb-md-0">
                         <li><a href="#">Tentang Kami</a></li>
                         <li><a href="#">Informasi Pengiriman</a></li>
                         <li><a href="#">Kebijakan Privasi</a></li>
                         <li><a href="#">Syarat &amp; Ketentuan</a></li>
                         <li><a href="#">Kontak Kami</a></li>
                         <li><a href="#">Pusat Bantuan</a></li>
                         <li><a href="#">Karir</a></li>
                     </ul>
                 </div>
                 <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                     <h4 class="widget-title">Akun</h4>
                     <ul class="footer-list mb-sm-5 mb-md-0">
                         <li><a href="#">Order Tracking </a></li>
                         <li><a href="#">Detail Pengiriman</a></li>
                     </ul>
                 </div>
                 <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                     <h4 class="widget-title">Perusahaan</h4>
                     <ul class="footer-list mb-sm-5 mb-md-0">
                         <li><a href="#">Daftar Toko</a></li>
                         <li><a href="#">Program Afiliasi</a></li>
                         <li><a href="#">Bisnis Pertanian</a></li>
                         <li><a href="#">Karir Pertanian</a></li>
                         <li><a href="#">Supplier Kami</a></li>
                         <li><a href="#">Promosi</a></li>
                     </ul>
                 </div>
                 <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                     <h4 class="widget-title">Kategori Populer</h4>
                     <ul class="footer-list mb-sm-5 mb-md-0">
                         @foreach (getProductCategories(7, 'id', 'asc') as $item)
                             <li><a href="{{ url('frontend.categories', $item->slug) }}">{{ $item->name }}</a>
                             </li>
                         @endforeach
                     </ul>
                 </div>
                 <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp"
                     data-wow-delay=".5s">
                     <h4 class="widget-title">Install Aplikasi</h4>
                     <p class="">Dari App Store atau Google Play Store</p>
                     <div class="download-app">
                         <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active"
                                 src="{{ asset('assets/frontend/imgs/theme/app-store.jpg') }}" alt="" /></a>
                         <a href="#" class="hover-up mb-sm-2"><img
                                 src="{{ asset('assets/frontend/imgs/theme/google-play.jpg') }}" alt="" /></a>
                     </div>
                     <p class="mb-20">Secured Payment Gateways</p>
                     <img class="" src="{{ asset('assets/frontend/imgs/theme/payment-method.png') }}"
                         alt="" />
                 </div>
             </div>
     </section>
     <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
         <div class="row align-items-center">
             <div class="col-12 mb-30">
                 <div class="footer-bottom"></div>
             </div>
             <div class="col-xl-4 col-lg-6 col-md-6">
                 <p class="font-sm mb-0">&copy; 2021, <strong class="text-brand">PT Mlijo Mart Indonesia</strong>
                     <br />All rights reserved
                 </p>
             </div>
             <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                 {{-- <div class="hotline d-lg-inline-flex mr-30">
                     <img src="{{ asset('assets/frontend/imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                     <p>1900 - 6666<span>Working 8:00 - 22:00</span></p>
                 </div> --}}
                 {{-- <div class="hotline d-lg-inline-flex">
                     <img src="{{ asset('assets/frontend/imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                     <p>{{ getSetting('cs') }}<span>24/7 Support Center</span></p>
                 </div> --}}
             </div>
             <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                 <div class="mobile-social-icon">
                     <h6>Temukan kami di</h6>
                     <a href="https://facebook.com/{{ getSetting('fb') }}"><img
                             src="{{ asset('assets/frontend/imgs/theme/icons/icon-facebook-white.svg') }}"
                             alt="" /></a>
                     <a href="https://twitter.com/{{ getSetting('fb') }}"><img
                             src="{{ asset('assets/frontend/imgs/theme/icons/icon-twitter-white.svg') }}"
                             alt="" /></a>
                     <a href="https://instagram.com/{{ getSetting('fb') }}"><img
                             src="{{ asset('assets/frontend/imgs/theme/icons/icon-instagram-white.svg') }}"
                             alt="" /></a>
                     <a href="https://youtube.com/c/{{ getSetting('fb') }}"><img
                             src="{{ asset('assets/frontend/imgs/theme/icons/icon-youtube-white.svg') }}"
                             alt="" /></a>
                 </div>
             </div>
         </div>
     </div>
 </footer>
