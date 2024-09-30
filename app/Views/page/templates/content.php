<?=$this->extend('page/templates/index');?>


<?=$this->section('content');?>
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

<div id="statistik-anak" class="container-fluid feature bg-light py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-black">STATISTIK TAHUN
                <?php echo date('Y'); ?>
            </h4>
            <h1 class="display-4 mb-4">Data Posyandu Ceria Pekalongan Selatan</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item bg-primary p-4 pt-0 text-center">
                    <div class="feature-icon bg-white p-4 mb-4">
                        <i class="fas fa-baby fa-3x"></i> <!-- Ikon balita -->
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
                        <i class="fas fa-skull-crossbones fa-3x"></i> 
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



<div id="jadwal-imunisasi" class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Jadwal Imunisasi</h4>
            <h1 class="display-4 mb-4">Informasi Jadwal Imunisasi Anak</h1>
            <p class="mb-0">Berikut adalah jadwal imunisasi yang direkomendasikan untuk anak. Pastikan anak Anda
                mendapatkan imunisasi tepat waktu untuk menjaga kesehatan mereka.</p>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
            <?php
            // Ambil waktu sekarang
            $currentDateTime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

            // Ambil tanggal sekarang
            $currentDate = $currentDateTime->format('Y-m-d');
            // Ambil jam sekarang
            $currentTime = $currentDateTime->format('H:i:s');

            $hasUpcomingSchedule = false;

            foreach ($jadwal as $imunisasi):
                // Ambil tanggal dan jam dari jadwal
                $jadwalDate = $imunisasi['tanggal']; // Format: Y-m-d
                $jadwalTime = $imunisasi['jam'];     // Format: H:i:s (atau H:i)

                // Jika tanggal jadwal sama dengan hari ini dan waktu jadwal lebih besar dari atau sama dengan waktu sekarang
                if ($jadwalDate == $currentDate && $jadwalTime >= $currentTime):
                    $hasUpcomingSchedule = true;
            ?>
                    <div class="col wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="card-title mb-3">
                                    <?= esc($imunisasi['bidan']) ?>
                                    (<?= esc($imunisasi['nama_posyandu']) ?>)
                                </h4>
                                <div class="card-text small mb-2">
                                    <strong>Tanggal:</strong> <?= esc($imunisasi['tanggal']) ?>
                                </div>
                                <div class="card-text small mb-2">
                                    <strong>Jam:</strong> <?= esc($imunisasi['jam']) ?>
                                </div>
                                <p class="card-text mb-3"><strong>Alamat:</strong> <?= esc($imunisasi['alamat_posyandu']) ?></p>
                                <p class="card-text mb-3"><strong>Kader:</strong> <?= esc($imunisasi['kader_posyandu']) ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                endif;
            endforeach;

            // Jika tidak ada jadwal yang sesuai untuk hari ini
            if (!$hasUpcomingSchedule):
            ?>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <p><strong>Tidak ada jadwal yang tersedia untuk hari ini atau jadwal telah melewati waktu sekarang.</strong></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>




<?=$this->endSection();?>