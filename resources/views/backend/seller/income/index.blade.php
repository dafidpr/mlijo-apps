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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Akan Dilepaskan</h4>
                </div>
                <div class="card-header d-flex align-items-start pb-2">
                    <div>
                        <h2 class="text-bold-700 mb-0">Rp {{ number_format($income['notRelease']) }}</h2>
                        <p>Total</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sudah Dilepaskan</h4>
                </div>
                <div class="row pb-2">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card-header d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">Rp
                                    {{ number_format($income['releasedThisWeekTotal']) }}</h2>
                                <p>Minggu Ini</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card-header d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">Rp
                                    {{ number_format($income['releasedThisMonthTotal']) }}</h2>
                                <p>Bulan Ini</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card-header d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">Rp {{ number_format($income['releasedTotal']) }}
                                </h2>
                                <p>Total</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3 pl-2 pr-2 pb-3">
                <div class="card-body">
                    <ul class="nav nav-tabs border-bottom" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="scholarship-student-tab-justified" data-toggle="tab"
                                href="#scholarship-student-just" role="tab" aria-controls="home-just"
                                aria-selected="true"><i class="feather icon-bookmark"></i> Akan Dilepaskan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="scholarship-disbursement-tab-justified" data-toggle="tab"
                                href="#scholarship-disbursement-just" role="tab" aria-controls="profile-just"
                                aria-selected="true"><i class="feather icon-file-text"></i> Sudah Dilepaskan</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-1">
                        <div class="tab-pane active" id="scholarship-student-just" role="tabpanel"
                            aria-labelledby="scholarship-student-tab-justified">
                            <div class="mb-2">
                                <h4 class="font-weight-bold">Dana Akan Dilepaskan</h4>
                                <p>Daftar dana yang akan dilepaskan.</p>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <fieldset class="form-group">
                                        <label for="date-range">Tanggal</label>
                                        <input type="text" class="form-control daterange-picker"
                                            id="date-range-not-release" placeholder="Filter Tanggal">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table zero-configuration" id="income-not-release-table"
                                        data-url="{{ route('seller.incomes.get-not-release-income') }}" width="100%">
                                        <thead>
                                            <th width="30%">Pesanan</th>
                                            <th width="10%">Tanggal Transaksi</th>
                                            <th width="10%">Status</th>
                                            <th width="20%">Jumlah Dana Dilepaskan</th>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="scholarship-disbursement-just" role="tabpanel"
                            aria-labelledby="scholarship-disbursement-tab-justified">
                            <div class="mb-2">
                                <h4 class="font-weight-bold">Dana Sudah Dilepaskan</h4>
                                <p>Daftar dana yang sudah dilepaskan.</p>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <fieldset class="form-group">
                                        <label for="date-range">Tanggal</label>
                                        <input type="text" class="form-control daterange-picker" id="date-range-release"
                                            placeholder="Filter Tanggal">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table zero-configuration" id="income-release-table"
                                        data-url="{{ route('seller.incomes.get-release-income') }}" width="100%">
                                        <thead>
                                            <th width="30%">Pesanan</th>
                                            <th width="10%">Tanggal Transaksi</th>
                                            <th width="10%">Status</th>
                                            <th width="20%">Jumlah Dana Dilepaskan</th>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
