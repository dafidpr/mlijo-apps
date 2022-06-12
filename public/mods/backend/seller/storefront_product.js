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
        name: 'product.name',
        data: 'product.name',
        mRender: function (data, type, row) {
            return `
                <div class="d-flex align-items-center">
                    <img class="rounded" src="${
                                  $('meta[name="asset-url"]').attr("content") +
                                  `storage/images/products/${row.product.thumbnail}`
                              }" alt="avatar" height="40" width="40">
                    <div class="d-block ml-2">
                        <p class="m-0 p-0"><strong>${data}</strong></p>
                        <small>SKU : ${
                            row.product.sku == null ? '-' : row.product.sku
                        }</small>
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
        name: 'product.stock',
        data: 'product.stock',
    },
    {
        name: 'product.expired',
        data: 'product.expired',
        mRender: function (data, type, row) {
            return data + ' hari'
        }
    },
    {
        name: 'product.is_active',
        data: 'product.is_active',
        mRender: function (data, type, row) {
            return `
               <span class="badge rounded-pill pr-1 pl-1 badge-light-${data == 1 ? 'success' : 'danger'}" >${data == 1 ? 'Aktif' : 'Tidak Aktif'}</span>
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
            render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `

            return render
        }
    }
]);


$(".post-add-bt")
    .unbind()
    .on("click", function (e) {
        const selectedCols = tableCreate.columns().checkboxes.selected()[1];
        console.log(selectedCols);
    });

$(".btn-add")
    .unbind()
    .on("click", function (e) {
        e.preventDefault();
        if (typeof tableCreate == "undefined") {
            let tableCreate;
        }

        if (!$.fn.DataTable.isDataTable("#table-create-product")) {
            tableCreate = initTable(
                "#table-create-product",
                [{
                        name: "hashid",
                        data: "hashid",
                        sortable: false,
                        searchable: false,
                        width: 1,
                        mRender: () => "",
                    },
                    {
                        name: "hashid",
                        data: "hashid",
                        sortable: false,
                        searchable: false,
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
                ],
                null,
                [2, "asc"],
                true
            );
        } else {
            tableCreate.rows().deselect();
            $(".dt-checkboxes:checked").click();
            tableCreate.ajax.url($("#table-create-product").data("url")).load();
            // tableCreate.rows().deselect()
        }
    });

$(".post-add-bt")
    .unbind()
    .on("click", function () {
        const selectedCols = tableCreate.columns().checkboxes.selected()[1];

        if (selectedCols.length > 0) {
            swal.fire({
                title: "Tambahkan Data",
                icon: "question",
                text: "Silahkan cek kembali data yang ingin ditambahkan",
                showConfirmButton: true,
                confirmButtonText: "Ya, lanjutkan",
                confirmButtonColor: "#3BB77E",
                showCancelButton: true,
                cancelButtonText: "Tidak",
            }).then(async (res) => {
                if (res.isConfirmed) {
                    swal.fire({
                        title: "Please Wait",
                        html: "Sedang menambahkan data",
                        didOpen: () => {
                            swal.showLoading();
                        },
                    });

                    const res = await fetch(`${window.location.href}/store`, {
                        method: "post",
                        headers: {
                            Accept: "application/json",
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        body: JSON.stringify({
                            products: tableCreate
                                .columns()
                                .checkboxes.selected()[1],
                        }),
                    });
                    const resJson = await res.json();
                    swal.close();
                    if (res.status == 200) {
                        $("#form-modal").modal("hide");
                        $(".modal-backdrop").remove();
                        $("body").removeClass("modal-open");
                        notify("success", resJson.message);
                        table.ajax.reload();
                    } else {
                        notify("warning", resJson.message);
                    }
                }
            });
        } else {
            swal.fire({
                title: "Peringatan!",
                icon: "warning",
                text: "Silahkan pilih minimal 1 data untuk ditambahkan",
                confirmButtonColor: "#3BB77E",
            });
        }
    });
