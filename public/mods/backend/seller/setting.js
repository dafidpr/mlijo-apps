if (typeof dtNoteTable == 'undefined') {
    let dtNoteTable
}

dtNoteTable = initTable('#noteTable', [{
        name: 'id',
        data: null,
        width: '1%',
        mRender: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }
    },
    {
        name: 'title',
        data: 'title',
        mRender: function (data) {
            return `<strong>${data}</strong>`
        }
    },
    {
        name: 'note',
        data: 'note',
    },
    {
        name: 'id',
        data: 'hashid',
        width: 150,
        sortable: false,
        mRender: function (data, type, row) {
            var render = ``
            render += `<button class="btn btn-outline-primary btn-sm" onclick="editData('${data}')"><i class="feather icon-edit"></i></button> `
            render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            return render
        }
    }
]);

$('input[type=radio][name=status]').change(function () {
    swal.fire({
        title: `Ubah status toko ?`,
        icon: "warning",
        text: "Aksi ini tidak dapat dibatalkan",
        showConfirmButton: true,
        confirmButtonText: `Ya, Ubah`,
        confirmButtonColor: "#3BB77E",
        showCancelButton: true,
        cancelButtonText: "Batal",
    }).then(async (rs) => {
        if (rs.isConfirmed) {
            swal.fire({
                title: "Please Wait",
                html: "Processing...",
                allowOutsideClick: false,
                didOpen: () => {
                    swal.showLoading();
                },
            });

            const res = await fetch(
                `${window.location.href}/update-status/${this.value}`
            );

            swal.close();
            if (res.status == 200) {
                var data = await res.json();
                notify("success", data.message);

                if (typeof table == "undefined") handleView();
                else table.ajax.reload();
            } else {
                if (res.status == 401) {
                    window.location.reload();
                } else {
                    var data = await res.json();
                    notify("warning", data.message);
                }
            }
        }
    });
});

function showInfo(hashid) {
    fetch(`${window.location.href}/get-info`)
        .then(res => res.json())
        .then(data => {
            if (data.status == 'success') {
                $('#name').val(data.data.store_name)
                $('#domain').val(data.data.store_slug)
                $('#store-modal').modal('show');
            }
        })
        .catch(err => {
            notify("warning", err);
        });

}


$(function () {
    $('.dropify').dropify();
})
