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
    <div class="card mb-3 pl-2 pr-2 pb-3">
        <div class="card-body">
            <ul class="nav nav-tabs border-bottom" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="scholarship-student-tab-justified" data-toggle="tab"
                        href="#scholarship-student-just" role="tab" aria-controls="home-just" aria-selected="true"><i
                            class="feather icon-bookmark"></i> Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="scholarship-disbursement-tab-justified" data-toggle="tab"
                        href="#scholarship-disbursement-just" role="tab" aria-controls="profile-just"
                        aria-selected="true"><i class="feather icon-file-text"></i> Catatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="scholarship-use-tab-justified" data-toggle="tab" href="#scholarship-use-just"
                        role="tab" aria-controls="profile-just" aria-selected="true"><i
                            class="feather icon-map-pin"></i> Lokasi</a>
                </li>
            </ul>
            <div class="tab-content pt-1">
                <div class="tab-pane active" id="scholarship-student-just" role="tabpanel"
                    aria-labelledby="scholarship-student-tab-justified">
                    <div class="mb-2">
                        <h4 class="font-weight-bold">Informasi</h4>
                        <p>Informasi dasar toko.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Nama Toko</h5>
                                    <p>Sayurini</p>
                                    <h5>Domain Toko</h5>
                                    <p>www.tokopedia.com/<strong>sayurini</strong> </p>
                                    <div class="form-group">
                                        <button type="button"
                                            class="btn btn-light waves-effect waves-float waves-light">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" class="form-control" id="" name="slogan">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="text-right">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-float waves-light">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <h4 class="font-weight-bold">Status</h4>
                        <p>Status toko.</p>
                    </div>
                    <div class="form-selectgroup form-selectgroup-pills">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="icons" value="home" class="form-selectgroup-input"
                                checked="">
                            <span class="form-selectgroup-label pl-1 pr-1">
                                Buka Toko
                            </span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="icons" value="user" class="form-selectgroup-input">
                            <span class="form-selectgroup-label pl-1 pr-1">
                                Tutup Toko
                            </span>
                        </label>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <h4 class="font-weight-bold">Gambar Toko</h4>
                                <p>Ukuran optimal 300 x 300 piksel dengan Besar file: Maksimum 10.000.000 bytes (10
                                    Megabytes).
                                    Ekstensi file yang diperbolehkan: JPG, JPEG, PNG.</p>
                            </div>
                            <div class="col-md-4">
                                <img src="https://blog.skillacademy.com/hs-fs/hubfs/brand-ambassador-adalah.jpg?width=820&name=brand-ambassador-adalah.jpg"
                                    class="rounded float-start" alt="..."
                                    style="width: 100% !important;height: 160px !important;object-fit: cover !important;">
                                <div class="mt-2">
                                    <button type="button"
                                        class="btn btn-light waves-effect waves-float waves-light btn-block">Pilih
                                        Foto</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <h4 class="font-weight-bold">Sampul Toko</h4>
                                <p>Ukuran optimal 300 x 300 piksel dengan Besar file: Maksimum 10.000.000 bytes (10
                                    Megabytes).
                                    Ekstensi file yang diperbolehkan: JPG, JPEG, PNG.</p>
                            </div>
                            <div class="col-md-4">
                                <img src="https://blog.skillacademy.com/hs-fs/hubfs/brand-ambassador-adalah.jpg?width=820&name=brand-ambassador-adalah.jpg"
                                    class="rounded float-start" alt="..."
                                    style="width: 100% !important;height: 160px !important;object-fit: cover !important;">
                                <div class="mt-2">
                                    <button type="button"
                                        class="btn btn-light waves-effect waves-float waves-light btn-block">Pilih
                                        Foto</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="mb-2">
                        <h4 class="font-weight-bold">Sosial Media</h4>
                        <p>Sosial media toko.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Twitter</label>
                                <input type="text" class="form-control" id="" name="twitter">
                            </div>
                            <div class="form-group">
                                <label for="">Instagram</label>
                                <input type="text" class="form-control" id="" name="instagram">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Facebook</label>
                                <input type="text" class="form-control" id="" name="facebook">
                            </div>
                            <div class="form-group">
                                <label for="">TikTok</label>
                                <input type="text" class="form-control" id="" name="tiktok">
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-float waves-light">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="scholarship-disbursement-just" role="tabpanel"
                    aria-labelledby="scholarship-disbursement-tab-justified">
                    <div class="mb-2">
                        <h4 class="">Catatan Toko</h4>
                        <p>Lihat catatan toko di <a href=""><strong>Halaman Toko</strong></a>.</p>
                    </div>
                    <div class="col-12 text-right mb-2">
                        <button class="btn btn-primary btn-add waves-effect waves-light" data-toggle="modal"
                            data-target="#form-modal"><i class="feather icon-plus"></i> Tambah Catatan</button>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table zero-configuration" id="noteTable"
                                data-url="{{ route('seller.settings.get-notes') }}" width="100%">
                                <thead>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Catatan</th>
                                    <th></th>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="scholarship-use-just" role="tabpanel"
                    aria-labelledby="scholarship-use-tab-justified">
                    <div class="mb-2">
                        <h4 class="">Lokasi Toko </h4>
                        <p>Kamu bisa masukkan lokasi dan informasi toko di sini.</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
