<?= $this->extend('User/Templates/Index') ?>

<?= $this->section('page-content'); ?>

<!-- <pre><?php print_r($pengecekan); ?></pre> -->

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    
                    <div class="d-flex gap-2">
                        <!-- <a href="<?= base_url('Admin/cetak_qr_id/' . $data_balita->id); ?>"
                        class="btn btn-success font-weight-bold" target="_blank">
                        <i class="fa fa-print"></i> Cetak QR ID
                        </a> -->
                        <a href="/User/balita" class="btn btn-secondary font-weight-bold ml-2"
                            style="background-color: #ffffff; border-color: #17a2b8; color: black;"
                            onmouseover="this.style.backgroundColor='#17a2b8'; this.style.color='white';"
                            onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='black';"
                            onmousedown="this.style.backgroundColor='#17a2b8'; this.style.color='white';"
                            onmouseup="this.style.backgroundColor='#17a2b8'; this.style.color='white';">
                            <i class="fa fa-arrow-left"></i> Kembali ke Daftar Balita
                        </a>

                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <!-- Judul Card -->
                            <h5 class="card-title text-center text-dark font-weight-bold mb-4">Data Balita dan Keluarga
                            </h5>

                            <div class="row">
                                <!-- Kolom Kiri: Data Balita -->
                                <div class="col-md-6 mb-4">
                                    <h6 class="font-weight-bold text-dark mb-3"><i class="fas fa-child"></i>
                                        Informasi Balita</h6>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama Balita</th>
                                                <td>:
                                                    <?= $data_balita->nama; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis Kelamin</th>
                                                <td>:
                                                    <?php
                                                    echo ($data_balita->jenis_kelamin === 'P') ? 'Perempuan' : (($data_balita->jenis_kelamin === 'L') ? 'Laki-laki' : 'Jenis kelamin tidak diketahui');
                                                    ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal Lahir</th>

                                                <td>:
                                                    <?= date('d-m-Y', strtotime($data_balita->tgl_lahir)); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Umur Masuk</th>
                                                <td>:
                                                    <?= $data_balita->umur; ?>
                                                    Bulan
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Umur Saat Ini</th>
                                                <td>:
                                                    <?php
                                                    $tanggalLahir = $data_balita->tgl_lahir;
                                                    $birthDate = new DateTime($tanggalLahir);
                                                    $today = new DateTime("today");
                                                    $diff = $birthDate->diff($today);
                                                    $totalBulan = ($diff->y * 12) + $diff->m;
                                                    echo $totalBulan . " Bulan";
                                                    ?>


                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Kolom Kanan: Data Orang Tua -->
                                <div class="col-md-6 mb-4">
                                    <h6 class="font-weight-bold text-dark mb-3"><i class="fas fa-user"></i> Informasi
                                        Orang Tua</h6>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama Orang Tua</th>
                                                <td>:
                                                    <?= $data_balita->nama_ortu; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NO KK Keluarga</th>
                                                <td>:
                                                    <?= $data_balita->no_kk; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NIK Orang Tua</th>
                                                <td>:
                                                    <?= $data_balita->nik_ortu; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">NIK Balita</th>
                                                <td>:
                                                    <?= $data_balita->nik_balita; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat</th>
                                                <td>:
                                                    <?= $data_balita->alamat; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Baris Baru: Data Keluarga -->

                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">Data Periksa Awal Kader</h6>
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Posyandu</th>
                                        <th>BBL (kg)</th>
                                        <th>PBL (cm)</th>
                                        <th>LK Awal (cm)</th>
                                        <th>TB Awal (cm)</th>
                                        <th>Tanggal Pemeriksaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $data_balita->nama_posyandu; ?>
                                        </td>
                                        <td><?= $data_balita->bbl; ?>
                                        </td>
                                        <td><?= $data_balita->pbl; ?>
                                        </td>
                                        <td><?= $data_balita->lk_awal; ?>
                                        </td>
                                        <td><?= $data_balita->tb_awal; ?>
                                        </td>
                                        <td><?= date('d-m-Y', strtotime($data_balita->tgl_pemeriksaan_awal)); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow p-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h3>Data Pemeriksaan Balita</h3>
                    <div class="btn-group">
                        <!-- Tombol Tambah Balita -->

                        <a id="toggleTambahForm" class="btn btn-primary mr-1" style="background-color: #17a2b8; border-color: #17a2b8; color: black;"
                            onmouseover="this.style.backgroundColor='#17a2b8'; this.style.color='white';"
                            onmouseout="this.style.backgroundColor='#17a2b8'; this.style.color='black';"
                            onmousedown="this.style.backgroundColor='#17a2b8'; this.style.color='white';"
                            onmouseup="this.style.backgroundColor='#17a2b8'; this.style.color='white';">
                            <i class="fa fa-plus"></i> Tambah Pengecekan
                        </a>
                        <!-- Tombol Arsip Balita -->
                        <a id="viewgrafik" title="Lihat Grafik" class="btn btn-primary">
                            <i class="fas fa-chart-line"></i> Statistik Balita
                        </a>

                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>BB Awal</th>
                                    <th>TB Awal</th>
                                    <th>LK Awal</th>
                                    <th>BB / U</th>
                                    <th>BB / TB</th>
                                    <th>TB / U</th>
                                    <th>Rambu Gizi</th>
                                    <th>Jenis Imunisasi</th>
                                    <th>ASI Eksklusif</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if (!empty($pengecekan)): ?>
                                    <?php foreach ($pengecekan as $p): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= date('d-m-Y', strtotime($p['tgl_pemeriksaan'])); ?>
                                            </td>
                                            <td><?= $p['bb_awal']; ?>
                                                kg</td>
                                            <td><?= $p['tb_awal']; ?>
                                                cm</td>
                                            <td><?= $p['lk_awal']; ?>
                                                cm</td>
                                            <td><?= $p['bb_u']; ?>
                                            </td>
                                            <td><?= $p['bb_tb']; ?>
                                            </td>
                                            <td><?= $p['tb_u']; ?>
                                            </td>
                                            <td><?= $p['rambu_gizi']; ?>
                                            </td>
                                            <td><?= $p['jenis_imunisasi_id']; ?>
                                            </td>
                                            <td><?= $p['asi_eks']; ?>
                                            </td>
                                            <td><?= $p['no_hp']; ?>
                                            </td>
                                            <td><?= $data_balita->alamat_posyandu; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="13" style="text-align:center;">Data tidak ditemukan</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="viewGrafik" class="grafik-container mt-2" style="display: none;">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Grafik BB Awal (kg)</h5>
                <button type="button" class="btn btn-sm btn-danger closeButton">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="card-body">
                <canvas id="bbChart" width="200" height="100"></canvas>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Grafik TB Awal (cm)</h5>
                <button type="button" class="btn btn-sm btn-danger closeButton">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="card-body">
                <canvas id="tbChart" width="200" height="100"></canvas>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Grafik LK Awal (cm)</h5>
                <button type="button" class="btn btn-sm btn-danger closeButton">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="card-body">
                <canvas id="lkChart" width="200" height="100"></canvas>
            </div>
        </div>
    </div>

</div>
<div class="mt-4" id="formTambahPengecekan" style="display: none;">
    <div class="card shadow p-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="font-weight-bold">Tambah Data Pengecekan</h5>
            <button type="button" class="btn btn-sm btn-danger" id="closeButton">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>
        <div class="card-body">
            <form
                action="<?= base_url('user/savePengecekan'); ?>"
                method="post">
                <?= csrf_field(); ?>
                <?php
                $tanggalLahir = $data_balita->tgl_lahir;
                $birthDate = new DateTime($tanggalLahir);
                $today = new DateTime("today");
                $diff = $birthDate->diff($today);
                $totalBulan = ($diff->y * 12) + $diff->m;
                ?>
                <input type="hidden" id="umur_bulan" value="<?= $totalBulan; ?>">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Pemeriksaan Awal</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="bb_awal">Berat Badan Awal (BB Awal) (kg)</label>
                                    <input type="hidden"
                                        class="form-control <?= ($validation->hasError('balita_id')) ? 'is-invalid' : ''; ?>"
                                        id="balita_id" name="balita_id"
                                        value="<?= isset($pengecekan[0]['balita_id']) ? $pengecekan[0]['balita_id'] : ''; ?>">
                                    <input type="number" step="0.01"
                                        class="form-control <?= ($validation->hasError('bb_awal')) ? 'is-invalid' : ''; ?>"
                                        id="bb_awal" name="bb_awal"
                                        value="<?= isset($pengecekan[0]['bb_awal']) ? $pengecekan[0]['bb_awal'] : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bb_awal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tb_awal">Tinggi Badan Awal (TB Awal) (cm)</label>
                                    <input type="number" step="0.01"
                                        class="form-control <?= ($validation->hasError('tb_awal')) ? 'is-invalid' : ''; ?>"
                                        id="tb_awal" name="tb_awal"
                                        value="<?= isset($pengecekan[0]['tb_awal']) ? $pengecekan[0]['tb_awal'] : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tb_awal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lk_awal">Lingkar Kepala Awal (LK Awal) (cm)</label>
                                    <input type="number" step="0.01"
                                        class="form-control <?= ($validation->hasError('lk_awal')) ? 'is-invalid' : ''; ?>"
                                        id="lk_awal" name="lk_awal"
                                        value="<?= isset($pengecekan[0]['lk_awal']) ? $pengecekan[0]['lk_awal'] : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lk_awal'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label for="bb_u">Berat Badan per Umur (BB/U) (kg)</label>
                                    <input type="text" class="form-control" id="bb_u" name="bb_u" readonly>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bb_u'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bb_tb">Berat Badan per Tinggi Badan (BB/TB) (kg)</label>
                                    <input type="text" class="form-control" id="bb_tb" name="bb_tb" readonly>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bb_tb'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tb_u">Tinggi Badan per Umur (TB/U) (cm)</label>
                                    <input type="text" class="form-control" id="tb_u" name="tb_u" readonly>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tb_u'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rambu_gizi">Rambu Gizi</label>
                                    <input type="text"
                                        class="form-control <?= ($validation->hasError('rambu_gizi')) ? 'is-invalid' : ''; ?>"
                                        id="rambu_gizi" name="rambu_gizi"
                                        value="<?= old('rambu_gizi'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('rambu_gizi'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_imunisasi_id">Jenis Imunisasi</label>
                                    <select
                                        class="form-control <?= ($validation->hasError('jenis_imunisasi_id')) ? 'is-invalid' : ''; ?>"
                                        id="jenis_imunisasi_id" name="jenis_imunisasi_id">
                                        <option value="">Pilih Jenis Imunisasi</option>
                                        <?php foreach ($jenis_imunisasi as $imunisasi): ?>
                                            <option
                                                value="<?= $imunisasi['id']; ?>"
                                                <?= old('jenis_imunisasi_id') == $imunisasi['id'] ? 'selected' : ''; ?>>
                                                <?= $imunisasi['jenis_imunisasi']; ?>
                                                - Usia:
                                                <?= $imunisasi['usia_anak']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_imunisasi_id'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lk_awal">Lingkar Kepala (cm)</label>
                                    <input type="number" step="0.01"
                                        class="form-control <?= ($validation->hasError('lk_awal')) ? 'is-invalid' : ''; ?>"
                                        id="lk_awal" name="lk_awal"
                                        value="<?= old('lk_awal'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lk_awal'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="asi_eks">ASI Eksklusif</label>
                                    <select
                                        class="form-control <?= ($validation->hasError('asi_eks')) ? 'is-invalid' : ''; ?>"
                                        id="asi_eks" name="asi_eks">
                                        <option value="1" <?= old('asi_eks') == '1' ? 'selected' : ''; ?>>Ya
                                        </option>
                                        <option value="0" <?= old('asi_eks') == '0' ? 'selected' : ''; ?>>Tidak
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('asi_eks'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_hp">Nomor HP</label>
                                    <input type="tel"
                                        class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>"
                                        id="no_hp" name="no_hp"
                                        value="<?= old('no_hp'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bb_awal">Berat Badan Awal (kg)</label>
                                    <input type="number" step="0.01"
                                        class="form-control <?= ($validation->hasError('bb_awal')) ? 'is-invalid' : ''; ?>"
                                        id="bb_awal" name="bb_awal"
                                        value="<?= old('bb_awal'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bb_awal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tb_awal">Tinggi Badan Awal (cm)</label>
                                    <input type="number" step="0.01"
                                        class="form-control <?= ($validation->hasError('tb_awal')) ? 'is-invalid' : ''; ?>"
                                        id="tb_awal" name="tb_awal"
                                        value="<?= old('tb_awal'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tb_awal'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    const toggleButton = document.getElementById('toggleTambahForm');
    const formTambah = document.getElementById('formTambahPengecekan');
    const closeButton = document.getElementById('closeButton');

    toggleButton.addEventListener('click', function() {
        formTambah.style.display = formTambah.style.display === 'none' ? 'block' : 'none';
    });
    closeButton.addEventListener('click', function() {
        formTambah.style.display = 'none';
    });
    const bbAwalInput = document.getElementById('bb_awal');
    const tbAwalInput = document.getElementById('tb_awal');
    const umurBulanInput = document.getElementById('umur_bulan');

    const bbUInput = document.getElementById('bb_u');
    const bbTbInput = document.getElementById('bb_tb');
    const tbUInput = document.getElementById('tb_u');

    // Fungsi untuk menghitung BB/U, BB/TB, dan TB/U
    function hitungPeriksa() {
        const bbAwal = parseFloat(bbAwalInput.value) || 0;
        const tbAwal = parseFloat(tbAwalInput.value) || 0;
        const umurBulan = parseFloat(umurBulanInput.value) || 0;

        if (umurBulan > 0) {
            bbUInput.value = (bbAwal / umurBulan).toFixed(2);
        }

        if (tbAwal > 0) {
            bbTbInput.value = (bbAwal / tbAwal).toFixed(2);
            tbUInput.value = (tbAwal / umurBulan).toFixed(2);
        }
    }

    // Tambahkan event listener saat input berubah
    bbAwalInput.addEventListener('input', hitungPeriksa);
    tbAwalInput.addEventListener('input', hitungPeriksa);

    // Jalankan hitungPeriksa saat halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', function() {
        hitungPeriksa();
    });
    document.getElementById('jenis_imunisasi_id').addEventListener('change', function() {
        console.log("oke", this.value);
    });


    const bbData = [];
    const tbData = [];
    const lkData = [];
    const tglData = [];

    <?php if (!empty($pengecekan)): ?>
        <?php foreach ($pengecekan as $p): ?>
            bbData.push(<?= $p['bb_awal']; ?>);
            tbData.push(<?= $p['tb_awal']; ?>);
            lkData.push(<?= $p['lk_awal']; ?>);
            tglData.push('<?= date('d-m-Y', strtotime($p['tgl_pemeriksaan'])); ?>');
        <?php endforeach; ?>
    <?php endif; ?>

    document.getElementById('viewgrafik').addEventListener('click', function() {
        const grafikDiv = document.getElementById('viewGrafik');
        grafikDiv.style.display = 'block'; // Tampilkan grafik

        // Fungsi untuk membuat grafik BB
        const createBBChart = () => {
            const ctx = document.getElementById('bbChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: tglData,
                    datasets: [{
                        label: 'BB Awal (kg)',
                        data: bbData,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        };

        // Fungsi untuk membuat grafik TB
        const createTBChart = () => {
            const ctx = document.getElementById('tbChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: tglData,
                    datasets: [{
                        label: 'TB Awal (cm)',
                        data: tbData,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        };

        // Fungsi untuk membuat grafik LK
        const createLKChart = () => {
            const ctx = document.getElementById('lkChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: tglData,
                    datasets: [{
                        label: 'LK Awal (cm)',
                        data: lkData,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        };

        // Memanggil fungsi untuk membuat grafik
        createBBChart();
        createTBChart();
        createLKChart();
    });

    // Menambahkan event listener untuk menutup grafik
    document.querySelectorAll('.closeButton').forEach(button => {
        button.addEventListener('click', function() {
            const grafikDiv = document.getElementById('viewGrafik');
            grafikDiv.style.display = 'none'; // Sembunyikan grafik
        });
    });
</script>
<script>
    // // Mendapatkan elemen input form
    // const bbAwalInput = document.getElementById('bb_awal');
    // const tbAwalInput = document.getElementById('tb_awal');
    // const umurBulanInput = document.getElementById('umur_bulan');

    // const bbUInput = document.getElementById('bb_u');
    // const bbTbInput = document.getElementById('bb_tb');
    // const tbUInput = document.getElementById('tb_u');

    // // Fungsi untuk menghitung BB/U, BB/TB, dan TB/U
    // function hitungPeriksa() {
    //     const bbAwal = parseFloat(bbAwalInput.value) || 0;
    //     const tbAwal = parseFloat(tbAwalInput.value) || 0;
    //     const umurBulan = parseFloat(umurBulanInput.value) || 0;

    //     if (umurBulan > 0) {
    //         bbUInput.value = (bbAwal / umurBulan).toFixed(2); // Contoh BB/U
    //     }

    //     if (tbAwal > 0) {
    //         bbTbInput.value = (bbAwal / tbAwal).toFixed(2); // Contoh BB/TB
    //         tbUInput.value = (tbAwal / umurBulan).toFixed(2); // Contoh TB/U
    //     }
    // }


    // bbAwalInput.addEventListener('input', hitungPeriksa);
    // tbAwalInput.addEventListener('input', hitungPeriksa);
</script>

<?= $this->endSection('page-content'); ?>