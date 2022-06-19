<div class="modal fade text-left" id="store-modal" tabindex="-1" role="dialog" aria-labelledby="store-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="store-modal">Ubah Informasi Toko</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="store-form" action="{{ route('seller.settings.update-info') }}" method="POST"
                data-request="ajax" data-success-callback="{{ route('seller.settings') }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Toko <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Toko"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Domain Toko <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="domain-store">www.mlijo.com/</span>
                            </div>
                            <input type="text" class="form-control" name="domain" id="domain"
                                placeholder="Domain Toko" aria-describedby="domain-store">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary waves-effect waves-light" type="submit"><i
                            class="feather icon-send"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
