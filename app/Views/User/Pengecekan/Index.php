<?=$this->extend('User/Templates/Index')?>

<?=$this->section('page-content');?>

<?php
use App\Models\DataBalitaDetailModel;

$pengecekanModel = new DataBalitaDetailModel();
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-weight-bold text-primary">Informasi Balita</h5>
                    <div class="d-flex gap-2">
                        <!-- <a href="<?=base_url('Admin/cetak_qr_id/' . $data_balita->id);?>"
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

                <div class="row">
                    <!-- Data Personal Balita -->
                    <div class="col-md-6 mb-3">
                        <div class="card border-info shadow-sm h-100">
                            <div class="card-body">
                                <h6 class="card-title text-black font-weight-bold">Data Balita</h6>
                                <p class="card-text"><strong>Nama :</strong>
                                    <?=$data_balita->nama;?>
                                </p>
                                <p class="card-text"><strong>Jenis Kelamin :</strong>
                                    <?=$data_balita->jenis_kelamin;?>
                                </p>
                                <p class="card-text"><strong>Tanggal Lahir :</strong>
                                    <?=date('d-m-Y', strtotime($data_balita->tgl_lahir));?>
                                </p>
                                <p class="card-text"><strong>Umur :</strong>
                                    <?=$data_balita->umur;?> Tahun
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card border-info shadow-sm h-100">
                            <div class="card-body">
                                <h6 class="card-title text-black font-weight-bold">Data Orang Tua</h6>
                                <p class="card-text"><strong>Nama Orang Tua :</strong>
                                    <?=$data_balita->nama_ortu;?>
                                </p>
                                <p class="card-text"><strong>NIK Balita :</strong>
                                    <?=$data_balita->nik_balita;?>
                                </p>
                                <p class="card-text"><strong>NIK Orang Tua :</strong>
                                    <?=$data_balita->nik_ortu;?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Data No KK dan Alamat -->
                    <div class="col-md-12 mb-3">
                        <div class="card border-info shadow-sm h-100">
                            <div class="card-body">
                                <h6 class="card-title text-black font-weight-bold">Identitas Keluarga</h6>
                                <p class="card-text"><strong>No KK :</strong>
                                    <?=$data_balita->no_kk;?>
                                </p>
                                <p class="card-text"><strong>Alamat :</strong>
                                    <?=$data_balita->alamat?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pemeriksaan Posyandu -->
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
                                            <td><?=$data_balita->nama_posyandu;?>
                                            </td>
                                            <td><?=$data_balita->bbl;?>
                                            </td>
                                            <td><?=$data_balita->pbl;?>
                                            </td>
                                            <td><?=$data_balita->lk_awal;?>
                                            </td>
                                            <td><?=$data_balita->tb_awal;?>
                                            </td>
                                            <td><?=date('d-m-Y', strtotime($data_balita->tgl_pemeriksaan_awal));?>
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
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow p-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="font-weight-bold">Detail Pengecekan Balita</h5>
                    <button type="button" class="btn btn-primary" id="toggleTambahForm">
                        <i class="fas fa-plus"></i> Tambah Pengecekan
                    </button>
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

    <!-- Form Tambah Pengecekan (Awalnya Tersembunyi) -->
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
                    action="<?= base_url('user/saveBalita'); ?>"
                    method="post">
                    <?= csrf_field(); ?>
                    <!-- Card pertama: Data Identitas Balita -->
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Identitas Balita</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Balita</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                            id="nama" name="nama"
                                            value="<?= old('nama'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select
                                            class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>"
                                            id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : ''; ?>>Laki-laki
                                            </option>
                                            <option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : ''; ?>>Perempuan
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_kelamin'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="umur">Umur (bulan)</label>
                                        <input type="number"
                                            class="form-control <?= ($validation->hasError('umur')) ? 'is-invalid' : ''; ?>"
                                            id="umur" name="umur"
                                            value="<?= old('umur'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('umur'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">No. HP</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>"
                                            id="no_hp" name="no_hp"
                                            value="<?= old('no_hp'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card kedua: Pemeriksaan Awal -->
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pemeriksaan Awal</h6>
                        </div>
                        <div class="card-body">
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
                                        <input type="number"
                                            class="form-control <?= ($validation->hasError('tb_awal')) ? 'is-invalid' : ''; ?>"
                                            id="tb_awal" name="tb_awal"
                                            value="<?= old('tb_awal'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tb_awal'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_imunisasi">Jenis Imunisasi</label>
                                        <select
                                            class="form-control <?= ($validation->hasError('jenis_imunisasi')) ? 'is-invalid' : ''; ?>"
                                            id="jenis_imunisasi" name="jenis_imunisasi">
                                            <option value="">Pilih Jenis Imunisasi</option>
                                            <option value="BCG" <?= old('jenis_imunisasi') == 'BCG' ? 'selected' : ''; ?>>BCG
                                            </option>
                                            <option value="Polio" <?= old('jenis_imunisasi') == 'Polio' ? 'selected' : ''; ?>>Polio
                                            </option>
                                            <option value="DPT" <?= old('jenis_imunisasi') == 'DPT' ? 'selected' : ''; ?>>DPT
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_imunisasi'); ?>
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
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // JavaScript untuk menampilkan/menyembunyikan form tambah data
    // Toggle form tambah pengecekan
    const toggleButton = document.getElementById('toggleTambahForm');
    const formTambah = document.getElementById('formTambahPengecekan');
    const closeButton = document.getElementById('closeButton');

    toggleButton.addEventListener('click', function () {
        formTambah.style.display = formTambah.style.display === 'none' ? 'block' : 'none';
    });

    // Button untuk menutup form
    closeButton.addEventListener('click', function () {
        formTambah.style.display = 'none';
    });
</script>
<?=$this->endSection('page-content');?>