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
            {{-- <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i>
                </a>
            </li> --}}
        </ul>
    </div>
    {{-- <div class="shadow-bottom"></div> --}}
    <div class="main-menu-content mt-2">
        <ul class="navigation navigation-main mb-3" id="main-menu-navigation" data-menu="menu-navigation">
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
                    <i class="feather icon-repeat"></i>
                    <span class="menu-item" data-i18n="Pembayaran">Pembayaran</span>
                </a>
            </li>

            <li class="navigation-header">
                <span>General</span>
            </li>
            <li class="nav-item"><a href="#"><i class="feather icon-server"></i><span class="menu-title"
                        data-i18n="Master Data">Master Data</span></a>
                <ul class="menu-content">
                    <li><a href="#" data-toggle="ajax"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="Data Jurusan">Data Jurusan</span></a>
                    </li>
                    <li><a href="#" data-toggle="ajax"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="Data Kelas">Data
                                Kelas</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
