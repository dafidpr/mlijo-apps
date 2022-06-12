if (typeof table == 'undefined') {
    let table
}

table = initTable('#dataTable', [{
        name: 'id',
        data: null,
        width: '1%',
        mRender: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }
    },

    {
        name: 'name',
        data: 'name',
        mRender: function (data, type, row) {
            return `
                <div class="d-flex align-items-center">
                    <img class="rounded" src="${
                                  $('meta[name="asset-url"]').attr("content") +
                                  `storage/images/products/${row.thumbnail}`
                              }" alt="avatar" height="40" width="40">
                    <div class="d-block ml-2">
                        <p class="m-0 p-0"><strong>${data}</strong></p>
                        <small>SKU : ${
                            row.sku == null ? '-' : row.sku
                        }</small>
                    </div>
                </div>
            `
        }
    },
    {
        name: 'stats',
        data: 'name',
        mRender: function (data, type, row) {
            return `
                <div class="d-flex">
                    <div class="d-block">
                        <span><i class="feather icon-shopping-cart"></i> ${
                            row.cart_count
                        }</span>
                        <span><i class="feather icon-heart"></i> ${
                            row.wishlist_count
                        }</span>
                        <span><i class="feather icon-shopping-bag"></i> ${
                            row.order_count
                        }</span>
                    </div>
                </div>
            `
        }
    },
    {
        name: 'price',
        data: 'price',
        mRender: function (data, type, row) {
            return `
                <div class="d-flex">
                    <div class="d-block">
                        <p class="m-0 p-0 text-primary"><strong>${data}</strong></p>
                    </div>
                </div>
            `
        }
    },
    {
        name: 'stock',
        data: 'stock',
    },
    {
        name: 'expired',
        data: 'expired',
        mRender: function (data, type, row) {
            return data + ' hari'
        }
    },
    {
        name: 'is_active',
        data: 'is_active',
        mRender: function (data, type, row) {
            return `
                <div class="custom-control custom-switch switch-lg custom-switch-primary">
                    <input type="checkbox" class="custom-control-input" id="customSwitch9" ${(data) ? 'checked' : ''} onchange="updateStatus('${row.hashid}')">
                    <label class="custom-control-label" for="customSwitch9">
                        <span class="switch-text-left">Aktif</span>
                        <span class="switch-text-right">Tidak Aktif</span>
                    </label>
                </div>
            `
        }
    },
    {
        name: 'id',
        data: 'hashid',
        width: 150,
        sortable: false,
        mRender: function (data, type, row) {
            var render = ``

            if (userPermissions.includes('update-seller-products')) {
                render += `<button class="btn btn-outline-primary btn-sm" onclick="editData('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-seller-products')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);
