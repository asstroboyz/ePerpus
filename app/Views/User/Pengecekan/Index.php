<?=$this->extend('User/Templates/Index')?>

<?=$this->section('page-content');?>

<!-- <pre><?php print_r($pengecekan); ?></pre> -->

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

                <div class="col-md-12 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <!-- Judul Card -->
                            <h5 class="card-title text-center text-info font-weight-bold mb-4">Data Balita dan Keluarga
                            </h5>

                            <div class="row">
                                <!-- Kolom Kiri: Data Balita -->
                                <div class="col-md-6 mb-4">
                                    <h6 class="font-weight-bold text-primary mb-3"><i class="fas fa-child"></i>
                                        Informasi Balita</h6>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama Balita</th>
                                                <td>:
                                                    <?=$data_balita->nama;?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis Kelamin</th>
                                                <td>:
                                                    <?=$data_balita->jenis_kelamin;?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal Lahir</th>

                                                <td>:
                                                    <?=date('d-m-Y', strtotime($data_balita->tgl_lahir));?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Umur Masuk</th>
                                                <td>:
                                                    <?=$data_balita->umur;?>
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
                                    <h6 class="font-weight-bold text-primary mb-3"><i class="fas fa-user"></i> Informasi
                                        Orang Tua</h6>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama Orang Tua</th>
                                                <td>:
                                                    <?=$data_balita->nama_ortu;?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NO KK Keluarga</th>
                                                <td>:
                                                    <?=$data_balita->no_kk;?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NIK Orang Tua</th>
                                                <td>:
                                                    <?=$data_balita->nik_ortu;?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">NIK Balita</th>
                                                <td>:
                                                    <?=$data_balita->nik_balita;?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat</th>
                                                <td>:
                                                    <?=$data_balita->alamat;?>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                <?php if (!empty($pengecekan)): ?>
                                <?php foreach ($pengecekan as $p): ?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=date('d-m-Y', strtotime($p['tgl_pemeriksaan']));?>
                                    </td>
                                    <td><?=$p['bb_awal'];?>
                                        kg</td>
                                    <td><?=$p['tb_awal'];?>
                                        cm</td>
                                    <td><?=$p['lk_awal'];?>
                                        cm</td>
                                    <td><?=$p['bb_u'];?>
                                    </td>
                                    <td><?=$p['bb_tb'];?>
                                    </td>
                                    <td><?=$p['tb_u'];?>
                                    </td>
                                    <td><?=$p['rambu_gizi'];?>
                                    </td>
                                    <td><?=$p['jenis_imunisasi_id'];?>
                                    </td>
                                    <td><?=$p['asi_eks'];?>
                                    </td>
                                    <td><?=$p['no_hp'];?>
                                    </td>
                                    <td><?=$data_balita->alamat_posyandu;?>
                                    </td>
                                    <td><a class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></td>
                                </tr>
                                <?php endforeach;?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="13" style="text-align:center;">Data tidak ditemukan</td>
                                </tr>
                                <?php endif;?>
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
                    action="<?=base_url('user/savePengecekan');?>"
                    method="post">
                    <?=csrf_field();?>

                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pemeriksaan Awal</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label for="bb_awal">Berat Badan Awal (BB Awal) (kg)</label>
                                        <input type="hidden"
                                            class="form-control <?=($validation->hasError('balita_id')) ? 'is-invalid' : '';?>"
                                            id="balita_id" name="balita_id"
                                            value="<?= isset($pengecekan[0]['balita_id']) ? $pengecekan[0]['balita_id'] : ''; ?>">
                                        <input type="number" step="0.01"
                                            class="form-control <?=($validation->hasError('bb_awal')) ? 'is-invalid' : '';?>"
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
                                            class="form-control <?=($validation->hasError('tb_awal')) ? 'is-invalid' : '';?>"
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
                                            class="form-control <?=($validation->hasError('lk_awal')) ? 'is-invalid' : '';?>"
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
                                        <input type="number" step="0.01"
                                            class="form-control <?=($validation->hasError('bb_u')) ? 'is-invalid' : '';?>"
                                            id="bb_u" name="bb_u"
                                            value="<?=old('bb_u');?>">
                                        <div class="invalid-feedback">
                                            <?=$validation->getError('bb_u');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bb_tb">Berat Badan per Tinggi Badan (BB/TB) (kg)</label>
                                        <input type="number" step="0.01"
                                            class="form-control <?=($validation->hasError('bb_tb')) ? 'is-invalid' : '';?>"
                                            id="bb_tb" name="bb_tb"
                                            value="<?=old('bb_tb');?>">
                                        <div class="invalid-feedback">
                                            <?=$validation->getError('bb_tb');?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tb_u">Tinggi Badan per Umur (TB/U) (cm)</label>
                                        <input type="number" step="0.01"
                                            class="form-control <?=($validation->hasError('tb_u')) ? 'is-invalid' : '';?>"
                                            id="tb_u" name="tb_u"
                                            value="<?=old('tb_u');?>">
                                        <div class="invalid-feedback">
                                            <?=$validation->getError('tb_u');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rambu_gizi">Rambu Gizi</label>
                                        <input type="text"
                                            class="form-control <?=($validation->hasError('rambu_gizi')) ? 'is-invalid' : '';?>"
                                            id="rambu_gizi" name="rambu_gizi"
                                            value="<?=old('rambu_gizi');?>">
                                        <div class="invalid-feedback">
                                            <?=$validation->getError('rambu_gizi');?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_imunisasi_id">Jenis Imunisasi</label>
                                        <input type="number"
                                            class="form-control <?=($validation->hasError('jenis_imunisasi_id')) ? 'is-invalid' : '';?>"
                                            id="jenis_imunisasi_id" name="jenis_imunisasi_id"
                                            value="<?=old('jenis_imunisasi_id');?>">
                                        <div class="invalid-feedback">
                                            <?=$validation->getError('jenis_imunisasi_id');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lk_awal">Lingkar Kepala (cm)</label>
                                        <input type="number" step="0.01"
                                            class="form-control <?=($validation->hasError('lk_awal')) ? 'is-invalid' : '';?>"
                                            id="lk_awal" name="lk_awal"
                                            value="<?=old('lk_awal');?>">
                                        <div class="invalid-feedback">
                                            <?=$validation->getError('lk_awal');?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="asi_eks">ASI Eksklusif</label>
                                        <select
                                            class="form-control <?=($validation->hasError('asi_eks')) ? 'is-invalid' : '';?>"
                                            id="asi_eks" name="asi_eks">
                                            <option value="1" <?=old('asi_eks') == '1' ? 'selected' : '';?>>Ya
                                            </option>
                                            <option value="0" <?=old('asi_eks') == '0' ? 'selected' : '';?>>Tidak
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?=$validation->getError('asi_eks');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="tel"
                                            class="form-control <?=($validation->hasError('no_hp')) ? 'is-invalid' : '';?>"
                                            id="no_hp" name="no_hp"
                                            value="<?=old('no_hp');?>">
                                        <div class="invalid-feedback">
                                            <?=$validation->getError('no_hp');?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bb_awal">Berat Badan Awal (kg)</label>
                                        <input type="number" step="0.01"
                                            class="form-control <?=($validation->hasError('bb_awal')) ? 'is-invalid' : '';?>"
                                            id="bb_awal" name="bb_awal"
                                            value="<?=old('bb_awal');?>">
                                        <div class="invalid-feedback">
                                            <?=$validation->getError('bb_awal');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tb_awal">Tinggi Badan Awal (cm)</label>
                                        <input type="number" step="0.01"
                                            class="form-control <?=($validation->hasError('tb_awal')) ? 'is-invalid' : '';?>"
                                            id="tb_awal" name="tb_awal"
                                            value="<?=old('tb_awal');?>">
                                        <div class="invalid-feedback">
                                            <?=$validation->getError('tb_awal');?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">


                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Simpan</button>
                </form>
            </div>
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

    // Button untuk menutup form
    closeButton.addEventListener('click', function() {
        formTambah.style.display = 'none';
    });
</script>
<?=$this->endSection('page-content');?>