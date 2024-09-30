<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Posyandu Ceria</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>/assets/front/lib/animate/animate.min.css" />
    <link
        href="<?php echo base_url() ?>/assets/front/lib/lightbox/css/lightbox.min.css"
        rel="stylesheet">
    <link
        href="<?php echo base_url() ?>/assets/front/lib/owlcarousel/assets/owl.carousel.min.css"
        rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link
        href="<?php echo base_url() ?>/assets/front/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url() ?>/assets/front/css/style.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        *,
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }


        /* Navbar Styling */
        .navbar {
            background-color: #f0f8ff;
            /* Light background for the navbar */
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .brand-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #0096c7;
            /* Matching blue color for logo text */
        }

        .navbar-nav .nav-link {
            color: #000;
            font-weight: bold;
            padding: 10px 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #0077b6;
            /* Darker shade of blue on hover */
        }

        .navbar-nav .nav-link.active {
            color: #0077b6;
            /* Active link color */
        }

        /* Navbar Toggler */
        .navbar-toggler {
            border-color: #0096c7;
            /* Blue color for the toggler border */
        }

        /* Hero Section Styling */
        .hero-section {
            padding: 100px 0;
            background-color: #ffffff;
            /* Warna background yang lembut */
        }

        .hero-section h4 {
            font-size: 1.2rem;
            color: #0077b6;
            /* Warna biru untuk judul kecil */
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #03045e;
            /* Warna teks utama */
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.2rem;
            color: #495057;
            margin-bottom: 40px;
        }

        .header-carousel .animated-image {
            max-width: 100%;
            animation: float 3s ease-in-out infinite;
        }

        .container-fluid .animated-image {
            max-width: 100%;
            animation: float 3s ease-in-out infinite;
        }

        /* Animasi Floating pada gambar */
        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0);
            }
        }


        .btn-login {
            display: inline-block;
            background-color: #ff6f61;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #e65c50;
        }

        /* Animasi pada gambar */
        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Hilangkan background dari item carousel */
        .header-carousel-item {
            background: none;
            /* Menghapus background */
            box-shadow: none;
            /* Jika ada bayangan pada item, hilangkan */
        }

        /* Atur juga background di carousel caption jika ada */
        .carousel-caption {
            background: none;
            /* Menghapus background dari caption */
        }

        /* Jika ada padding atau margin, bisa disesuaikan untuk tampilan lebih baik */
        .carousel-caption .container {
            padding: 0;
            /* Sesuaikan padding jika diperlukan */
        }

        /* Untuk memastikan semua elemen lainnya tidak memiliki background */
        body,
        .header-carousel-item,
        .carousel-caption {
            background-color: transparent !important;
        }

        .nav-bar {
            background-color: #ffffff;
            /* Warna latar belakang */
        }

        .nav-bar {
            position: fixed;
            /* Membuat navbar tetap di atas saat scroll */
            top: 0;
            /* Posisi di atas */
            left: 0;
            /* Posisi kiri */
            right: 0;
            /* Posisi kanan */
            z-index: 1000;
            /* Pastikan navbar di atas elemen lainnya */
            background-color: #ffffff;
            /* Warna latar belakang */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Bayangan halus untuk navbar */
            transition: background-color 0.3s;
            /* Transisi halus untuk perubahan warna */
        }

        .navbar {
            padding: 15px 0;
            /* Tambah padding untuk navbar */
        }

        /* Untuk memastikan konten tidak tersembunyi di bawah navbar */
        body {
            padding-top: 70px;
            /* Tambahkan padding sesuai tinggi navbar */
        }


        .navbar-nav .nav-link {
            font-weight: 500;
            /* Font yang lebih tebal untuk link */
            color: #333;
            /* Warna teks link */
            transition: color 0.3s;
            /* Transisi halus untuk hover */
        }

        .navbar-nav .nav-link:hover {
            color: #007BFF;
            /* Warna saat hover */
        }

        .navbar-brand img {
            max-height: 50px;
            /* Ukuran logo */
        }

        .shadow {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Bayangan halus untuk navbar */
        }

        .feature {
            position: relative;
            margin-bottom: -100px;
            padding-bottom: 100px;
        }

        .feature::before {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            bottom: 0;
            left: 0;
            background: linear-gradient(to top, rgba(255, 255, 255, 1) 50%, rgba(255, 255, 255, 0) 100%);
            z-index: -1;
        }

        .feature-item {
            box-shadow: 0 0 45px rgba(0, 0, 0, .08);
            border-radius: 15px;
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            margin: 0 auto 30px auto;
        }

        .feature-icon i {
            font-size: 30px;
            color: #ffffff;
        }
    </style>
</head>

<body>



    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar px-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <a href="#" class="navbar-brand p-0">
                    <img src="img/depan/logo-Posyandu.png" alt="Logo" class="img-fluid" style="max-height: 50px;">
                    e-Posyandu
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="#jadwal-imunisasi" class="nav-item nav-link">Jadwal</a>
                        <a href="service.html" class="nav-item nav-link">Cari Riwayat Anak</a>
                        <a href="blog.html" class="nav-item nav-link">Jumlah anak</a>
                    </div>
                    <a class="btn btn-dark rounded-pill py-2 px-4 ms-2"
                        href="<?= base_url() ?>/user">Login</a>
                </div>
            </div>
        </nav>
    </div>


    <div class="header-carousel owl-carousel">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4>Posyandu Ceria</h4>
                    <h1>Selamat datang di </br>
                        website informasi Posyandu Ceria</h1>

                </div>
                <div class="col-md-6 text-center">

                    <img src="img/depan/logo.png" alt="Hero Image" class="img-fluid animated-image">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="img/depan/visi.png" alt="Tentang Kami" class="img-fluid animated-image">
                </div>
                <div class="col-md-6">
                    <h3 class="text-uppercase" style="color: #007BFF;">Tentang Kami</h3>
                    <h2 class="fw-bold">Posyandu Ceria</h2>
                    <p>
                        Posyandu Ceria menyediakan layanan kesehatan yang lengkap, termasuk pemeriksaan rutin untuk
                        balita, program imunisasi, penyuluhan kesehatan, serta pemantauan pertumbuhan balita.
                        Dengan komitmen pada kualitas pelayanan dan pencegahan penyakit, kami berupaya menciptakan
                        generasi yang lebih sehat dan berkualitas di masa depan.
                    </p>
                    <h2>Layanan, fasilitas, serta kelebihan Posyandu ceria.</h2>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill"></i> Fasilitas yang nyaman dan bersih</li>
                        <li><i class="bi bi-check-circle-fill"></i> Tenaga kesehatan yang sigap dan cekatan</li>
                        <li><i class="bi bi-check-circle-fill"></i> Pelayanan yang ramah</li>
                        <li><i class="bi bi-check-circle-fill"></i> Terjangkau serta mudah diakses</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-black">STATISTIK TAHUN
                    <?php echo date('Y'); ?></h4>
                <h1 class="display-4 mb-4">Data Posyandu Ceria Pekalongan Selatan</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item bg-primary p-4 pt-0 text-center">
                        <div class="feature-icon bg-white p-4 mb-4">
                            <i class="fas fa-baby fa-3x"></i> 
                        </div>
                        <h4 class="mb-4">Data Balita</h4>
                        <span class="text-black fs-2 fw-bold"
                            data-toggle="counter-up"><?= $jumlah_balita; ?></span>

                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item bg-success p-4 pt-0 text-center">
                        <div class="feature-icon bg-white p-4 mb-4">
                            <i class="fas fa-apple-alt fa-3x"></i> <!-- Ikon gizi baik -->
                        </div>
                        <h4 class="mb-4">Data Anak Gizi Baik</h4>
                        <span class="text-black fs-2 fw-bold" data-toggle="counter-up">150</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item bg-danger p-4 pt-0 text-center">
                        <div class="feature-icon bg-white p-4 mb-4">
                            <i class="fas fa-skull-crossbones fa-3x"></i> <!-- Ikon gizi buruk -->
                        </div>
                        <h4 class="mb-4">Data Gizi Buruk</h4>
                        <span class="text-black fs-2 fw-bold" data-toggle="counter-up">30</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item bg-warning p-4 pt-0 text-center">
                        <div class="feature-icon bg-white p-4 mb-4">
                            <i class="fas fa-ruler-vertical fa-3x"></i> <!-- Ikon stunting -->
                        </div>
                        <h4 class="mb-4">Data Stunting</h4>
                        <span class="text-black fs-2 fw-bold" data-toggle="counter-up">25</span>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Blog Start -->
    <div id="jadwal-imunisasi" class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Jadwal Imunisasi</h4>
                <h1 class="display-4 mb-4">Informasi Jadwal Imunisasi Anak</h1>
                <p class="mb-0">Berikut adalah jadwal imunisasi yang direkomendasikan untuk anak. Pastikan anak Anda
                    mendapatkan imunisasi tepat waktu untuk menjaga kesehatan mereka.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <?php
                $currentDateTime = new DateTime();
        $hasUpcomingSchedule = false;
        foreach ($jadwal as $imunisasi):
            $jadwalDateTime = new DateTime($imunisasi['tanggal'] . ' ' . $imunisasi['jam']);
            if ($jadwalDateTime > $currentDateTime):
                $hasUpcomingSchedule = true;
                ?>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <div class="blog-content p-4">
                            <h4 class="mb-3">
                                <?= esc($imunisasi['bidan']) ?>
                                (<?= esc($imunisasi['nama_posyandu']) ?>)
                            </h4>
                            <div class="small mb-2"><strong>Tanggal:</strong>
                                <?= esc($imunisasi['tanggal']) ?>
                            </div>
                            <div class="small mb-2"><strong>Jam:</strong>
                                <?= esc($imunisasi['jam']) ?>
                            </div>
                            <p class="mb-3"><strong>Alamat:</strong>
                                <?= esc($imunisasi['alamat_posyandu']) ?>
                            </p>
                            <p class="mb-3"><strong>Kader:</strong>
                                <?= esc($imunisasi['kader_posyandu']) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            endif;
        endforeach;

               
        if (!$hasUpcomingSchedule):
            ?>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <p><strong>Jadwal hari ini telah terlewatkan / tidak ada.</strong></p>
                </div>

                <?php endif; ?>
            </div>
        </div>
    </div>





    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4" style="color: white;">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-end mb-md-0">
                    <span><a href="#" class="border-bottom text-white" style="color: white;"><i
                                class="fas fa-copyright text-light me-2"></i>Posyandu Ceria</a>, All right
                        reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-start">
                    <span style="color: white;">Designed By <a class="border-bottom text-white"
                            href="https://htmlcodex.com" style="color: white;">Riski</a>
                        Distributed By <a class="border-bottom text-white" href="https://themewagon.com"
                            style="color: white;">ThemeWagon</a></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script
        src="<?php echo base_url() ?>/assets/front/lib/counterup/counterup.min.js">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/front/lib/wow/wow.min.js">
    </script>
    <script
        src="<?php echo base_url() ?>/assets/front/lib/easing/easing.min.js">
    </script>
    <script
        src="<?php echo base_url() ?>/assets/front/lib/waypoints/waypoints.min.js">
    </script>

    <script
        src="<?php echo base_url() ?>/assets/front/lib/lightbox/js/lightbox.min.js">
    </script>
    <script
        src="<?php echo base_url() ?>/assets/front/lib/owlcarousel/owl.carousel.min.js">
    </script>


    <!-- Template Javascript -->
    <script src="<?php echo base_url() ?>/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.header-carousel').owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
                dots: true,
                items: 1,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
            });
            $('[data-toggle="counter-up"]').counterUp({
                delay: 20,
                time: 1000
            });

        });
    </script>

</body>

</html>