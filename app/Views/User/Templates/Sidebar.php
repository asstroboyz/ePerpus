<?php
$posyanduModel = new \App\Models\PosyanduModel(); 
$posyandu = $posyanduModel->where('id', user()->posyandu_id)->first();
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            <?php if (user()->posisi === 'kader'): ?>
                Kader <?= $posyandu['nama_posyandu']; ?>
            <?php elseif (user()->posisi === 'bidan'): ?>
                Bidan <?= $posyandu['nama_posyandu']; ?>
            <?php else: ?>
                Admin <?= $posyandu['nama_posyandu']; ?>
            <?php endif; ?>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>/user">
            <i class="fas fa-home"></i>
            <span class="ml-2">Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Posyandu Management Section -->
    <div class="sidebar-heading">
        Manajemen Posyandu
    </div>

    <!-- Data Ibu & Balita -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/balita'); ?>">
            <i class="fas fa-baby"></i>
            <span>Data Ibu & Balita</span>
        </a>
    </li>

    <!-- Jenis Imunisasi -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/jenis_imunisasi'); ?>">
            <i class="fas fa-syringe"></i>
            <span>Jenis Imunisasi</span>
        </a>
    </li>

    <!-- Jadwal -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/jadwal'); ?>">
            <i class="fas fa-calendar-alt"></i>
            <span>Jadwal</span>
        </a>
    </li>

    <!-- Daftar Hadir -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/daftar_hadir'); ?>">
            <i class="fas fa-clipboard-list"></i>
            <span>Daftar Hadir</span>
        </a>
    </li>

    <!-- Divider -->
    <?php if (user()->posisi === 'kader'): ?>
    <hr class="sidebar-divider">

    <!-- User Management Section -->
    <div class="sidebar-heading">
        Manajemen Pengguna
    </div>

    <!-- Manajemen Users -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/kelola_user'); ?>">
            <i class="fas fa-user-cog"></i>
            <span>Manajemen Users</span>
        </a>
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
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
