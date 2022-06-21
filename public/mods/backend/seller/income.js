$(function () {
    $('.daterange-picker').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('#date-range-release').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        let dateRangeRelease = $(this).val();

        filterData(dateRangeRelease, true);
    });
    $('#date-range-not-release').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        let dateRangeNotRelease = $(this).val();

        filterData(dateRangeNotRelease, false);
    });

    $('.daterange-picker').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
});

if (typeof dtIncomeNotRelease == 'undefined') {
    let dtIncomeNotRelease
}
if (typeof dtIncomeRelease == 'undefined') {
    let dtIncomeRelease
}

dtIncomeNotRelease = $("#income-not-release-table").DataTable({
    processing: true,
    serverSide: true,
    ajax: $("#income-not-release-table").data("url"),
    columns: [{
            name: "order_code",
            data: "order_code",
            mRender: function (data, type, row) {
                return ` <div class="row">
                            <div class="col-md-1">
                                <img class="rounded"
                                    src="${ $('meta[name="asset-url"]').attr("content") + `storage/images/products/${row.order_detail[0].product.thumbnail}`}"
                                    alt="avatar" height="60" width="60">
                            </div>
                            <div class="col-md-10">
                                <div class="ml-2">
                                    <p class="m-0 p-0"><strong
                                            class="text-success">${data}</strong></p>
                                    <span>
                                        <i class="feather icon-user"></i> ${row.customer.name} (${row.customer.phone_number})
                                    </span> <br><br>
                                    <p>
                                        <i class="feather icon-truck"></i> ${row.shipping.name} (${row.receipt_number == null ? '-' : row.receipt_number})
                                    </p>
                                </div>
                            </div>
                        </div>`
            },
        },
        {
            name: "order_date",
            data: "order_date",
            mRender: function (data, type, row) {
                return `<span>
                            <i class="feather icon-calendar"> </i> ${data}
                        </span>`;
            },
        },
        {
            name: "status_order",
            data: "status_order",
            mRender: function (data, type, row) {
                let status = generateOrderStatus(data, row.payment_status);
                return ` <span class="badge badge-light-${status.color} pl-1 pr-1">
                            <i class="feather icon-${status.icon}"></i>
                            <strong>${status.statusOrder}</strong>
                        </span>`
            }
        },
        {
            name: "order_total",
            data: "order_total",
            mRender: function (data, type, row) {
                return `<h5 class="font-weight-bold text-warning">Rp.${numberFormat(data)}</h5>
                            <p>
                                Ongkos Kirim
                                <strong>Rp.${numberFormat(row.shipping_total)}</strong>
                            </p>`
            }
        },
    ],
    responsive: true,
});
dtIncomeRelease = $("#income-release-table").DataTable({
    processing: true,
    serverSide: true,
    ajax: $("#income-release-table").data("url"),
    columns: [{
            name: "order_code",
            data: "order_code",
            mRender: function (data, type, row) {
                return ` <div class="row">
                            <div class="col-md-1">
                                <img class="rounded"
                                    src="${ $('meta[name="asset-url"]').attr("content") + `storage/images/products/${row.order_detail[0].product.thumbnail}`}"
                                    alt="avatar" height="60" width="60">
                            </div>
                            <div class="col-md-10">
                                <div class="ml-2">
                                    <p class="m-0 p-0"><strong
                                            class="text-success">${data}</strong></p>
                                    <span>
                                        <i class="feather icon-user"></i> ${row.customer.name} (${row.customer.phone_number})
                                    </span> <br><br>
                                    <p>
                                        <i class="feather icon-truck"></i> ${row.shipping.name} (${row.receipt_number == null ? '-' : row.receipt_number})
                                    </p>
                                </div>
                            </div>
                        </div>`
            },
        },
        {
            name: "order_date",
            data: "order_date",
            mRender: function (data, type, row) {
                return `<span>
                            <i class="feather icon-calendar"> </i> ${data}
                        </span>`;
            },
        },
        {
            name: "status_order",
            data: "status_order",
            mRender: function (data, type, row) {
                let status = generateOrderStatus(data, row.payment_status);
                return ` <span class="badge badge-light-${status.color} pl-1 pr-1">
                            <i class="feather icon-${status.icon}"></i>
                            <strong>${status.statusOrder}</strong>
                        </span>`
            }
        },
        {
            name: "order_total",
            data: "order_total",
            mRender: function (data, type, row) {
                return `<h5 class="font-weight-bold text-warning">Rp.${numberFormat(data)}</h5>
                            <p>
                                Ongkos Kirim
                                <strong>Rp.${numberFormat(row.shipping_total)}</strong>
                            </p>`
            }
        },
    ],
    responsive: true,
});

// function numberFormat(number) {
//     return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
// }

async function filterData(date, status) {
    if (status == true) {
        var url = encodeURI(
            `${$("#income-release-table").data('url')}?date=${date}`
        );
        await $("#income-release-table").DataTable().ajax.url(url).load();
    } else {
        var url = encodeURI(
            `${$("#income-not-release-table").data('url')}?date=${date}`
        );
        await $("#income-not-release-table").DataTable().ajax.url(url).load();
    }
}

function generateOrderStatus(statusOrder, paymentStatus) {
    let data = {
        statusOrder: '',
        color: '',
        icon: '',
    };
    switch (statusOrder) {
        case 'pending':
            if (paymentStatus == 'pending') {
                data.color = 'warning';
                data.icon = 'clock';
                data.statusOrder = 'Menunggu Pembayaran';
                break;
            }
            data.color = 'warning';
            data.icon = 'truck';
            data.statusOrder = 'Siap Kirim';
            break;
        case 'processing':
            data.color = 'warning';
            data.icon = 'clock';
            data.statusOrder = 'Dikemas';
            break;
        case 'shipping':
            data.color = 'info';
            data.icon = 'truck';
            data.statusOrder = 'Sedang Dikirim';
            break;
        case 'delivered':
            data.color = 'success';
            data.icon = 'shopping-bag';
            data.statusOrder = 'Pesanan Sampai';
            break;
        case 'canceled':
            data.color = 'danger';
            data.icon = 'x-circle';
            data.statusOrder = 'Pesanan Dicancel';

            break;
        case 'done':
            data.color = 'success';
            data.icon = 'check-circle';
            data.statusOrder = 'Pesanan Selesai';
            break;

        default:
            data.color = 'danger';
            data.icon = 'x-circle';
            data.statusOrder = 'Pesanan Gagal';
            break;
    }
    return data;
}
