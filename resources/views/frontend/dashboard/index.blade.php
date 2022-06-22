   @extends('frontend.layouts.app')
   @section('breadcrumb')
       <div class="page-header breadcrumb-wrap">
           <div class="container">
               <div class="breadcrumb">
                   <a href="{{ route('frontend.home') }}" rel="nofollow">
                       <i class="fi-rs-home mr-5"></i>
                       Home
                   </a>
                   <span></span> {{ $title }}
               </div>
           </div>
       </div>
   @endsection
   @section('content')
       <div class="page-content pt-150 pb-150">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12 m-auto">
                       <div class="row">
                           <div class="col-md-3">
                               <div class="dashboard-menu">
                                   <ul class="nav flex-column" role="tablist">
                                       <li class="nav-item">
                                           <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab"
                                               href="#dashboard" role="tab" aria-controls="dashboard"
                                               aria-selected="false"><i
                                                   class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders"
                                               role="tab" aria-controls="orders" aria-selected="false"><i
                                                   class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab"
                                               href="#track-orders" role="tab" aria-controls="track-orders"
                                               aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Order
                                               Tracking</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address"
                                               role="tab" aria-controls="address" aria-selected="true"><i
                                                   class="fi-rs-marker mr-10"></i>Alamat Saya</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                                               href="#account-detail" role="tab" aria-controls="account-detail"
                                               aria-selected="true"><i class="fi-rs-user mr-10"></i>Detail Akun</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" href="{{ route('logout') }}" data-toggle="logout"
                                               data-form="#formLogout"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           <div class="col-md-9">
                               <div class="tab-content account dashboard-content pl-50">
                                   <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                       aria-labelledby="dashboard-tab">
                                       <div class="card">
                                           <div class="card-header">
                                               <h3 class="mb-0">Hello {{ getInfoLogin()->userable->name }}!</h3>
                                           </div>
                                           <div class="card-body">
                                               <p>
                                                   Selamat datang di platform Mlijo, cari segala kebutuhan sehari-harimu
                                                   disini dengan penawaran harga terbaik dan produk segar setiap harinya.
                                               </p>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                       <div class="card">
                                           <div class="card-header">
                                               <h3 class="mb-0">Pesanan</h3>
                                           </div>
                                           <div class="card-body">
                                               <div class="table-responsive">
                                                   <table class="table">
                                                       <thead>
                                                           <tr>
                                                               <th>No</th>
                                                               <th>Order</th>
                                                               <th>Tanggal</th>
                                                               <th>Status</th>
                                                               <th>Subtotal</th>
                                                               <th>Kode Unik</th>
                                                               <th>Ongkir</th>
                                                               <th>Total</th>
                                                               <th>Aksi</th>
                                                           </tr>
                                                       </thead>
                                                       <tbody>
                                                           @foreach ($orders as $item)
                                                               <tr>
                                                                   <td>{{ $loop->iteration }}</td>
                                                                   <td>#{{ $item->order_code }}</td>
                                                                   <td>{{ $item->created_at }}</td>
                                                                   <td>{{ $item->status_order }}</td>
                                                                   <td>Rp
                                                                       {{ number_format($item->orderDetail->sum('total')) }}
                                                                   </td>
                                                                   <td>
                                                                       {{ $item->unique_code }}
                                                                   </td>
                                                                   <td>
                                                                       Rp {{ number_format($item->shipping_total) }}
                                                                       <p><strong>{{ $item->shipping->name }}</strong>
                                                                       </p>
                                                                       <span>No. Resi :
                                                                           {{ $item->receipt_number == null ? '-' : $item->receipt_number }}</span>
                                                                   </td>
                                                                   <td>Rp
                                                                       {{ number_format($item->orderDetail->sum('total') + $item->shipping_total + $item->unique_code) }}
                                                                       ({{ $item->orderDetail->count() }} item)
                                                                   </td>
                                                                   <td>
                                                                       <a href="#" class="btn-small d-block">View</a>
                                                                   </td>
                                                               </tr>
                                                           @endforeach

                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="tab-pane fade" id="track-orders" role="tabpanel"
                                       aria-labelledby="track-orders-tab">
                                       <div class="card">
                                           <div class="card-header">
                                               <h3 class="mb-0">Lacak Pesanan</h3>
                                           </div>
                                           <div class="card-body contact-from-area">
                                               <p>Untuk melacak pesanan Anda, silakan masukkan ID Pesanan Anda pada form di
                                                   bawah ini dan tekan
                                                   tombol "Lacak".</p>
                                               <div class="row">
                                                   <div class="col-lg-8">
                                                       <form class="contact-form-style mt-30 mb-50" action="#"
                                                           method="post">
                                                           <div class="input-style mb-20">
                                                               <label>Order ID</label>
                                                               <input name="order_id" placeholder="Masukan kode pesanan"
                                                                   type="text" id="order_id" />
                                                           </div>
                                                           <button class="submit submit-auto-width" type="button"
                                                               id="track-bt">Lacak</button>
                                                       </form>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <div class="col-md-12">
                                                       <div class="xp-actions-history ml-3" id="tracking-body">
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="tab-pane fade" id="address" role="tabpanel"
                                       aria-labelledby="address-tab">
                                       <div class="row">
                                           <div class="col-lg-6">
                                               <div class="card mb-3 mb-lg-0">
                                                   <div class="card-header">
                                                       <h3 class="mb-0">Alamat Saya</h3>
                                                   </div>
                                                   <div class="card-body">
                                                       <div class="card mb-3 p-2">
                                                           <div class="card-body">
                                                               <div class="vendor-info mb-15">
                                                                   <ul class="font-sm">
                                                                       <li>
                                                                           <h6 class="mb-1">Alamat</h6>
                                                                           <strong>{{ $customerAddress->name }}
                                                                               ({{ $customerAddress->phone_number }})
                                                                           </strong><br>
                                                                           <span>{{ $customerAddress->address }}</span><br>
                                                                           <span>{{ $customerAddress->district }},
                                                                               {{ $customerAddress->city }},
                                                                               {{ $customerAddress->province }}
                                                                               {{ $customerAddress->postal_code }}</span><br>
                                                                           <a href="#" class="btn-small">Edit</a>
                                                                       </li>
                                                                   </ul>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="tab-pane fade" id="account-detail" role="tabpanel"
                                       aria-labelledby="account-detail-tab">
                                       <div class="card">
                                           <div class="card-header">
                                               <h5>Account Details</h5>
                                           </div>
                                           <div class="card-body">
                                               <p>Already have an account? <a href="page-login.html">Log in instead!</a>
                                               </p>
                                               <form method="post" name="enq">
                                                   <div class="row">
                                                       <div class="form-group col-md-6">
                                                           <label>First Name <span class="required">*</span></label>
                                                           <input required="" class="form-control" name="name"
                                                               type="text" />
                                                       </div>
                                                       <div class="form-group col-md-6">
                                                           <label>Last Name <span class="required">*</span></label>
                                                           <input required="" class="form-control" name="phone" />
                                                       </div>
                                                       <div class="form-group col-md-12">
                                                           <label>Display Name <span class="required">*</span></label>
                                                           <input required="" class="form-control" name="dname"
                                                               type="text" />
                                                       </div>
                                                       <div class="form-group col-md-12">
                                                           <label>Email Address <span class="required">*</span></label>
                                                           <input required="" class="form-control" name="email"
                                                               type="email" />
                                                       </div>
                                                       <div class="form-group col-md-12">
                                                           <label>Current Password <span class="required">*</span></label>
                                                           <input required="" class="form-control" name="password"
                                                               type="password" />
                                                       </div>
                                                       <div class="form-group col-md-12">
                                                           <label>New Password <span class="required">*</span></label>
                                                           <input required="" class="form-control" name="npassword"
                                                               type="password" />
                                                       </div>
                                                       <div class="form-group col-md-12">
                                                           <label>Confirm Password <span class="required">*</span></label>
                                                           <input required="" class="form-control" name="cpassword"
                                                               type="password" />
                                                       </div>
                                                       <div class="col-md-12">
                                                           <button type="submit"
                                                               class="btn btn-fill-out submit font-weight-bold"
                                                               name="submit" value="Submit">Save Change</button>
                                                       </div>
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
           </div>
       </div>
   @endsection
