<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-cog"></i> <!-- Tambahkan ikon di sini -->
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>/user">
            <i class="fas fa-home mr-2"></i>
            <span class="ml-2" style="font-size: 16px;">Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Interface Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Menu Posyandu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posyanduMenu" aria-expanded="true"
            aria-controls="posyanduMenu">
            <i class="fas fa-users mr-2"></i>
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
            <i class="fas fa-database mr-2"></i>
            <span style="font-size: 16px;">Data</span>
        </a>
        <div id="dataMenu" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" style="font-size: 16px;" href="<?= base_url('Admin/balita'); ?>">Data Balita</a>
                <a class="collapse-item" style="font-size: 16px;" href="<?= base_url('Admin/orang_tua'); ?>">Orang Tua</a>
            </div>
        </div>
    </li>

    <!-- Components -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog mr-2"></i>
            <span style="font-size: 16px;">Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" style="font-size: 16px;" href="<?= base_url('Admin/kelola_user'); ?>">Manajemen User</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Addons Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-sign-out-alt mr-2"></i>
            <span style="font-size: 16px;">Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
