<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>POSYANDU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url() ?>/img/depan/logo-posyandu.png"
        rel="icon">
    <link
        href="<?php echo base_url() ?>/assets/img/apple-touch-icon.png"
        rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>/assets/vendor/aos/aos.css"
        rel="stylesheet">
    <link
        href="<?php echo base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet">
    <link
        href="<?php echo base_url() ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css"
        rel="stylesheet">
    <link
        href="<?php echo base_url() ?>/assets/vendor/boxicons/css/boxicons.min.css"
        rel="stylesheet">
    <link
        href="<?php echo base_url() ?>/assets/vendor/glightbox/css/glightbox.min.css"
        rel="stylesheet">
    <link
        href="<?php echo base_url() ?>/assets/vendor/swiper/swiper-bundle.min.css"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>/assets/css/style.css"
        rel="stylesheet">
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

        .hero-section .animated-image {
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



        .card {
            background-color: #f9f9f9;
            border: 1px solid #FF6F61;
            /* Pink border */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            transition: transform 0.3s ease;
            width: 500px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 20px;
        }

        .card-content p {
            color: #666;
            font-size: 0.9rem;
        }

        .card-content h3 {
            color: #333;
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .btn-read-more {
            padding: 10px 20px;
            background-color: #FF6F61;
            border: none;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
            border-radius: 10px;
        }

        .btn-read-more:hover {
            background-color: #FF3B30;
        }

        /* FAQ Section Styling */
        /* FAQ Section Styling */
        .faq-section {
            padding: 50px;
            background-color: #f9f9f9;
        }

        .faq-section h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 40px;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .faq-item .question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #007bff;
            cursor: pointer;
            color: white;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        .faq-item .question h3 {
            margin: 0;
        }

        .faq-item .toggle-icon {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .faq-item .answer {
            overflow: hidden;
            max-height: 0;
            /* Secara default, jawaban tersembunyi */
            padding: 0 15px;
            /* Padding horizontal agar tetap rapi saat terbuka */
            background-color: #f5f5f5;
            font-size: 1rem;
            color: #333;
            line-height: 1.6;
            transition: max-height 0.4s ease, padding 0.4s ease;
            /* Transisi halus pada ketinggian dan padding */
        }

        .faq-item .answer.active {
            max-height: 200px;
            /* Tinggi maksimum ketika terbuka (sesuaikan sesuai konten) */
            padding: 15px;
            /* Mengembalikan padding saat terbuka */
        }

        .faq-item .answer p {
            margin: 0;
        }

        /* Animasi transisi pada hover untuk pertanyaan */
        .faq-item .question:hover {
            background-color: #0056b3;
            /* Warna lebih gelap saat di-hover */
        }

        #header {
            height: 80px;
            /* Ubah sesuai kebutuhan */
            /* background-color: transparent; */
            /* Agar tidak ada latar belakang pada header */
        }

        /* Menata container dalam header */
        #header .container {
            height: 100%;
        }

        /* Menata logo agar posisinya sesuai dalam header */
        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            /* Atur ukuran font sesuai kebutuhan */
            color: #000;
            /* Ubah warna font sesuai kebutuhan */
            text-decoration: none;
        }

        .logo img {
            margin-right: 10px;
            /* Jarak antara gambar dan teks logo */
        }

        /* Menata navbar */
        .navbar {
            height: 100%;
        }

        .navbar ul {
            display: flex;
            align-items: center;
            height: 100%;
        }

        .navbar ul li {
            margin: 0 15px;
            /* Jarak antar item menu */
        }

        .navbar ul li a {
            text-decoration: none;
            color: #000;
            /* Warna teks link */
            padding: 15px 0;
            /* Padding vertikal agar link lebih tinggi */
            display: inline-block;
        }

        .navbar ul li a.active {
            background-color: transparent;
            /* Pastikan latar belakang tidak ada pada link aktif */
        }

        .navbar ul li a:hover {
            background-color: rgba(0, 0, 0, 0.1);
            /* Warna latar belakang saat hover jika diinginkan */
        }

        /* Mobile menu toggle */
        .mobile-nav-toggle {
            display: none;
            /* Sembunyikan menu toggle pada tampilan desktop */
        }

        @media (max-width: 768px) {
            .mobile-nav-toggle {
                display: block;
                /* Tampilkan menu toggle pada tampilan mobile */
            }

            .navbar ul {
                display: none;
                /* Sembunyikan menu pada tampilan mobile secara default */
                flex-direction: column;
                width: 100%;
            }

            .navbar.active ul {
                display: flex;
                /* Tampilkan menu saat menu toggle diaktifkan */
            }
        }

        /* New styles for the schedule/agenda (jadwal) section */
    </style>
    <!-- =======================================================
  * Template Name: BizLand - v3.6.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center" height="70px">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="/" class="logo">
                <img src="<?php echo base_url() ?>/img/depan/logo-Posyandu.png"
                    width="60px" height="auto" alt="Posyandu Logo">
                Posyandu
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#visimisi">Jadwal</a></li>
                    <li><a class="nav-link scrollto" href="#visimisi">Lihat Anak</a></li>
                    <li><a class="nav-link scrollto" href="#visimisi">Jumlah Anak</a></li>
                    <li><a class="nav-link scrollto" href="#visimisi">Visi Misi</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url() ?>/user">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>


    <!-- ======= Hero Section ======= -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4>Posyandu Ceria</h4>
                    <h1>Selamat datang di </br>
                        website informasi Posyandu Ceria</h1>
                    <!-- <p>Sebuah website yang menyajikan data secara lengkap dan faktual</p> -->
                    <!-- <a href="<?= base_url() ?>/user"
                    class="btn-get-started scrollto">Login</a> -->
                </div>
                <div class="col-md-6 text-center">
                    <!-- Gambar Hero -->
                    <img src="img/depan/logo.png" alt="Hero Image" class="img-fluid animated-image">
                </div>
            </div>
        </div>
    </section>


    <main id="main">



        <!-- ======= Portfolio Section ======= -->
       <!-- <section id="visimisi" class="visimisi">
    <div class="container" data-aos="fade-up">
        <h2 class="text-center">Jumlah Balita per Posyandu</h2>
        
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Nama Posyandu</th>
                    <th>Jumlah Balita</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($jumlah_balita)) : ?>
                    <?php foreach ($jumlah_balita as $data) : ?>
                        <tr>
                            <td><?= esc($data['nama_posyandu']); ?></td>
                            <td><?= esc($data['jumlah_balita']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="2" class="text-center">Tidak ada data balita yang ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section> -->
<section class="funfacts type_one">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading tp_one text-center text_white icon_dark">
                    <h6>Statistik Tahun 2024</h6>
                    <span class="flaticon-virus icon"></span>
                    <h1>Data Posyandu Ceria</h1>
                </div>
            </div>
        </div>
        <div class="about_fun_facts">
            <div class="row">
                <div class="col-lg-3">
                    <div class="fun_facts_box type_one">
                        <div class="icon">
                            <img src="https://posyandu.banjarnegara-desa.id/assets/front/image/svg/baby.png" class="img-fluid svg_image" alt="Data Balita">
                        </div>
                        <h2><span class="counter-value"><?= esc($data['jumlah_balita']); ?></span></h2>
                        <h6>Data Balita</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="fun_facts_box type_one">
                        <div class="icon">
                            <img src="https://posyandu.banjarnegara-desa.id/assets/front/image/svg/bumil.png" class="img-fluid svg_image" alt="Data Ibu Hamil">
                        </div>
                        <h2><span class="counter-value"><?= esc($data['jumlah_balita']); ?></span></h2>
                        <h6>Data Ibu Hamil</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="fun_facts_box type_one">
                        <div class="icon">
                            <img src="https://posyandu.banjarnegara-desa.id/assets/front/image/svg/lansia.png" class="img-fluid svg_image" alt="Data Lansia">
                        </div>
                    <h2><span class="counter-value"><?= esc($data['jumlah_balita']); ?></span></h2>
                        <h6>Data Lansia</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="fun_facts_box type_one last">
                        <div class="icon">
                            <img src="https://posyandu.banjarnegara-desa.id/assets/front/image/svg/others.png" class="img-fluid svg_image" alt="Data Bayi">
                        </div>
                          <h2><span class="counter-value"><?= esc($data['jumlah_balita']); ?></span></h2>
                        <h6>Data Bayi</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak</h2>
                    <h3><span>Kontak Kami</span></h3>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Alamat</h3>
                            <p>Jl. Pahlawan No. 1 Semarang
                                Jateng, Indonesia</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Kami</h3>
                            <p>bidti_jateng@polri.go.id</p>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Hubungi Kami</h3>
                            <p>021 – 83713168</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1080170588107!2d110.41631021434823!3d-6.9965586704665865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b6769041ae9%3A0xc903b0320fc8986d!2sPolda%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1668187486663!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-5 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Beranda</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#visimisi">Fasilitas</a></li>

                            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Kontak</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-1 col-md-2 footer-contact " style="margin-right:30px ;">
                        <h3><img src="<?php echo base_url() ?>/assets/img/polda.ico"
                                width="100px" height="100px"></h3>
                    </div>
                    <div class="col-lg-3 col-md-3 footer-contact">

                        <p>
                            Jl. Pahlawan No. 1 Semarang Jateng, Indonesia <br>
                            <strong>Telpon:</strong> 021 – 83713168<br>
                            <strong>Email:</strong> bidti_jateng@polri.go.id<br>
                            <strong>Website:</strong> <a
                                href="https://jateng.polri.go.id">https://jateng.polri.go.id</a>
                        </p>
                    </div>



                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>POLDA JATENG</span></strong>.
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
                Designed by &copy; POLDA JATENG
                <?= date('Y'); ?></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url() ?>/assets/vendor/aos/aos.js"></script>
    <script
        src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script
        src="<?php echo base_url() ?>/assets/vendor/glightbox/js/glightbox.min.js">
    </script>
    <script
        src="<?php echo base_url() ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js">
    </script>
    <script
        src="<?php echo base_url() ?>/assets/vendor/php-email-form/validate.js">
    </script>
    <script
        src="<?php echo base_url() ?>/assets/vendor/purecounter/purecounter.js">
    </script>
    <script
        src="<?php echo base_url() ?>/assets/vendor/swiper/swiper-bundle.min.js">
    </script>
    <script
        src="<?php echo base_url() ?>/assets/vendor/waypoints/noframework.waypoints.js">
    </script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url() ?>/assets/js/main.js"></script>

</body>

</html>