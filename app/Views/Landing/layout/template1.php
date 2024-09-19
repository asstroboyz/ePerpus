<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/anfstudiologo.svg" type="image/x-icon">
    <title>d i c o d i n g | Tugas Akhir</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap-grid.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
        integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css"
        integrity="sha512-72OVeAaPeV8n3BdZj7hOkaPSEk/uwpDkaGyP4W2jSzAC8tfiO4LMEDWoL3uFp5mcZu+8Eehb4GhZWFwvrss69Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('css/style.css'); ?>"
        media="all" />
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

        .tentang-kami {
            background-color: #F5F9FC;
        }

        .tentang-kami h3 {
            color: #007BFF;
            font-weight: bold;
        }

        .tentang-kami h2 {
            color: #1F2D3D;
            font-weight: 700;
            display: flex;
        }

        .tentang-kami p {
            font-size: 1.1rem;
            color: #4A4A4A;

        }

        .tentang-kami ul {
            list-style: none;

        }

        .tentang-kami ul li {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #4A4A4A;

        }

        .tentang-kami ul li i {
            color: #007BFF;
            margin-right: 10px;

        }

        .tentang-kami img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }


        .artikel {
            padding: 50px 20px;
            background-color: #e0f7fa;
        }

        .artikel h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 3rem;
            font-family: 'Roboto', sans-serif;
            font-weight: 900;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .artikel h2 span {
            color: #FF6F61;
            font-weight: 900;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .artikel-cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
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


        /* New styles for the schedule/agenda (jadwal) section */
    </style>
</head>

<body class="container-fluid">

    <main role="main" class="container-fluid">
        <!-- Content Section -->
        <?= $this->renderSection('content') ?>
        <!-- End Content Section -->
    </main>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>

    <!-- Timestamp -->
    <script>
        var myDate = new Date();
        var hrs = myDate.getHours();
        var greet;

        if (hrs < 12)
            greet = 'Good Morning';
        else if (hrs >= 12 && hrs <= 17)
            greet = 'Good Afternoon';
        else if (hrs >= 17 && hrs <= 24)
            greet = 'Good Evening';
        document.getElementById('greetings').innerHTML = '<b>' + greet + '</b>';
    </script>

    <!-- Carousel -->
    <script>
        const config = {
            autoload: true,
            itemsToBeVisible: 3,
            speed: 5000
        };

        function start() {
            window.onload = function() {
                setSlidersStyle(config);

                const prevSlideButton = document.getElementById("prev-slide");
                const nextSlideButton = document.getElementById("next-slide");

                prevSlideButton.addEventListener("click", () => {
                    navigate("backward", config);
                });

                nextSlideButton.addEventListener("click", () => {
                    navigate("forward", config);
                });

                if (config.autoload) {
                    playCarousel(nextSlideButton, config);
                }
            };
        }

        function setSlidersStyle(config) {
            document.querySelector(
                    "style"
                ).textContent +=
                `@media screen and (min-width:1180px) { .carousel__slide{ min-width: ${100 / config.itemsToBeVisible}% } }`;
        }

        function navigate(position, config) {
            const carouselEl = document.getElementById("carousel");
            const slideContainerEl = carouselEl.querySelector(".carousel__container");
            const slideEl = carouselEl.querySelector(".carousel__slide");
            let slideWidth = slideEl.offsetWidth;
            slideContainerEl.scrollLeft = this.getNewScrollPosition(
                position,
                slideContainerEl,
                slideWidth,
                config
            );
        }

        function getNewScrollPosition(position, slideContainerEl, slideWidth, config) {
            const maxScrollLeft =
                slideContainerEl.scrollWidth - slideWidth * config.itemsToBeVisible;
            if (position === "forward") {
                const x = slideContainerEl.scrollLeft + slideWidth;
                return x <= maxScrollLeft ? x : 0;
            } else {
                const x = slideContainerEl.scrollLeft - slideWidth;
                return x >= 0 ? x : maxScrollLeft;
            }
        }

        function playCarousel(nextButton, config) {
            const play = () => {
                nextButton.click();
                setTimeout(play, config.speed);
            };
            play();
        }
        start();
    </script>

    <!-- JQuery getCity -->
    <?= $this->renderSection('script') ?>

</body>

</html>