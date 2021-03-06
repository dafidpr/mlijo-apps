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
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                @can('create-seller-storefront')
                    <div class="col-12 text-right mb-2">
                        <button class="btn btn-primary btn-add waves-effect waves-light" data-toggle="modal"
                            data-target="#form-modal"><i class="feather icon-plus"></i> Tambah Etalase Toko</button>
                    </div>
                @endcan
                <table class="table zero-configuration" id="dataTable"
                    data-url="{{ route('seller.storefronts.get-data') }}" width="100%">
                    <thead>
                        <th>No.</th>
                        <th>Nama Etalase</th>
                        <th>Icon</th>
                        <th>Jumlah Produk</th>
                        <th>Aktif</th>
                        <th></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('backend.seller.storefront.partials.form')
@endsection
