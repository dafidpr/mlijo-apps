@extends('backend.layouts.ajax')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-start pb-0">
                        <div>
                            <h2 class="text-bold-700 mb-0">{{ number_format($countCard['notPaid']) }}</h2>
                            <p>Belum Bayar</p>
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
                            <h2 class="text-bold-700 mb-0">{{ number_format($countCard['needProcess']) }}</h2>
                            <p> Perlu Diproses</p>
                        </div>
                        <div class="avatar bg-rgba-warning p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-truck text-warning font-medium-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-start pb-0">
                        <div>
                            <h2 class="text-bold-700 mb-0">{{ number_format($countCard['doneProcess']) }}</h2>
                            <p> Telah Diproses</p>
                        </div>
                        <div class="avatar bg-rgba-success p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-check-circle text-success font-medium-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-start pb-0">
                        <div>
                            <h2 class="text-bold-700 mb-0">{{ number_format($countCard['outOfStock']) }}</h2>
                            <p>Produk Habis</p>
                        </div>
                        <div class="avatar bg-rgba-warning p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-package text-warning font-medium-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="card-title">Bisnis Saya</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body pb-0" style="position: relative;">
                            <div class="d-flex justify-content-start">
                                <div class="mr-2">
                                    <p class="mb-50 text-bold-600">Bulan Ini</p>
                                    <h2 class="text-bold-400">
                                        <span class="text-success">Rp{{ number_format($income['currentMonth']) }}</span>
                                    </h2>
                                </div>
                                <div>
                                    <p class="mb-50 text-bold-600">Bulan Lalu</p>
                                    <h2 class="text-bold-400">
                                        <span>Rp{{ number_format($income['lastMonth']) }}</span>
                                    </h2>
                                </div>
                            </div>
                            <div id="sales-chart" data-colors='["#3BB77E", "#34c38f"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
