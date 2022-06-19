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
        width: 200,
        sortable: false,
        mRender: function (data, type, row) {
            var render = ``

            if (userPermissions.includes('update-seller-products')) {
                render += `<button class="btn btn-outline-primary btn-sm" data-id="${data}" data-toggle="edit"><i class="feather icon-edit"></i></button> `
                if (row.product_image_count > 0) {
                    render += `<button class="btn btn-outline-info btn-sm" onclick="showImage('${data}')" ><i class="feather icon-camera"></i></button> `
                }
            }

            if (userPermissions.includes('delete-seller-products')) {
                render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            }

            return render
        }
    }
]);

$('.dropify').dropify();
$(function () {
    scanAutonumeric();

    $("form #price").keypress(function (e) {
        if (e.which == 13) {
            return false;
        }
    });
})

function scanAutonumeric() {
    $.each($('.autonumeric'), function (i, e) {
        if (!AutoNumeric.isManagedByAutoNumeric(e)) {
            new AutoNumeric(e, {
                currencySymbol: 'Rp. ',
                decimalPlaces: '0',
                watchExternalChanges: true
            });
        }
    });
}

$('#product-category').on('change', async function (e) {
    if ($(this).val() == "") {

        $("#product-subcategory").empty();
        $("#product-subcategory").attr("disabled", true);
    } else {
        const res = await fetch(
            `${$('meta[name="base-url"]').attr('content')}/seller/products/${$(this).val()}/get-sub-categories`
        );
        const {
            data
        } = await res.json();
        $("#product-subcategory").empty();
        $("#product-subcategory").html(
            `<option value="">Pilih Sub Kategori</option>` +
            data
            .map(
                (item) =>
                `<option value="${item.hashid}">${item.name}</option>`
            )
            .join("")
        );
        $("#product-subcategory").removeAttr("disabled");
    }
})

function showImage(hashid) {
    let dtUrl = $('meta[name="base-url"]').attr('content') + `/seller/products/${hashid}/get-product-images`;
    if (typeof productImageTable == "undefined") {
        let productImageTable;
    }
    if (!$.fn.dataTable.isDataTable('#product-image-table')) {
        productImageTable = $('#product-image-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: dtUrl,
            columns: [{
                    name: 'image',
                    data: 'image',
                    mRender: function (data, type, row) {
                        return ` <div class="">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="rounded"
                                            src="${ $('meta[name="asset-url"]').attr("content") + `storage/images/product-images/${row.image}`}"
                                            alt="avatar" height="60" width="60">
                                    </div>
                                </div>
                            </div>`;
                    }
                },
                {
                    name: 'image',
                    data: 'image'
                },
                {
                    name: 'id',
                    data: 'hashid',
                    width: 100,
                    sortable: false,
                    mRender: function (data, type, row) {
                        var render = ``
                        render += `<button class="btn btn-outline-danger btn-sm" onclick="deleteImage('${data}')"><i class="feather icon-trash-2"></i></button> `

                        return render
                    }
                }

            ],

        })
    } else {
        $('#product-image-table').DataTable().ajax.url(dtUrl).load();
    }
    $('#image-modal').modal('show')
}

function deleteImage(hashid) {
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data yang di hapus tidak dapat dikembalikan!",
        icon: 'warning',
        showConfirmButton: true,
        confirmButtonText: "Ya, hapus",
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
                $('meta[name="base-url"]').attr('content') + `/seller/products/${hashid}/delete-product-images`, {
                    method: "delete",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                        "X-Requested-With": "XMLHttpRequest",
                        Accept: "application/json",
                    },
                }
            );

            swal.close();
            if (res.status == 200) {
                var data = await res.json();
                notify("success", data.message);
                $('#product-image-table').DataTable().ajax.reload();

            } else {
                if (res.status == 401) {
                    window.location.reload();
                } else {
                    var data = await res.json();
                    notify("warning", data.message);
                }
            }
        }
    })
}
