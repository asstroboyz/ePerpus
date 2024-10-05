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

        .table-container {
            overflow: hidden;
            /* Menghindari teks mentok di tepi */
            white-space: nowrap;
            /* Mencegah teks terpotong */
            padding: 0 20px;
            /* Menambahkan padding di kiri dan kanan */
        }



        @keyframes slide-right {
            0% {
                transform: translateX(-40%);
            }

            25% {
                transform: translateX(0);

            }

            50% {
                transform: translateX(40%);

            }

            75% {
                transform: translateX(0);

            }

            100% {
                transform: translateX(-40%);

            }
        }

        .slide-right {
            display: inline-block;
            animation: slide-right 10s linear infinite;
            /* Durasi 10 detik dengan linear untuk stabilitas */
            margin: 0;
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

        .content-section {
            margin-top: 90px;
            /* Sesuaikan jarak dengan tinggi navbar, kira-kira 90px */
            padding-top: 0;
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
            /* background: linear-gradient(to top, rgba(255, 255, 255, 1) 50%, rgba(255, 255, 255, 0) 100%); */
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

        /* .feature-icon i {
            font-size: 30px;
            color: transparent;
        } */

      


        .back-to-top {
            position: fixed;
            /* Posisi tetap di layar */
            bottom: 20px;
            /* Jarak dari bawah halaman */
            right: 20px;
            /* Jarak dari sisi kanan halaman */
            z-index: 9999;
            /* Pastikan z-index lebih tinggi dari footer */
            background-color: #007bff;
            /* Warna tombol */
            color: white;
            /* Warna ikon */
            padding: 10px;
            border-radius: 50%;
            /* Membuat tombol menjadi bulat */
        }

        .back-to-top:hover {
            background-color: #0056b3;
            /* Warna saat di-hover */
            color: #fff;
            /* Warna ikon saat di-hover */
        }
    </style>
</head>

<body>



    <!-- Navbar & Hero Start -->
    <?= $this->include('Page/Templates/Navbar'); ?>


    <?= $this->renderSection('content'); ?>





    <!-- Copyright Start -->





    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

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