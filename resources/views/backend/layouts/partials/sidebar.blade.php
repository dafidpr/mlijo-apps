<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('storage/images/themes/icon.png') }}" class="brand-logo" />
                    <h2 class="brand-text mb-0">Mlijo Panel</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="main-menu-content mt-2">
        <ul class="navigation navigation-main mb-3" id="main-menu-navigation" data-menu="menu-navigation">
            @hasrole('Administrator|Developer')
                <li class=" nav-item">
                    <a data-toggle="ajax" href="{{ route('admin.dashboards') }}">
                        <i class="feather icon-home"></i>
                        <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                    </a>
                </li>
                <li class="navigation-header">
                    <span>Transaksi</span>
                </li>
                <li class=" nav-item">
                    <a data-toggle="ajax" href="#">
                        <i class="feather icon-shopping-bag"></i>
                        <span class="menu-item" data-i18n="Pesanan">Pesanan</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a data-toggle="ajax" href="#">
                        <i class="feather icon-repeat"></i>
                        <span class="menu-item" data-i18n="Validasi Pembayaran">Validasi Pembayaran</span>
                    </a>
                </li>
                @canany(['read-admin-product-categories', 'read-admin-product-sub-categories'])
                    <li class="navigation-header">
                        <span>General</span>
                    </li>
                @endcanany
                @canany(['read-admin-product-categories', 'read-admin-product-sub-categories'])
                    <li class="nav-item"><a href="#"><i class="feather icon-server"></i><span class="menu-title"
                                data-i18n="Data Center">Data Center</span></a>
                        <ul class="menu-content">
                            <li><a href="#" data-toggle="ajax"><i class="feather icon-circle"></i><span class="menu-item"
                                        data-i18n="Customer">Customer</span></a>
                            </li>
                            <li><a href="#" data-toggle="ajax"><i class="feather icon-circle"></i><span class="menu-item"
                                        data-i18n="Seller">Seller</span></a>
                            </li>
                            @can('read-admin-product-categories')
                                <li><a href="{{ route('admin.product-categories') }}" data-toggle="ajax"><i
                                            class="feather icon-circle"></i><span class="menu-item"
                                            data-i18n="Kategori Produk">Kategori Produk</span></a>
                                </li>
                            @endcan
                            @can('read-admin-product-sub-categories')
                                <li><a href="{{ route('admin.product-sub-categories') }}" data-toggle="ajax"><i
                                            class="feather icon-circle"></i><span class="menu-item"
                                            data-i18n="Sub Kategori Produk">Sub Kategori Produk</span></a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                <li class="nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title"
                            data-i18n="Manajemen User">Manajemen User</span></a>
                    <ul class="menu-content">
                        <li><a href="#" data-toggle="ajax"><i class="feather icon-circle"></i><span class="menu-item"
                                    data-i18n="Users">Users</span></a>
                        </li>
                        <li><a href="#" data-toggle="ajax"><i class="feather icon-circle"></i><span class="menu-item"
                                    data-i18n="Roles">Roles</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a data-toggle="ajax" href="#">
                        <i class="feather icon-database"></i>
                        <span class="menu-item" data-i18n="Produk">Produk</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a data-toggle="ajax" href="#">
                        <i class="feather icon-credit-card"></i>
                        <span class="menu-item" data-i18n="Metode Pembayaran">Metode Pembayaran</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a data-toggle="ajax" href="#">
                        <i class="feather icon-image"></i>
                        <span class="menu-item" data-i18n="Iklan">Iklan</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a data-toggle="ajax" href="#">
                        <i class="feather icon-truck"></i>
                        <span class="menu-item" data-i18n="Pengiriman">Pengiriman</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a data-toggle="ajax" href="#">
                        <i class="feather icon-bar-chart"></i>
                        <span class="menu-item" data-i18n="Statistik">Statistik</span>
                    </a>
                </li>
                <li class="navigation-header">
                    <span>Setting</span>
                </li>
                <li class=" nav-item">
                    <a data-toggle="ajax" href="#">
                        <i class="feather icon-settings"></i>
                        <span class="menu-item" data-i18n="Pengaturan">Pengaturan</span>
                    </a>
                </li>
            @endhasrole
            @role('Seller')
                @can('read-seller-dashboards')
                    <li class=" nav-item">
                        <a data-toggle="ajax" href="{{ route('seller.dashboards') }}">
                            <i class="feather icon-home"></i>
                            <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                        </a>
                    </li>
                @endcan
                <li class="navigation-header">
                    <span>Pesanan</span>
                </li>
                @can('read-seller-order')
                    <li class=" nav-item">
                        <a data-toggle="ajax" href="{{ route('seller.orders') }}">
                            <i class="feather icon-shopping-bag"></i>
                            <span class="menu-item" data-i18n="Pesanan">Pesanan</span>
                        </a>
                    </li>
                @endcan
                <li class="navigation-header">
                    <span>General</span>
                </li>
                @can('read-seller-storefront')
                    <li class=" nav-item">
                        <a data-toggle="ajax" href="{{ route('seller.storefronts') }}">
                            <i class="feather icon-server"></i>
                            <span class="menu-item" data-i18n="Etalase Toko">Etalase Toko</span>
                        </a>
                    </li>
                @endcan
                <li class=" nav-item">
                    <a data-toggle="ajax" href="{{ route('seller.products') }}">
                        <i class="feather icon-database"></i>
                        <span class="menu-item" data-i18n="Produk">Produk</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a data-toggle="ajax" href="#">
                        <i class="feather icon-tag"></i>
                        <span class="menu-item" data-i18n="Promo Toko">Promo Toko</span>
                    </a>
                </li>
                @can('read-seller-shipping')
                    <li class=" nav-item">
                        <a data-toggle="ajax" href="{{ route('seller.shippings') }}">
                            <i class="feather icon-truck"></i>
                            <span class="menu-item" data-i18n="Pengiriman">Pengiriman</span>
                        </a>
                    </li>
                @endcan
                @can('read-seller-income')
                    <li class=" nav-item">
                        <a data-toggle="ajax" href="{{ route('seller.incomes') }}">
                            <i class="feather icon-bar-chart"></i>
                            <span class="menu-item" data-i18n="Penghasilan Saya">Penghasilan Saya</span>
                        </a>
                    </li>
                @endcan
                <li class="navigation-header">
                    <span>Setting</span>
                </li>
                @can('read-seller-setting')
                    <li class=" nav-item">
                        <a data-toggle="ajax" href="{{ route('seller.settings') }}">
                            <i class="feather icon-settings"></i>
                            <span class="menu-item" data-i18n="Pengaturan">Pengaturan</span>
                        </a>
                    </li>
                @endcan
            @endrole

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
