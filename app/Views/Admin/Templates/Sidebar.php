<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="<?= base_url(); ?>">
        <img src="<?= base_url() ?>/assets/img/10.png" width="75px"
            height="75px">
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>/user">
            <i class="fas fa-home"></i>
            <span style="font-size: 16px;">Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Main Navigation Item -->
  <!-- Menu Posyandu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posyanduMenu" aria-expanded="true"
        aria-controls="posyanduMenu">
        <i class="fas fa-users"></i>
        <span style="font-size: 16px;">Posyandu</span>
    </a>
    <div id="posyanduMenu" class="collapse" aria-labelledby="headingPosyandu" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" style="font-size: 16px;" href="<?= base_url('Admin/posyandu'); ?>">Posyandu</a>
            <a class="collapse-item" style="font-size: 16px;" href="<?= base_url('Admin/jenis_imunisasi'); ?>">Jenis Imunisasi</a>
            <a class="collapse-item" style="font-size: 16px;" href="<?= base_url('Admin/vitamin'); ?>">Vitamin</a>
        </div>
    </div>
</li>

<!-- Menu Data -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataMenu" aria-expanded="true"
        aria-controls="dataMenu">
        <i class="fas fa-database"></i>
        <span style="font-size: 16px;">Data</span>
    </a>
    <div id="dataMenu" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" style="font-size: 16px;" href="<?= base_url('Admin/balita'); ?>">Data Balita</a>
            <a class="collapse-item" style="font-size: 16px;" href="<?= base_url('Admin/orang_tua'); ?>">Orang Tua</a>
        </div>
    </div>
</li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/kelola_user'); ?>">Manjemen user</a>
                <!-- <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('BarangCont'); ?>">Daftar
                    Barang</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/satuan'); ?>">Master
                    Satuan</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/pelanggan'); ?>">Data
                    Pelanggan</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/supplier'); ?>">Data
                    Supplier</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/aset'); ?>">Aset
                    Penjualan</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/hutang'); ?>">Hutang
                </a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('PenjualanBarangCont/piutang'); ?>">Piutang
                </a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/modal'); ?>">Modal
                </a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/kas'); ?>">Kas
                    Toko
                </a>
            </div>
        </div>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('PenjualanBarangCont'); ?>">Penjualan
                    Barang</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/pengeluaran'); ?>">Pengeluaran</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/restok'); ?>">Restok</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
        <a class="nav-link"
            href="<?= base_url('Admin/perkiraan'); ?>">
            <i class="fas fa-chart-line"></i>
            <span>Perkiraan Penjualan</span>
        </a>
    </li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporanMenu" aria-expanded="true"
            aria-controls="laporanMenu">
            <i class="fas fa-file-alt"></i>
            <span style="font-size: 16px;">Laporan</span>
        </a>
        <div id="laporanMenu" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/lap_barang'); ?>">Laporan
                    Persediaan</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/lap_arus_kas'); ?>">Laporan
                    Arus Kas</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/lap_laba_rugi'); ?>">Laporan
                    Laba Rugi</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('Admin/lap_analisa_arus_kas'); ?>">Laporan
                    Analisa Arus Kas</a>
            </div>
        </div>
    </li> -->


    <li class="nav-item">
        <a class="nav-link"
            href="<?= base_url('logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span style="font-size: 16px;">Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>