<div class="modal fade text-left" id="cover-modal" tabindex="-1" role="dialog" aria-labelledby="cover-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="cover-modal">Ubah Cover Toko</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="cover-form" action="{{ route('seller.settings.update-cover') }}" method="POST"
                data-request="ajax" data-success-callback="{{ route('seller.settings') }}"
                enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Foto Cover <span class="text-danger">*</span></label>
                        <input type="file" class="dropify" id="cover" class="form-control" name="cover">
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
</div>
