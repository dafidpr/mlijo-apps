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
    <form action="{{ route('seller.shippings.store') }}" method="post" data-request="ajax"
        data-success-callback="{{ route('seller.shippings') }}">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Layanan Pengiriman</h4>
            </div>
            <div class="card-body">
                @csrf
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                    <div class="row">
                        @foreach ($shippings as $item)
                            <div class="col-md-4">
                                <label class="form-selectgroup-item flex-fill">
                                    <input type="checkbox" name="shippings[]" value="{{ $item['id'] }}"
                                        class="form-selectgroup-input" {{ $item['checked'] == true ? 'checked' : '' }}>
                                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                                        <div class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div class="form-selectgroup-label-content d-flex align-items-center">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="{{ asset('storage/images/shippings/' . $item['picture']) }}"
                                                        style="width: 100% !important;height: 25px !important;" alt="">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="font-weight-bold">{{ $item['name'] }}</div>
                                                    <div class="text-muted">Reguler</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @can('create-seller-shipping')
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            @endcan
        </div>
    </form>
@endsection
