<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-cog"></i>
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

    <!-- Posyandu Management Section -->
    <div class="sidebar-heading">
        Manajemen Posyandu
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kelolaPosyanduMenu"
            aria-expanded="true" aria-controls="kelolaPosyanduMenu">
            <i class="fas fa-users mr-2"></i>
            <span style="font-size: 16px;">Kelola Posyandu</span>
        </a>
        <div id="kelolaPosyanduMenu" class="collapse" aria-labelledby="headingPosyandu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('user/posyandu'); ?>">
                    Posyandu</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('user/jenis_imunisasi'); ?>">
                    Jenis Imunisasi</a>
                <!-- <a class="collapse-item" style="font-size: 16px;" href="<?= base_url('user/vitamin'); ?>">
                Vitamin</a> -->
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('user/gizi'); ?>">
                    Penentuan Gizi</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('user/balita'); ?>">
                    Data Ibu & Balita</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('user/daftar_hadir'); ?>">
                    Daftar Hadir</a>
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('user/jadwal'); ?>">
                    Jadwal</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
     <?php if (user()->posisi === 'kader'): ?>
    <hr class="sidebar-divider">

    <!-- User Management Section -->
   
    <div class="sidebar-heading">
        Manajemen Pengguna
    </div>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manajemenUserMenu"
            aria-expanded="true" aria-controls="manajemenUserMenu">
            <i class="fas fa-fw fa-cog mr-2"></i>
            <span style="font-size: 16px;">Manajemen Users</span>
        </a>
        <div id="manajemenUserMenu" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" style="font-size: 16px;"
                    href="<?= base_url('user/kelola_user'); ?>">Manajemen
                    Users</a>
            </div>
        </div>
    </li>
    <?php endif; ?>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Addons Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link"
            href="<?= base_url('logout'); ?>">
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