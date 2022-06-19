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
                @can('create-seller-products')
                    <div class="col-12 text-right mb-2">
                        <a href="{{ route('seller.products.create') }}" data-toggle="ajax"
                            class="btn btn-primary btn-add waves-effect waves-light"><i class="feather icon-plus"></i> Tambah
                            Produk</a>
                    </div>
                @endcan
                <table class="table zero-configuration" id="dataTable" data-url="{{ route('seller.products.get-data') }}"
                    width="100%">
                    <thead>
                        <th>No.</th>
                        <th>Info Produk</th>
                        <th>Statistik</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Expired</th>
                        <th>Aktif</th>
                        <th></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('backend.seller.product.partials.image')
@endsection
