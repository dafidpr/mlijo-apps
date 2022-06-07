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
        name: 'category',
        data: 'category',
    },
    {
        name: 'name',
        data: 'name',
    },
    {
        name: 'image',
        data: 'image',
        mRender: function (data, type, row) {
            return `
                <div class="row">
                    <div class="col-md-2">
                        <img class="round" src="${$('meta[name="asset-url"]').attr('content') + `storage/images/product-sub-categories/${data}`}" alt="avatar" height="40" width="40">
                    </div>
                </div>
            `
        }
    },
    {
        name: 'slug',
        data: 'slug',
        mRender: function (data) {
            return '/' + data;
        }
    },
    {
        name: 'product_count',
        data: 'product_count',
    },
    {
        name: 'description',
        data: 'description',
        mRender: function (data) {
            return data == null ? '-' : data;
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

            if (userPermissions.includes('update-product-sub-categories')) {
                render += `<button class="btn btn-outline-primary btn-sm" onclick="editData('${data}')"><i class="feather icon-edit"></i></button> `
            }

            if (userPermissions.includes('delete-product-sub-categories')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);

$('.dropify').dropify();

$('.btn-add').on('click', function () {
    $('#form-modal .modal-title').text('Tambah Sub Kategori Produk');
    resetInvalid();
    $('#product-sub-category-form').trigger('reset');
    $('#product-sub-category-form').attr('action', `${window.location.href}/store`);
    $('.message').html('');
    $('#category').val("").trigger("change");
});

function editData(id) {
    $('#form-modal .modal-title').text('Ubah Sub Kategori Produk');
    resetInvalid();
    $('#product-sub-category-form').trigger('reset');
    $('#product-sub-category-form').attr('action', `${window.location.href}/${id}/update`);
    $('.message').html('<small>* Kosongi jika gambar tidak ingin diubah</small>');


    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(res => {

            if (res.status == 'success') {
                $('#name').val(res.data.name)
                $('#description').val(res.data.description)
                $('#category').val(res.category).trigger("change");
                $('#form-modal').modal('show')
            } else {
                notify('warning', res.message)
            }
        })
}

async function updateStatus(hashid) {
    swal.fire({
        title: 'Porcessing',
        html: 'Sedang memperbarui data',
        allowOutsideClick: false,
        didOpen: () => {
            swal.showLoading()
        }
    })

    const res = await fetch(`${window.location.href}/${hashid}/update-status`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })

    swal.close()
    if (res.status == 200) {
        var data = await res.json()

        notify('success', data.message)

        if (typeof table != 'undefined') table.ajax.reload()
        else handleView()
    } else {
        if (res.status == 401) {
            window.location.assign()
        } else {
            var data = await res.json()
            notify('warning', data.message)
        }
    }
}
