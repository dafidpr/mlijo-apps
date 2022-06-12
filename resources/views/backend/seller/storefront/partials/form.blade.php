<div class="modal fade text-left" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form-modal">Tambah Etalase Toko</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="storefront-form" action="{{ route('seller.storefronts.store') }}" method="POST"
                data-request="ajax" data-success-callback="{{ route('seller.storefronts') }}">
                <div class="modal-body">
                    <div class="alert alert-info mt-1 alert-validation-msg" role="alert">
                        <i class="feather icon-info mr-1 align-middle"></i>
                        <span>Etalase yang telah di tambahkan akan otomatis aktif.</span>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Etalase <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Etalase"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Icon <span class="text-danger">*</span></label>
                        <input type="file" class="dropify" id="icon" class="form-control" name="icon">
                        <div class="message"></div>
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
