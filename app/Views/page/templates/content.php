<?= $this->extend('page/templates/index'); ?>


<?= $this->section('content'); ?>
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
                <div class="feature-item" style="background-color: #B2E0F0; padding: 30px; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; align-items: center;">
                    <div class="feature-icon bg-white p-4 mb-4 rounded-circle d-flex justify-content-center align-items-center" style="width: 100px; height: 100px;">
                        <i class="fas fa-baby fa-3x text-primary"></i> <!-- Ikon imunisasi -->
                    </div>
                    <h4 class="mb-4 text-dark">Data Balita</h4>
                    <span class="text-dark fs-2 fw-bold" data-toggle="counter-up"><?= $jumlah_balita; ?></span>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item" style="background-color: #C6E1D6; padding: 30px; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; align-items: center;">
                    <div class="feature-icon bg-white p-4 mb-4 rounded-circle d-flex justify-content-center align-items-center" style="width: 100px; height: 100px;">

                        <i class="fas fa-child fa-3x text-success"></i>
                    </div>
                    <h4 class="mb-4 text-dark">Data Anak Gizi Baik</h4>
                    <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">150</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item" style="background-color: #F2B2B2; padding: 30px; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; align-items: center;">
                    <div class="feature-icon bg-white p-4 mb-4 rounded-circle d-flex justify-content-center align-items-center" style="width: 100px; height: 100px;">
                        <i class="fas fa-user-md fa-3x text-danger"></i> <!-- Ikon dokter -->
                    </div>
                    <h4 class="mb-4 text-dark">Data Gizi Buruk</h4>
                    <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">30</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item" style="background-color: #FFE6A2; padding: 30px; text-align: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; align-items: center;">
                    <div class="feature-icon bg-white p-4 mb-4 rounded-circle d-flex justify-content-center align-items-center" style="width: 100px; height: 100px;">
                        <i class="fas fa-syringe fa-3x text-primary"></i> <!-- Ikon anak -->
                    </div>
                    <h4 class="mb-4 text-dark">Data Stunting</h4>
                    <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">25</span>
                </div>
            </div>
        </div>


    </div>
</div>



<div id="jadwal-imunisasi" class="container-fluid bg-light blog py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">

            <h1 class="display-4 mt-4 mb-4">Informasi Jadwal Imunisasi Anak</h1>
            <p class="mb-0">Berikut adalah jadwal imunisasi yang direkomendasikan untuk anak. Pastikan anak Anda mendapatkan imunisasi tepat waktu untuk menjaga kesehatan mereka.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.2s">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Posyandu</th>
                                <th>Alamat</th>
                                <th>Kader Posyandu</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Ambil waktu sekarang
                            $currentDateTime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
                            $currentDate = $currentDateTime->format('Y-m-d');
                            $currentTime = $currentDateTime->format('H:i:s');

                            $no = 1;
                            $hasUpcomingSchedule = false;

                            foreach ($jadwal as $imunisasi):
                                $jadwalDate = new DateTime($imunisasi['tanggal']);
                                $jadwalTime = new DateTime($imunisasi['jam']);

                                // Format tanggal menjadi dd-mm-yyyy
                                $formattedDate = $jadwalDate->format('d-m-Y');
                                // Format jam menjadi H:i atau H:i A (opsional untuk AM/PM)
                                $formattedTime = $jadwalTime->format('H:i');

                                // Cek apakah jadwal sesuai dengan tanggal dan waktu hari ini
                                if ($jadwalDate->format('Y-m-d') == $currentDate && $jadwalTime->format('H:i:s') >= $currentTime):
                                    $hasUpcomingSchedule = true;
                            ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= esc($imunisasi['nama_posyandu']) ?></td>
                                        <td><?= esc($imunisasi['alamat_posyandu']) ?></td>
                                        <td><?= esc($imunisasi['username']) ?></td>
                                        <td><?= $formattedDate ?></td>
                                        <td><?= $formattedTime ?> WIB</td>
                                    </tr>
                                <?php
                                endif;
                            endforeach;

                            if (!$hasUpcomingSchedule):
                                ?>
                                <tr>
                                    <td colspan="6" class="text-center  table-container">
                                        <strong class="slide-right">Tidak ada jadwal yang tersedia untuk hari ini atau jadwal telah melewati waktu sekarang.</strong>
                                    </td>
                                </tr>

                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
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
                <h3 class="text-uppercase" style="color: #00000;">Tentang Kami</h3>
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





<?= $this->endSection(); ?>