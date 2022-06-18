<div class="modal fade text-left" id="receipt-modal" tabindex="-1" role="dialog" aria-labelledby="receipt-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="receipt-modal">Input Resi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="receipt-form" action="" method="POST" data-request="ajax"
                data-success-callback="{{ route('seller.orders') }}">
                <div class="modal-body">
                    <div class="alert alert-warning mt-1 alert-validation-msg" role="alert">
                        <i class="feather icon-info mr-1 align-middle"></i>
                        <span>Nomor resi hanya bisa diinput ketika sudah melakukan pembayaran dan status pesanan
                            <strong>Siap Kirim</strong> atau <strong>Dikemas</strong>.</span>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Resi <span class="text-danger">*</span></label>
                        <input type="text" name="receipt_number" id="receipt_number" class="form-control"
                            placeholder="Nomor Resi" autocomplete="off">
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
