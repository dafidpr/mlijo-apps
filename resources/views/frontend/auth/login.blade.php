   @extends('frontend.layouts.app')
   @section('breadcrumb')
       <div class="page-header breadcrumb-wrap">
           <div class="container">
               <div class="breadcrumb">
                   <a href="{{ route('frontend.home') }}" rel="nofollow">
                       <i class="fi-rs-home mr-5"></i>
                       Home
                   </a>
                   <span></span> Masuk
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
                                   src="{{ asset('storage/images/themes/illustrations/ecommerce.svg') }}" alt="" />
                           </div>
                           <div class="col-lg-6 col-md-8">
                               <div class="login_wrap widget-taber-content background-white">
                                   <div class="padding_eight_all bg-white">
                                       <div class="heading_s1">
                                           <h1 class="mb-5">Masuk</h1>
                                           <p class="mb-30">Belum punya akun ? <a
                                                   href="{{ route('frontend.register') }}">Buat Akun</a></p>
                                       </div>
                                       <form method="post" action="{{ route('frontend.login') }}" data-request="ajax"
                                           data-redirect="true" data-success-callback="{{ route('check-point') }}">
                                           @csrf
                                           <div class="form-group">
                                               <input type="text" class="form-control" name="username"
                                                   placeholder="Username *" autocomplete="off" />
                                           </div>
                                           <div class="form-group">
                                               <input type="password" class="form-control" name="password"
                                                   placeholder="Password *" />
                                           </div>
                                           <div class="login_footer form-group mb-50">
                                               <div class="chek-form">
                                                   <div class="custome-checkbox">
                                                       <input class="form-check-input" type="checkbox" name="checkbox"
                                                           id="exampleCheckbox1" value="" />
                                                       <label class="form-check-label" for="exampleCheckbox1"><span>Remember
                                                               me</span></label>
                                                   </div>
                                               </div>
                                               <a class="text-muted" href="#">Forgot password?</a>
                                           </div>
                                           <div class="form-group">
                                               <button type="submit" class="btn btn-heading btn-block hover-up"
                                                   name="login">Masuk</button>
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
