<?= $this->extend('landing/layout/template1'); ?>
<?= $this->section('content'); ?>

<!-- Header-->
<header class="container-fluid">
    <div>
        <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="img/depan/logo-Posyandu.png" alt="Posyandu" width="auto" height="50">
                    <span class="brand-name">Posyandu</span>
                </a>
                <!-- Navbar Toggle for Mobile View -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar Links -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Berita Kesehatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dokumentasi Kesehatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Hubungi Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4>Posyandu Ceria</h4>
                <h1>Selamat datang di </br>
                    website informasi Posyandu Ceria</h1>

            </div>
            <div class="col-md-6 text-center">
                <!-- Gambar Hero -->
                <img src="img/depan/logo.png" alt="Hero Image" class="img-fluid animated-image">
            </div>
        </div>
    </div>
</section>

<section class="tentang-kami py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="img/depan/visi.png" alt="Tentang Kami" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h3 class="text-uppercase" style="color: #007BFF;">Tentang Kami</h3>
                <h2 class="fw-bold">Posyandu Ceria</h2>
                <p>
                    Posyandu Ceria menyediakan layanan kesehatan yang lengkap, termasuk pemeriksaan rutin untuk balita,
                    program imunisasi, penyuluhan kesehatan, serta pemantauan pertumbuhan balita.
                    Dengan komitmen pada kualitas pelayanan dan pencegahan penyakit, kami berupaya menciptakan generasi
                    yang lebih sehat dan berkualitas di masa depan.
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
</section>



<div class="artikel">
    <h2>Artikel <span>Posyandu</span></h2>
    <div class="artikel-cards">
        <div class="card">
            <img src="img/depan/stunting.jpg" alt="Mengenal Apa Itu Stunting">
            <div class="card-content">
                <h3>Mengenal Apa Itu Stunting</h3>
                <p>Sahabat Sehat, Definisi Stunting Sendiri Mengalami Perubahan. Menurut WHO (2015), Stunting Adalah...
                </p>
                <button class="btn-read-more">Lanjutkan Membaca</button>
            </div>
        </div>
        <div class="card">
            <img src="img/depan/imunisasi.jpg" alt="Pentingnya Imunisasi Bagi Anak">
            <div class="card-content">
                <h3>Pentingnya Imunisasi Bagi Anak</h3>
                <p>Imunisasi Adalah Upaya Pencegahan Penyakit Menular Dengan Memberikan "Vaksin" Sehingga Terjadi...</p>
                <button class="btn-read-more">Lanjutkan Membaca</button>
            </div>
        </div>
        <div class="card">
            <img src="img/depan/kepengurusan.jpeg" alt="Struktural Kepengurusan Posyandu Apel Merah">
            <div class="card-content">
                <h3>Struktural Kepengurusan Posyandu Apel Merah</h3>
                <p>POSYANDU APEL MERAH Posyandu Apel Merah Adalah Posyandu Yang Berada Di Pasar Minggu Kelurahan...</p>
                <button class="btn-read-more">Lanjutkan Membaca</button>
            </div>
        </div>
    </div>
    <div class="faq-section">
        <h2>Pertanyaan yang sering diajukan</h2>

        <div class="faq-container">
            <div class="faq-item">
                <div class="question">
                    <h3>Apa itu Sistem Informasi Posyandu</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="answer">
                    <p>Sistem Informasi Posyandu adalah sebuah platform digital yang dirancang untuk membantu
                        pengelolaan dan pemantauan kegiatan Posyandu.
                        Platform ini menyediakan alat untuk mencatat data kesehatan masyarakadan pelaporan untuk
                        meningkatkan efisiensi dan efektivitas layanan Posyandu.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="question">
                    <h3>Siapa yang bisa datang ke Posyandu?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="answer">
                    <p>Ibu menyusui, dan balita dapat mengunjungi Posyandu untuk mendapatkan pelayanan kesehatan.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="question">
                    <h3>Bagaimana cara mendaftar menjadi anggota Posyandu Ceria?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="answer">
                    <p>Untuk dapat menjadi anggota Posyandu Ceria,
                        Anda dapat datang langsung ke Posyandu terdekat dengan membawa identitas diri seperti KTP atau
                        Kartu Keluarga.
                        Pendaftaran dapat dilakukan secara gratis dan terbuka untuk seluruh masyarakat.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <div class="question">
                    <h3>Pelayanan apa saja yang diberikan oleh Posyandu?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="answer">
                    <p>Pelayanan Posyandu meliputi pemeriksaan kesehatan ibu dan anak, imunisasi, serta penyuluhan gizi
                        dan kesehatan.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.question');
            question.addEventListener('click', () => {
                const answer = item.querySelector('.answer');
                const icon = item.querySelector('.toggle-icon');
                answer.classList.toggle('active');
                icon.textContent = answer.classList.contains('active') ? '-' : '+';
            });
        });
    </script>


    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Sample store section-->

    <!-- Contact Sesion -->


    <?= $this->endSection(); ?>