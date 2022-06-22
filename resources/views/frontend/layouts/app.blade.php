@extends('frontend.layouts.base')
@section('app')
    <!-- Header -->
    @include('frontend.layouts.partials.header')
    <!-- Content -->
    @yield('breadcrumb')
    @yield('content')
    <!-- Footer -->
    @include('frontend.layouts.partials.footer')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('assets/frontend/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/slider-range.js') }}"></script>

    <script src="{{ asset('assets/backend/app-assets/vendors/notify/js/bootstrap-notify.min.js') }}"></script>

    <!-- Template  JS -->
    <script src="{{ asset('assets/frontend/js/main.js?v=4.0') }}"></script>
    <script src="{{ asset('assets/frontend/js/shop.js?v=4.0') }}"></script>
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

    <script>
        $('.add-cart-bt')
            .on("click", async function(e) {
                e.preventDefault();
                var oldButtonText = $(this).html();
                let id = $(this).data('id');
                let qty = $('.qty-val').text();
                let notes = $('input[name="notes"]').val();

                $(this).html("Loading...");
                await fetch(`{{ route('frontend.carts.add-cart') }}`, {
                        method: 'POST',
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            "X-Requested-With": "XMLHttpRequest",
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: id,
                            qty: qty,
                            notes: notes
                        })
                    })
                    .then(response => response.json())

                    .then(data => {
                        if (data.status == 'success') {
                            notify('success', data.message);
                        }
                    })
                $(this).html(oldButtonText);
                $(".waves-ripple").remove();


            });

        $(function() {

            setInterval(async () => {
                const res = await fetch(`{{ route('frontend.carts.get-cart') }}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status == 'success') {

                            let cartBody = '';
                            data.data.forEach(item => {
                                cartBody += `<li>
                                                <div class="shopping-cart-img">
                                                    <a
                                                        href="${$('meta[name="base-url"]').attr('content')}/produk/${item.product.slug}"><img
                                                            alt="Nest"
                                                            src="${$('meta[name="asset-url"]').attr('content')}storage/images/products/${item.product.thumbnail}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a
                                                            href="${$('meta[name="base-url"]').attr('content')}/produk/${item.product.slug}">${item.product.name.length >  15 ? item.product.name.substr(0,15)+'...' :item.product.name}</a>
                                                    </h4>
                                                    <h4><span>${item.quantity} ×
                                                        </span>Rp${numberFormat(item.product.price)}</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#" onclick="deleteItem('${item.hashid}')"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>`;
                            });
                            if (data.count > 0) {
                                $(`#cart-body`).html(cartBody);
                                $('#cart-count').html(
                                    `<span class="pro-count blue">${data.count}</span>`);
                                $('#cart-footer').html(`
                                         <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span id="cart-total">Rp${numberFormat(data.total)}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{ route('frontend.carts') }}" class="outline">View
                                                    cart</a>
                                                <a href="#">Checkout</a>
                                            </div>
                                        </div>
                                    `)
                            } else {
                                $('#cart-body').html(
                                    `<img alt="Nest" width="300" src="${$('meta[name="asset-url"]').attr('content')}assets/frontend/imgs/theme/illustrations/empty.svg" />`
                                )
                                $('#cart-count').html(``);
                                $('#cart-footer').html(``);
                            }
                        }
                    })

            }, 3000);
        })

        async function deleteItem(hashid, isReload = false) {
            await fetch(`${$('meta[name="base-url"]').attr('content')}/keranjang/${hashid}/delete`, {
                    method: 'delete',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                        "X-Requested-With": "XMLHttpRequest",
                        Accept: "application/json",
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status == 'success') {
                        notify('success', data.message);
                        if (isReload == true) {
                            window.location.reload();
                        }
                    }
                })
        }

        $('.qty-bt').on('click', function() {
            let id = $(this).data('id');
            let qty = $('.qty-' + id).text();
            let price = $('#price-' + id).data('price');
            console.log(qty * Number(price));
            $('#subtotal-' + id).text('Rp ' +
                numberFormat(qty * Number(price)));
        })
        //

        $('#shipping').on('change', function() {
            let value = $(this).val();
            let total = $('#subtotal').val();
            let uniqueCode = $('#unique-code').val();

            if (value != "") {
                let price = value.split('-')[1];
                $('#shipping_total').text('Rp ' + numberFormat(price));
                $('#shippment-total-checkout').text('Rp ' + numberFormat(price));
                $('#cart-subtotal').text('Rp ' + numberFormat(Number(total) + Number(price) + Number(uniqueCode)))
            } else {
                $('#shipping_total').text('Rp 0');
                $('#shippment-total-checkout').text('Rp 0');
                $('#cart-subtotal').text('Rp ' + numberFormat(total))

            }

        });

        $('#track-bt')
            .on("click", async function(e) {
                e.preventDefault();
                var oldButtonText = $(this).html();
                let orderId = $('#order_id').val()


                $(this).html("Loading...");
                await fetch(`{{ route('frontend.dashboards.track') }}`, {
                        method: 'POST',
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            "X-Requested-With": "XMLHttpRequest",
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: orderId,
                        })
                    })
                    .then(response => response.json())

                    .then(data => {
                        console.log(data)
                        if (data.status == 'success') {
                            let html = ``;
                            data.data.forEach(item => {
                                html += `<div class="xp-actions-history-list mt-4">
                                            <div class="xp-actions-history-item ">
                                                <h6 class="title is-6">${item.title}</h6>
                                                <span class="mb-0">${item.description}</span><br>
                                                <small>${item.date}</small>
                                            </div>
                                        </div>`
                            });
                            $('#tracking-body').html(html)
                            notify('success', data.message);
                        }
                        if (data.status == 'error') {
                            notify('warning', data.message);

                            $('#tracking-body').html(`<h4>Data tidak ditemukan</h4>`)
                        }
                    })
                $(this).html(oldButtonText);
                $(".waves-ripple").remove();


            });
    </script>
@endsection
