@extends('backend.layouts.ajax')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('seller.dashboards') }}" data-toggle="ajax">Home</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $title }}
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ number_format($pendingOrder) }}</h2>
                        <p>Menunggu Pembayaran</p>
                    </div>
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-clock text-warning font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ number_format($shippingOrder) }}</h2>
                        <p>Pesanan Sedang Dikirim</p>
                    </div>
                    <div class="avatar bg-rgba-info p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-truck text-info font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ number_format($failOrder) }}</h2>
                        <p>Pesanan Gagal</p>
                    </div>
                    <div class="avatar bg-rgba-danger p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-alert-triangle text-danger font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ number_format($doneOrder) }}</h2>
                        <p>Pesanan Selesai</p>
                    </div>
                    <div class="avatar bg-rgba-success p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-check-circle text-primary font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <fieldset class="form-group">
                                    <label for="date-range">Tanggal</label>
                                    <input type="text" class="form-control daterange-picker" id="date-range"
                                        placeholder="Filter Tanggal">
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="">Status Pembayaran</label>
                                <select name="payment_status" class="form-control" id="payment-status-selector">
                                    <option value="all">Semua Status Pembayaran</option>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="canceled">Cancel</option>
                                    <option value="fail">Failed</option>
                                </select>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="">Status Pesanan</label>
                                <select name="order_status" id="order-status-selector" class="form-control">
                                    <option value="all">Semua Status Pesanan</option>
                                    <option value="pending">Pending</option>
                                    <option value="processing">Dalam Proses</option>
                                    <option value="shipping">Sedang Dikirim</option>
                                    <option value="delivered">Pesanan Diterima</option>
                                    <option value="canceled">Pesanan Dicancel</option>
                                    <option value="done">Pesanan Selesai</option>
                                    <option value="fail">Pesanan Gagal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <table class="table zero-configuration" id="dataTable" data-url="{{ route('seller.orders.get-data') }}"
                    width="100%">
                    <thead>
                        <th width="50%">Info Order</th>
                        <th width="30%"></th>
                        <th width="20%"></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('backend.seller.order.partials.receipt')
    @include('backend.seller.order.partials.status-order')
    @include('backend.seller.order.partials.product-detail')
@endsection
