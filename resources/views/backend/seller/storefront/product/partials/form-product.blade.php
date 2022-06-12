<div class="modal fade" id="form-modal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Tambah Produk</h4>
            </div>
            <div class="modal-body">
                <table class="table zero-configuration" id="table-create-product" width="100%"
                    data-url="{{ route('seller.storefronts.products.get-data-product', $sellerCategory->hashid) }}">
                    <thead>
                        <th></th>
                        <th></th>
                        <th>Info Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn post-add-bt btn-primary btn-save-product">Simpan</button>
            </div>
        </div>
    </div>
</div>
