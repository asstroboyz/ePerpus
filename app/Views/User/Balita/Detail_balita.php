<?= $this->extend('User/Templates/Index') ?>

<?= $this->section('page-content'); ?>

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

                <div class="row">
                    <!-- Data Personal Balita -->
                    <div class="col-md-6 mb-3">
                        <div class="card border-info shadow-sm h-100">
                            <div class="card-body">
                                <h6 class="card-title text-black font-weight-bold">Data Balita</h6>
                                <p class="card-text"><strong>Nama :</strong>
                                    <?= $data_balita->nama; ?>
                                </p>
                                <p class="card-text"><strong>Jenis Kelamin :</strong>
                                    <?= $data_balita->jenis_kelamin; ?>
                                </p>
                                <p class="card-text"><strong>Tanggal Lahir :</strong>
                                    <?= date('d-m-Y', strtotime($data_balita->tgl_lahir)); ?>
                                </p>
                                <p class="card-text"><strong>Umur :</strong>
                                    <?= $data_balita->umur; ?> Tahun
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Orang Tua dan Identitas Balita -->
                    <div class="col-md-6 mb-3">
                        <div class="card border-info shadow-sm h-100">
                            <div class="card-body">
                                <h6 class="card-title text-black font-weight-bold">Data Orang Tua</h6>
                                <p class="card-text"><strong>Nama Orang Tua :</strong>
                                    <?= $data_balita->nama_ortu; ?>
                                </p>
                                <p class="card-text"><strong>NIK Balita :</strong>
                                    <?= $data_balita->nik_balita; ?>
                                </p>
                                <p class="card-text"><strong>NIK Orang Tua :</strong>
                                    <?= $data_balita->nik_ortu; ?>
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
                                    <?= $data_balita->no_kk; ?>
                                </p>
                                <p class="card-text"><strong>Alamat :</strong>
                                    <?= $data_balita->alamat ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pemeriksaan Posyandu -->
                    <div class="col-md-12 mb-3">
                        <div class="card border-info shadow-sm h-100">
                            <div class="card-body">
                                <h6 class="card-title text-black font-weight-bold">Data Periksa Awal Posyandu</h6>
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
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card shadow p-4">
            <div class="card-header">
                <h5 class="font-weight-bold">Detail Pengecekan Balita</h5>
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

</div>

<?= $this->endSection('page-content'); ?>