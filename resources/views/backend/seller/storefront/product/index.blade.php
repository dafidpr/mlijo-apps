@extends('backend.layouts.ajax')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('seller.dashboards') }}" data-toggle="ajax">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('seller.storefronts') }}" data-toggle="ajax">{{ $sellerCategory->name }}</a>
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
                <div class="col-12 text-right mb-2">
                    <button class="btn btn-primary btn-add waves-effect waves-light" data-toggle="modal"
                        data-target="#form-modal"><i class="feather icon-plus"></i> Tambah Produk</button>
                </div>
                <table class="table zero-configuration" id="dataTable"
                    data-url="{{ route('seller.storefronts.products.get-data', ['sellerCategory' => $sellerCategory->hashid]) }}"
                    width="100%">
                    <thead>
                        <th>No.</th>
                        <th>Info Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Expired</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('backend.seller.storefront.product.partials.form-product')
@endsection
