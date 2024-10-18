<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>E-PERPUS SMPN 6 BATANG</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="shortcut icon" href="/img/logo.jpg" type="image/x-icon">

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #f2f2f2;">


        <!-- Navbar Brand-->
        <a class="navbar-brand ps-5" href="<?= base_url(); ?>"><i class="fa-solid fa-book" class="pe-3"></i>&nbsp; E-Perpus </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?= session()->get('user_name'); ?></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url("logout"); ?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fas fa-home"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= base_url('user/kunjungan'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Data Kunjungan
                        </a>
                        <a class="nav-link" href="<?= base_url('user/Peminjam'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                            Data Siswa Peminjam
                        </a>
                        <a class="nav-link" href="<?= base_url('user/JenisBuku'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Jenis Buku
                        </a>
                        <a class="nav-link" href="<?= base_url('user/databukurusak'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Buku Rusak
                        </a>
                        <a class="nav-link" href="<?= base_url('Peminjaman'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                            Peminjaman
                        </a>
                        <div class="sb-sidenav-menu-heading">Laporan</div>

                        <a class="nav-link" href="<?= base_url('user/laporandatapeminjaman'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                            Laporan Data Peminjaman
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Curent Date:</div>
                    <?= date('d F Y'); ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><?= $title; ?></h1>
                    <ol class="breadcrumb mb-4">
                        <?= $title == "Dashboard" ?  '<li class="breadcrumb-item active">Dashboard</li>' : '<li class="breadcrumb-item"><a href="' . base_url() . '">Dashboard</a></li> <li class="breadcrumb-item active"> ' . $title . '</li>' ?>
                    </ol>

                    <?= $this->renderSection('content'); ?>


                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SMPN 6 BATANG</div>
                    </div>
                </div>
        </div>
        </footer>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/assets/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</body>

</html>