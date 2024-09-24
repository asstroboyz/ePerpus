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

    <!-- Spinner Start -->
    <!-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->


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

    <!-- Navbar & Hero End -->



    <!-- Carousel Start -->



    <!-- Carousel End -->

    <!-- Feature Start -->
    <div class="header-carousel owl-carousel">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4>Posyandu Ceria</h4>
                    <h1>Selamat datang di </br>
                        website informasi Posyandu Ceria</h1>
                    <!-- <p>Sebuah website yang menyajikan data secara lengkap dan faktual</p> -->
                </div>
                <div class="col-md-6 text-center">
                    <!-- Gambar Hero -->
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
                <h4 class="text-black">STATISTIK TAHUN <?php echo date('Y'); ?></h4>
                <h1 class="display-4 mb-4">Data Posyandu Ceria Pekalongan Selatan</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item bg-primary p-4 pt-0 text-center">
                        <div class="feature-icon bg-white p-4 mb-4">
                            <i class="fas fa-baby fa-3x"></i> <!-- Ikon balita -->
                        </div>
                        <h4 class="mb-4">Data Balita</h4>
                        <span class="text-black fs-2 fw-bold" data-toggle="counter-up">200</span>
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


    <!-- Feature End -->

    <!-- About Start -->

    <!-- About End -->

    <!-- Service Start -->
    <!-- <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Services</h4>
                <h1 class="display-4 mb-4">We Provide Best Services</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                    sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/blog-1.png" class="img-fluid rounded-top w-100" alt="">
                            <div class="service-icon p-3">
                                <i class="fa fa-users fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Life Insurance</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis,
                                    eum!</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/blog-2.png" class="img-fluid rounded-top w-100" alt="">
                            <div class="service-icon p-3">
                                <i class="fa fa-hospital fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Health Insurance</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis,
                                    eum!</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/blog-3.png" class="img-fluid rounded-top w-100" alt="">
                            <div class="service-icon p-3">
                                <i class="fa fa-car fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Car Insurance</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis,
                                    eum!</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/blog-4.png" class="img-fluid rounded-top w-100" alt="">
                            <div class="service-icon p-3">
                                <i class="fa fa-home fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Home Insurance</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis,
                                    eum!</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="#">More Services</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Service End -->



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
                $hasUpcomingSchedule = false; // Variabel untuk mengecek apakah ada jadwal

                foreach ($jadwal as $imunisasi):
                    $jadwalDateTime = new DateTime($imunisasi['tanggal'] . ' ' . $imunisasi['jam']);
                    if ($jadwalDateTime > $currentDateTime):
                        $hasUpcomingSchedule = true; // Ada jadwal yang akan datang
                ?>
                        <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="blog-item">
                                <div class="blog-content p-4">
                                    <h4 class="mb-3"><?= esc($imunisasi['bidan']) ?> (<?= esc($imunisasi['nama_posyandu']) ?>)</h4>
                                    <div class="small mb-2"><strong>Tanggal:</strong> <?= esc($imunisasi['tanggal']) ?></div>
                                    <div class="small mb-2"><strong>Jam:</strong> <?= esc($imunisasi['jam']) ?></div>
                                    <p class="mb-3"><strong>Alamat:</strong> <?= esc($imunisasi['alamat_posyandu']) ?></p>
                                    <p class="mb-3"><strong>Kader:</strong> <?= esc($imunisasi['kader_posyandu']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    endif; // Akhir dari pengecekan tanggal
                endforeach;

                // Jika tidak ada jadwal yang akan datang
                if (!$hasUpcomingSchedule):
                    ?>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
    <p><strong>Jadwal hari ini telah terlewatkan / tidak ada.</strong></p>
</div>

                <?php endif; ?>
            </div>
        </div>
    </div>



    <!-- <div id="jadwal-imunisasi" class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Jadwal Imunisasi</h4>
                <h1 class="display-4 mb-4">Informasi Jadwal Imunisasi Anak</h1>
                <p class="mb-0">Berikut adalah jadwal imunisasi yang direkomendasikan untuk anak. Pastikan anak Anda
                    mendapatkan imunisasi tepat waktu untuk menjaga kesehatan mereka.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <div class="blog-content p-4">
                            <h4 class="mb-3">Imunisasi Hepatitis B</h4>
                            <div class="small mb-2"><strong>Tanggal:</strong> 1 Jan 2025</div>
                            <div class="small mb-2"><strong>Usia:</strong> 0 Bulan</div>
                            <p class="mb-3">Imunisasi pertama yang harus diberikan kepada bayi segera setelah lahir.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="blog-item">
                        <div class="blog-content p-4">
                            <h4 class="mb-3">Imunisasi DPT (Difteri, Pertusis, Tetanus)</h4>
                            <div class="small mb-2"><strong>Tanggal:</strong> 1 Feb 2025</div>
                            <div class="small mb-2"><strong>Usia:</strong> 2 Bulan</div>
                            <p class="mb-3">Imunisasi untuk melindungi anak dari penyakit difteri, pertusis, dan
                                tetanus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="blog-item">
                        <div class="blog-content p-4">
                            <h4 class="mb-3">Imunisasi Polio</h4>
                            <div class="small mb-2"><strong>Tanggal:</strong> 1 Mar 2025</div>
                            <div class="small mb-2"><strong>Usia:</strong> 4 Bulan</div>
                            <p class="mb-3">Imunisasi untuk mencegah infeksi virus polio yang dapat menyebabkan
                                kelumpuhan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="blog-item">
                        <div class="blog-content p-4">
                            <h4 class="mb-3">Imunisasi MMR (Campak, Gondongan, Rubella)</h4>
                            <div class="small mb-2"><strong>Tanggal:</strong> 1 Apr 2025</div>
                            <div class="small mb-2"><strong>Usia:</strong> 9 Bulan</div>
                            <p class="mb-3">Imunisasi untuk melindungi anak dari campak, gondongan, dan rubella.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Blog End -->

    <!-- Team Start -->
    <!-- <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Team</h4>
                <h1 class="display-4 mb-4">Meet Our Expert Team Members</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                    sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-1.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-2.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-3.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/team-4.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Team End -->

    <!-- Testimonial Start -->
    <!-- <div class="container-fluid testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Testimonial</h4>
                <h1 class="display-4 mb-4">What Our Customers Are Saying</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                    sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                <div class="testimonial-item bg-light rounded">
                    <div class="row g-0">
                        <div class="col-4  col-lg-4 col-xl-3">
                            <div class="h-100">
                                <img src="img/testimonial-1.jpg" class="img-fluid h-100 rounded"
                                    style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 col-xl-9">
                            <div class="d-flex flex-column my-auto text-start p-4">
                                <h4 class="text-dark mb-0">Client Name</h4>
                                <p class="mb-3">Profession</p>
                                <div class="d-flex text-primary mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error
                                    molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded">
                    <div class="row g-0">
                        <div class="col-4  col-lg-4 col-xl-3">
                            <div class="h-100">
                                <img src="img/testimonial-2.jpg" class="img-fluid h-100 rounded"
                                    style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 col-xl-9">
                            <div class="d-flex flex-column my-auto text-start p-4">
                                <h4 class="text-dark mb-0">Client Name</h4>
                                <p class="mb-3">Profession</p>
                                <div class="d-flex text-primary mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                                <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error
                                    molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded">
                    <div class="row g-0">
                        <div class="col-4  col-lg-4 col-xl-3">
                            <div class="h-100">
                                <img src="img/testimonial-3.jpg" class="img-fluid h-100 rounded"
                                    style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 col-xl-9">
                            <div class="d-flex flex-column my-auto text-start p-4">
                                <h4 class="text-dark mb-0">Client Name</h4>
                                <p class="mb-3">Profession</p>
                                <div class="d-flex text-primary mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                                <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error
                                    molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <!-- <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-9">
                    <div class="mb-5">
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-5">
                                <div class="footer-item">
                                    <a href="index.html" class="p-0">
                                        <h3 class="text-white"><i class="fab fa-slack me-3"></i> LifeSure</h3>
                                   
                                    </a>
                                    <p class="text-white mb-4">Dolor amet sit justo amet elitr clita ipsum elitr
                                        est.Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                                    <div class="footer-btn d-flex">
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-0" href="#"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="footer-item">
                                    <h4 class="text-white mb-4">Useful Links</h4>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> About Us</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Features</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Services</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> FAQ's</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Blogs</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Contact</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="footer-item">
                                    <h4 class="mb-4 text-white">Instagram</h4>
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-1.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-1.jpg"
                                                        data-lightbox="footerInstagram-1" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-2.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-2.jpg"
                                                        data-lightbox="footerInstagram-2" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-3.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-3.jpg"
                                                        data-lightbox="footerInstagram-3" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-4.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-4.jpg"
                                                        data-lightbox="footerInstagram-4" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-5.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-5.jpg"
                                                        data-lightbox="footerInstagram-5" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-6.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-6.jpg"
                                                        data-lightbox="footerInstagram-6" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="row g-4">
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fas fa-map-marker-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Address</h4>
                                                <p class="mb-0">123 Street New York.USA</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fas fa-envelope fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Mail Us</h4>
                                                <p class="mb-0">info@example.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fa fa-phone-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Telephone</h4>
                                                <p class="mb-0">(+012) 3456 7890</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="footer-item">
                        <h4 class="text-white mb-4">Newsletter</h4>
                        <p class="text-white mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="position-relative rounded-pill mb-4">
                            <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Enter your email">
                            <button type="button"
                                class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                        </div>
                        <div class="d-flex flex-shrink-0">
                            <div class="footer-btn">
                                <a href="#" class="btn btn-lg-square rounded-circle position-relative wow tada"
                                    data-wow-delay=".9s">
                                    <i class="fa fa-phone-alt fa-2x"></i>
                                    <div class="position-absolute" style="top: 2px; right: 12px;">
                                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column ms-3 flex-shrink-0">
                                <span>Call to Our Experts</span>
                                <a href="tel:+ 0123 456 7890"><span class="text-white">Free: + 0123 456 7890</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-end mb-md-0">
                    <span class="text-body"><a href="#" class="border-bottom text-white"><i
                                class="fas fa-copyright text-light me-2"></i>Posyandu Ceria</a>, All right
                        reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-start text-body">
                    Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">Riski</a>
                    Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a>
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
    <!-- <script
        src="<?php echo base_url() ?>/assets/front/lib/counterup/counterup.min.js">
    </script> -->

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