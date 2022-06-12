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
    },
    {
        name: 'icon',
        data: 'icon',
        mRender: function (data, type, row) {
            return `
                <div class="row">
                    <div class="col-md-2">
                        <img class="" src="${$('meta[name="asset-url"]').attr('content') + `storage/images/seller-categories/${data}`}" alt="avatar" height="40" width="40">
                    </div>
                </div>
            `
        }
    },
    {
        name: 'product_count',
        data: 'product_count',
    },
    {
        name: 'is_active',
        data: 'is_active',
        mRender: function (data, type, row) {
            return `
                <div class="custom-control custom-switch switch-lg custom-switch-primary">
                    <input type="checkbox" class="custom-control-input" id="${row.hashid}" ${(data) ? 'checked' : ''} onchange="updateStatus('${row.hashid}')">
                    <label label class = "custom-control-label" for="${row.hashid}">
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
        width: 200,
        sortable: false,
        mRender: function (data, type, row) {
            var render = ``

            if (row.is_default == 0) {
                if (userPermissions.includes('update-seller-storefront')) {
                    render += `<button class="btn btn-outline-primary btn-sm" onclick="editData('${data}')"><i class="feather icon-edit"></i></button> `
                }
                render += `<button class="btn btn-outline-info btn-sm" data-toggle="ajax" data-target="${window.location.href}/${data}/products"><i class="feather icon-shopping-bag"></i></button> `

                if (userPermissions.includes('delete-seller-storefront')) {
                    render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
                }
            }
            return render
        }
    }
]);

$('.dropify').dropify();

$('.btn-add').on('click', function () {
    $('#form-modal .modal-title').text('Tambah Etalase Toko');
    resetInvalid();
    $('#storefront-form').trigger('reset');
    $('#storefront-form').attr('action', `${window.location.href}/store`);
    $('.message').html('');
});

function editData(id) {
    $('#form-modal .modal-title').text('Ubah Etalase Toko');
    resetInvalid();
    $('#storefront-form').trigger('reset');
    $('#storefront-form').attr('action', `${window.location.href}/${id}/update`);
    $('.message').html('<small>* Kosongi jika icon tidak ingin diubah</small>');


    fetch(`${window.location.href}/${id}/show`)
        .then(res => res.json())
        .then(res => {

            if (res.status == 'success') {
                $('#name').val(res.data.name)
                $('#description').val(res.data.description)
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
