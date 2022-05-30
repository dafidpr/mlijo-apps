   @extends('frontend.layouts.app')
   @section('breadcrumb')
       <div class="page-header breadcrumb-wrap">
           <div class="container">
               <div class="breadcrumb">
                   <a href="{{ route('frontend.home') }}" rel="nofollow">
                       <i class="fi-rs-home mr-5"></i>
                       Home
                   </a>
                   <span></span> Registrasi
               </div>
           </div>
       </div>
   @endsection
   @section('content')
       <div class="page-content pt-150 pb-150">
           <div class="container">
               <div class="row">
                   <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                       <div class="row">
                           <div class="col-lg-6 pr-30 d-none d-lg-block">
                               <img class="border-radius-15"
                                   src="{{ asset('storage/images/themes/illustrations/ecommerce-2.svg') }}" alt="" />
                           </div>
                           <div class="col-lg-6 col-md-8">
                               <div class="login_wrap widget-taber-content background-white">
                                   <div class="padding_eight_all bg-white">
                                       <div class="heading_s1">
                                           <h1 class="mb-5">Daftar</h1>
                                           <p class="mb-30">Sudah punya akun ? <a
                                                   href="{{ route('frontend.login') }}">Masuk</a></p>
                                       </div>
                                       <form method="post">
                                           <div class="form-group">
                                               <input type="text" required="" name="name" placeholder="Nama Lengkap"
                                                   autocomplete="off" />
                                           </div>
                                           <div class="form-group">
                                               <input type="text" required="" name="username" placeholder="Username" />
                                           </div>
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <input type="text" required="" name="email" placeholder="Email"
                                                           autocomplete="off" />
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <input type="text" required="" name="phone" placeholder="Nomor HP"
                                                           autocomplete="off" autocomplete="off" />
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <input required="" type="password" name="password"
                                                           placeholder="Password" />
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <input required="" type="password" name="password"
                                                           placeholder="Konfirmasi password" />
                                                   </div>
                                               </div>
                                           </div>



                                           <div class="payment_option mb-50">
                                               <div class="custome-radio">
                                                   <input class="form-check-input" required="" type="radio"
                                                       name="payment_option" id="exampleRadios3" checked="" />
                                                   <label class="form-check-label" for="exampleRadios3"
                                                       data-bs-toggle="collapse" data-target="#bankTranfer"
                                                       aria-controls="bankTranfer">Daftar sebagai customer</label>
                                               </div>
                                               <div class="custome-radio">
                                                   <input class="form-check-input" required="" type="radio"
                                                       name="payment_option" id="exampleRadios4" checked="" />
                                                   <label class="form-check-label" for="exampleRadios4"
                                                       data-bs-toggle="collapse" data-target="#checkPayment"
                                                       aria-controls="checkPayment">Daftar sebagai seller</label>
                                               </div>
                                           </div>
                                           <div class="form-group mb-30">
                                               <button type="submit"
                                                   class="btn btn-fill-out btn-block hover-up font-weight-bold"
                                                   name="login">Registrasi</button>
                                           </div>

                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   @endsection
