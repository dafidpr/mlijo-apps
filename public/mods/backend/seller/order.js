if (typeof table == 'undefined') {
    let table
}

table = initTable('#dataTable', [{
        name: 'order_code',
        data: 'order_code',
        mRender: function (data, type, row) {
            let total = 0;
            row.order_detail.forEach(item => {
                total += item.total;
            });
            let discount = 0;
            if (row.order_detail[0].discount > 0) {
                discount = (row.order_detail[0].discount / (row.order_detail[0].price * row.order_detail[0].quantity)) * 100;
            }
            let statusOrder = generateOrderStatus(row.status_order, row.payment_status);
            let button = '';
            button += ` <a href="${window.location.href}/${row.hashid}/invoice" data-toggle="ajax" class="btn-sm font-weight-bold btn btn-flat-dark waves-effect waves-light">
                            <i class="feather icon-printer"></i> 
                            Cetak Label
                        </a>`

            button += `<button type="button" onclick="statusOrder('${row.hashid}')" class="btn-sm font-weight-bold btn btn-flat-dark waves-effect waves-light">
                        <i class="feather icon-shopping-bag"></i> 
                        Status Pesanan
                        </button>`
            if (row.status_order == 'pending') {
                button += ` <button type="button" onclick="updateStatus('${row.hashid}', 'canceled')" class="btn-sm font-weight-bold btn btn-flat-dark waves-effect waves-light">
                                <i class="feather icon-x-circle"></i> 
                                Batalkan Pesanan
                            </button>`
            }
            if (row.status_order == 'pending' && row.payment_status == 'paid') {
                button += ` <button type="button" onclick="updateStatus('${row.hashid}', 'processing')" class="btn-sm font-weight-bold btn btn-flat-dark waves-effect waves-light">
                                <i class="feather icon-repeat"></i> 
                                Proses Pesanan
                            </button>`
            }
            if (row.status_order == 'processing') {
                button += ` <button type="button" onclick="updateStatus('${row.hashid}', 'shipping')" class="btn-sm font-weight-bold btn btn-flat-dark waves-effect waves-light">
                                <i class="feather icon-truck"></i> 
                                Kirim Pesanan
                            </button>`
            }
            if (row.payment_status == 'paid' && (row.status_order == 'pending' || row.status_order == 'processing')) {
                button += `<button type="button" onclick="receipt('${row.hashid}')" class="btn-sm font-weight-bold btn btn-flat-dark waves-effect waves-light">
                            <i class="feather icon-clipboard"></i> 
                            Input Resi
                        </button>`
            }

            let html = `<div class="">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <span class="badge badge-light-${statusOrder.color} pl-1 pr-1">
                                    <i class="feather icon-${statusOrder.icon}"></i>
                                    <strong>${statusOrder.status}</strong>
                                </span> /
                                <strong class="text-success">${row.order_code}</strong>
                                <span class="ml-1">
                                    <i class="feather icon-user"></i> ${row.customer.name}
                                </span>
                                <span class="ml-1">
                                    <i class="feather icon-clock"></i> ${row.created_at}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <img class="rounded" src="${ $('meta[name="asset-url"]').attr("content") + `storage/images/products/${row.order_detail[0].product.thumbnail}`}"
                                    alt="avatar" height="60" width="60">
                            </div>
                            <div class="col-md-10">
                                <div class="ml-1">
                                    <p class="m-0 p-0"><strong>${row.order_detail[0].product.name}</strong></p>
                                    <small>
                                        ${row.order_detail[0].quantity} x Rp.${numberFormat(row.order_detail[0].total)}
                                        ${row.order_detail[0].discount > 0 ? `<span class="badge badge-light-success pl-1 pr-1 "> Diskon ${discount}%</span> `:''} 
                                    <br></small>
                                    ${row.order_detail[0].notes != null ? `<small class="mt-3"><i>${row.order_detail[0].notes}</i></small><br>` :''}
                                    ${row.order_detail.length > 1 ? `
                                        <a class="text-primary" onclick="showProducts('${row.hashid}')" style="margin-top: 20px">
                                            <small>
                                                <strong> Lihat ${row.order_detail.length-1} Produk Lainnya</strong>
                                            </small>
                                        </a>
                                    ` : ''}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="alert alert-dark" role="alert"
                                    style="padding: 0.31rem 0.71rem !important;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class=""> <strong>Total Harga</strong> (${row.order_detail.length} Produk)</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="float-right"> <strong>Rp ${numberFormat(total)}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                   ${button}
                                </div>
                            </div>
                        </div>
                    </div>`

            return html;
        }
    },
    {
        name: 'customer.name',
        data: 'customer.name',

        mRender: function (data, type, row) {
            return `<div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <p class="m-0 p-0"><strong>Alamat</strong></p>
                                    <small>${row.customer.name} (${row.order_address.customer_phone_number})</small> <br>
                                    <small>${row.order_address.address}</small> <br>
                                    <small>${row.order_address.district}, ${row.order_address.city}, ${row.order_address.province} (${row.order_address.postal_code})</small> <br>
                                    <p class="m-0 p-0 mt-2"><strong>Biaya Ongkos Kirim</strong></p>
                                    <small>Rp. ${numberFormat(row.shipping_total)}</small> <br>
                                </div>
                            </div>
                        </div>
                    </div>`
        }
    },
    {
        name: 'shipping.name',
        data: 'shipping.name',

        mRender: function (data, type, row) {
            return `  <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <p class="m-0 p-0"><strong>Kurir</strong></p>
                                        <small>${row.shipping.name}</small> <br>
                                        <a href="" style="margin-top: 20px ">
                                            <small>
                                                <strong> Lihat Detail</strong>
                                            </small>
                                        </a>
                                        <p class="m-0 p-0 mt-2"><strong>Nomor Resi</strong></p>
                                        <small>${row.receipt_number == null ? '-' :row.receipt_number }</small> <br>
                                    </div>
                                </div>
                            </div>
                        </div>`
        }
    },

]);

// function numberFormat(number) {
//     return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
// }

function receipt(hashid) {
    $('#receipt-modal #receipt-form').attr('action', `${window.location.href}/${hashid}/store-receipt`);
    const res = fetch(`${window.location.href}/${hashid}/show`)
        .then(res => res.json())
        .then(res => {
            if (res.status == 'success') {
                $('#receipt-modal').modal('show');
                $('#receipt_number').val(res.data.receipt_number);

            } else {
                notify("warning", res.message);
            }
        }).catch(err => {
            notify("warning", err);
        });
}

function statusOrder(hashid) {
    $('#status-modal #status-form').attr('action', `${window.location.href}/${hashid}/store-status`);
    const res = fetch(`${window.location.href}/${hashid}/show-tracking`)
        .then(res => res.json())
        .then(res => {
            if (res.status == 'success') {
                let html = ``;
                let icon = '';
                let color = '';
                res.data.forEach(row => {
                    switch (row.status) {
                        case 'pending':
                            color = 'primary';
                            icon = 'plus';
                            break;
                        case 'processing':
                            color = 'warning';
                            icon = 'clock';
                            break;
                        case 'shipping':
                            color = 'info';
                            icon = 'truck';
                            break;
                        case 'delivered':
                            color = 'success';
                            icon = 'shopping-bag';
                            break;
                        case 'canceled':
                            color = 'danger';
                            icon = 'x-circle';
                            break;
                        case 'done':
                            color = 'success';
                            icon = 'check-circle';
                            break;
                        default:
                            color = 'danger';
                            icon = 'x-circle';
                            break;
                    }
                    html += `<li>
                                <div class="timeline-icon bg-${color}">
                                    <i class="feather icon-${icon} font-medium-2 align-middle"></i>
                                </div>
                                <div class="timeline-info">
                                    <p class="font-weight-bold mb-0">${row.title}</p>
                                    <span class="font-small-3">${row.description}</span>
                                </div>
                                <small class="text-muted">${row.status_date}</small>
                            </li>`
                });
                $('#status-modal #status-body').html(html);
                $('#status-modal').modal('show');

            } else {
                notify("warning", res.message);
            }
        }).catch(err => {
            notify("warning", err);
        });
}

function updateStatus(hashid, status) {
    swal.fire({
        title: `${status == 'cancel' ? 'Cancel' : (status == 'processing' ? 'Proses' : 'Kirim')} Pesanan ?`,
        icon: "warning",
        text: "Aksi ini tidak dapat dibatalkan",
        showConfirmButton: true,
        confirmButtonText: `Ya, ${status == 'cancel' ? 'Cancel' : (status == 'processing' ? 'Proses' : 'Kirim')}`,
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
                `${window.location.href}/${hashid}/update-status/${status}`
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
}
$(function () {
    $('.daterange-picker').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('.daterange-picker').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        let dateRange = $(this).val(),
            paymentStatus = $("#payment-status-selector").val(),
            orderStatus = $("#order-status-selector").val();

        filterData(dateRange, paymentStatus, orderStatus);
    });

    $('.daterange-picker').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
});

$('#payment-status-selector').on('change', function () {
    let dateRange = $('#date-range').val(),
        paymentStatus = $(this).val(),
        orderStatus = $("#order-status-selector").val();
    filterData(dateRange, paymentStatus, orderStatus);
});
$('#order-status-selector').on('change', function () {
    let dateRange = $('#date-range').val(),
        paymentStatus = $('#payment-status-selector').val(),
        orderStatus = $(this).val();
    filterData(dateRange, paymentStatus, orderStatus);

});

async function filterData(date, paymentStatus, orderStatus) {
    var url = encodeURI(
        `${$("#dataTable").data('url')}?date=${date}&payment_status=${paymentStatus}&order_status=${orderStatus}`
    );
    await $("#dataTable").DataTable().ajax.url(url).load();
}

function showProducts(hashid) {
    let dtUrl = $('meta[name="base-url"]').attr('content') + `/seller/orders/${hashid}/get-products`;
    if (typeof orderProductTable == "undefined") {
        let orderProductTable;
    }
    if (!$.fn.dataTable.isDataTable('#order-product-table')) {
        orderProductTable = $('#order-product-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: dtUrl,
            columns: [{
                    name: 'product_name',
                    data: 'product_name',
                    mRender: function (data, type, row) {
                        return ` <div class="">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="rounded"
                                            src="${ $('meta[name="asset-url"]').attr("content") + `storage/images/products/${row.product.thumbnail}`}"
                                            alt="avatar" height="60" width="60">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="ml-1">
                                            <p class="m-0 p-0"><strong>${row.product.name}</strong></p>
                                            <small class="mt-3">Catatan:<i> ${row.notes == null ? '-' : row.notes}</i></small> <br>
                                            <small class="mt-3"><strong>Variasi : </strong> ${row.variant == null ? '-' : row.variant}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                    }
                },
                {
                    name: 'price',
                    data: 'price',
                    mRender: function (data, type, row) {
                        let html = `<small> Rp${numberFormat(data)}</small><br>`;
                        let discount = 0;
                        if (row.discount > 0) {
                            discount = (row.discount / (row.price * row.quantity)) * 100
                            html += ` <span class="badge badge-light-success pl-1 pr-1 "> Diskon ${discount}%</span>`
                        }
                        return html;
                    },
                },
                {
                    name: 'quantity',
                    data: 'quantity'
                },
                {
                    name: 'total',
                    data: 'total',
                    mRender: function (data, type, row) {
                        return `<h5 class="font-weight-bold text-warning">Rp${numberFormat(data)}</h5>`;
                    },
                },

            ],

        })
    } else {
        $('#order-product-table').DataTable().ajax.url(dtUrl).load();
    }

    $('#product-modal').modal('show');

}

function generateOrderStatus(orderStatus, paymentStatus) {
    let data = {
        status: '',
        icon: '',
        color: '',
    };
    switch (orderStatus) {
        case 'pending':
            if (paymentStatus == 'pending') {
                data.color = 'warning';
                data.icon = 'clock';
                data.status = 'Menunggu Pembayaran';
                break;
            }
            data.color = 'warning';
            data.icon = 'truck';
            data.status = 'Siap Kirim';
            break;
        case 'processing':
            data.color = 'warning';
            data.icon = 'clock';
            data.status = 'Dikemas';
            break;
        case 'shipping':
            data.color = 'info';
            data.icon = 'truck';
            data.status = 'Sedang Dikirim';
            break;
        case 'delivered':
            data.color = 'success';
            data.icon = 'shopping-bag';
            data.status = 'Pesanan Sampai';
            break;
        case 'canceled':
            data.color = 'danger';
            data.icon = 'x-circle';
            data.status = 'Pesanan Dicancel';

            break;
        case 'done':
            data.color = 'success';
            data.icon = 'check-circle';
            data.status = 'Pesanan Selesai';
            break;

        default:
            data.color = 'danger';
            data.icon = 'x-circle';
            data.status = 'Pesanan Gagal';
            break;
    }
    return data;
}
