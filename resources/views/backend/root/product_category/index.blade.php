@extends('backend.layouts.ajax')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboards') }}" data-toggle="ajax">Home</a>
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
                @can('create-product-categories')
                    <div class="col-12 text-right mb-2">
                        <button class="btn btn-primary btn-add waves-effect waves-light" data-toggle="modal"
                            data-target="#form-modal"><i class="feather icon-plus"></i> Tambah
                            Kategori Produk</button>
                    </div>
                @endcan
                <table class="table zero-configuration" id="dataTable"
                    data-url="{{ route('admin.product-categories.get-data') }}" width="100%">
                    <thead>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Icon</th>
                        <th>Slug</th>
                        <th>Keterangan</th>
                        <th>Aktif</th>
                        <th></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('backend.root.product_category.partials.form')
@endsection
