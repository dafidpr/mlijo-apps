@extends('backend.layouts.ajax')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('seller.dashboards') }}" data-toggle="ajax">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('seller.products') }}" data-toggle="ajax">Produk</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $title }}
        </li>
    </ol>
@endsection

@section('content')
    <form action="{{ $action }}" method="post" data-request="ajax" enctype="multipart/form-data"
        data-success-callback="{{ route('seller.products') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @isset($product)
                        <div class="alert alert-warning mt-1 alert-validation-msg" role="alert">
                            <i class="feather icon-info mr-1 align-middle"></i>
                            <span>Gambar produk yang ditambahkan pada form edit akan otomatis ditambahkan sebagai gambar
                                baru.</span>
                        </div>
                    @endisset
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informasi Produk</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Foto Produk <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="file" id="thumbnail" class="form-control dropify"
                                                name="thumbnail" data-show-loader="true" data-errors-position="outside"
                                                data-height="100" data-width="50">
                                            <span> <strong>Foto Utama</strong>* </span>
                                        </div>
                                        @for ($i = 1; $i < 4; $i++)
                                            <div class="col-md-2">
                                                <input type="file" id="product-image-{{ $i }}"
                                                    class="form-control dropify" name="product_image[]"
                                                    data-show-loader="true" data-errors-position="outside" data-height="100"
                                                    data-width="50" autocomplete="off">
                                                <span> Gambar {{ $i }}</span>
                                            </div>
                                        @endfor
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                        </div>
                                        @for ($i = 4; $i < 8; $i++)
                                            <div class="col-md-2">
                                                <input type="file" id="product-image-{{ $i }}"
                                                    class="form-control dropify" name="product_image[]"
                                                    data-show-loader="true" data-errors-position="outside" data-height="100"
                                                    data-width="50">
                                                <span> Gambar {{ $i }}</span>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Video Produk </span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="video-link" class="form-control" name="video"
                                                placeholder="Link Video Produk" autocomplete="off"
                                                value="{{ isset($product) ? $product->video : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Kategori Produk <span class="text-danger">*</span> </span>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="product_category" class="form-control select2"
                                                id="product-category">
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($productCategories as $item)
                                                    <option value="{{ $item->hashid }}"
                                                        {{ isset($product) ? ($product->productSubCategory->productCategory->id == $item->id ? 'selected' : '') : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-9">
                                            <select name="product_subcategory" class="form-control select2"
                                                id="product-subcategory" {{ isset($product) ? '' : 'disabled' }}>
                                                @isset($product)
                                                    <option value="">Pilih Sub Kategori</option>
                                                    @foreach ($productSubCategories as $sc)
                                                        <option value="{{ $sc->hashid }}"
                                                            {{ $product->product_sub_category_id == $sc->id ? 'selected' : '' }}>
                                                            {{ $sc->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Nama Produk <span class="text-danger">*</span> </span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="name" class="form-control" name="name"
                                                placeholder="Nama Produk"
                                                autocomplete="off"value="{{ isset($product) ? $product->name : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Keyword <span class="text-danger">*</span> </span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="keyword" class="form-control" name="keyword"
                                                placeholder="Keyword Pencarian Produk"
                                                autocomplete="off"value="{{ isset($product) ? $product->keywords : '' }}">
                                            <small><i>Setiap kata dipisahkan dengan koma (,)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Ringkasan Produk <span class="text-danger">*</span> </span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="summary" id="summary"
                                                placeholder="Ringkasan Produk"
                                                autocomplete="off"value="{{ isset($product) ? $product->summary : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Deskripsi Produk <span class="text-danger">*</span> </span>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ isset($product) ? $product->description : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>SKU Induk </span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="sku" class="form-control" name="sku"
                                                placeholder="SKU Induk Produk"
                                                autocomplete="off"value="{{ isset($product) ? $product->sku : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-header">
                                    <h4 class="card-title">Informasi Penjualan</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mr-1">
                                    <button type="button"
                                        class="btn float-right btn-outline-success mt-2 mr-5 waves-effect waves-light"> <i
                                            class="feather icon-plus"></i>Aktifkan Variasi</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Harga <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="price" class="form-control autonumeric"
                                                name="price" placeholder="Harga Produk (Rp)"
                                                autocomplete="off"value="{{ isset($product) ? $product->price : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Stok <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="stock" class="form-control" name="stock"
                                                placeholder="Stok Produk"
                                                autocomplete="off"value="{{ isset($product) ? $product->stock : '0' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Min Order <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="min-order" class="form-control" name="min_order"
                                                placeholder="Min. Order"
                                                value="{{ isset($product) ? $product->min_order : '1' }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Masa Penyimpanan <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="expired" id="expired"
                                                    placeholder="Masa Penyimpanan Produk" aria-describedby="basic-addon2"
                                                    value="1" autocomplete="off"
                                                    value="{{ isset($product) ? $product->expired : '' }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">hari</span>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pengiriman</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Berat <span class="text-danger">*</span></span>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="weight" id="weight"
                                                    placeholder="Berat Produk" aria-describedby="basic-addon2"
                                                    autocomplete="off"
                                                    value="{{ isset($product) ? $product->weight : '' }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">gr</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <span>Ukuran Paket</span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="width_size"
                                                    id="width-size" placeholder="L" aria-describedby="basic-addon2"
                                                    autocomplete="off"
                                                    value="{{ isset($product) ? $product->width_size : '' }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="long_size"
                                                    id="long-size" placeholder="P" aria-describedby="basic-addon2"
                                                    autocomplete="off"
                                                    value="{{ isset($product) ? $product->long_size : '' }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="height_size"
                                                    id="height-size" placeholder="T" aria-describedby="basic-addon2"
                                                    autocomplete="off"
                                                    value="{{ isset($product) ? $product->height_size : '' }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">cm</span>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="float-right">
                        <a href="{{ route('seller.products') }}" data-toggle="ajax"
                            class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Kembali</a>
                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
