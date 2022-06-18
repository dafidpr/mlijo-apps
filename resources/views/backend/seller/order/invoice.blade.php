@extends('backend.layouts.ajax')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('seller.dashboards') }}" data-toggle="ajax">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('seller.orders') }}" data-toggle="ajax">Order</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $title }}
        </li>
    </ol>
@endsection

@section('content')
@endsection
