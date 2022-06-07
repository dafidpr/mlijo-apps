<div class="modal fade text-left" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form-modal">Tambah Sub Kategori Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="product-sub-category-form" action="{{ route('admin.product-sub-categories.store') }}"
                method="POST" data-request="ajax" data-success-callback="{{ route('admin.product-sub-categories') }}">
                <div class="modal-body">
                    <div class="alert alert-info mt-1 alert-validation-msg" role="alert">
                        <i class="feather icon-info mr-1 align-middle"></i>
                        <span>Sub kategori yang telah di tambahkan akan otomatis aktif.</span>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori Produk<span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-control select2 d-block" style="width: 100%">
                            <option value="">Pilih Kategori</option>
                            @foreach ($productCategories as $item)
                                <option value="{{ hashId($item->id) }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Sub Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Sub Kategori"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar <span class="text-danger">*</span></label>
                        <input type="file" class="dropify" id="image" class="form-control" name="image">
                        <div class="message"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan </label>
                        <input type="text" name="description" id="description" class="form-control"
                            placeholder="Keterangan" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary waves-effect waves-light" type="submit"><i
                            class="feather icon-send"></i>
                        Submit</button>
                </div>
            </form>
        </div>
    </div>
