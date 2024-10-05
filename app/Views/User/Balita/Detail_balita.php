<?= $this->extend('User/Templates/Index') ?>

<?= $this->section('page-content'); ?>

<?php
use App\Models\DataBalitaDetailModel;

$pengecekanModel = new DataBalitaDetailModel();
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Detail Balita</h1> -->

    <!-- <div class="row">
        <div class="col-lg-8">
            <div class="card shadow p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-weight-bold">Informasi Balita</h5>
                    <a href="<?= base_url('Admin/cetak_qr_id/' . $data_balita->id); ?>"
    class="btn btn-success font-weight-bold" target="_blank">
    <i class="fa fa-print"></i> Print
    </a>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="card-title">Nama Balita</h6>
                <p class="card-text"><?= $data_balita->nama; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="card-title">Jenis Kelamin</h6>
                <p class="card-text">
                    <?= $data_balita->jenis_kelamin; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="card-title">Tanggal Lahir</h6>
                <p class="card-text">
                    <?= date('d-m-Y', strtotime($data_balita->tgl_lahir)); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="card-title">Nama Orang Tua</h6>
                <p class="card-text"><?= $data_balita->nama_ortu; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="card-title">NIK Balita</h6>
                <p class="card-text"><?= $data_balita->nik_balita; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="card-title">No KK</h6>
                <p class="card-text"><?= $data_balita->no_kk; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="card-title">NIK Orang Tua</h6>
                <p class="card-text"><?= $data_balita->nik_ortu; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="card-title">RT</h6>
                <p class="card-text"><?= $data_balita->rt; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="card-title">RW</h6>
                <p class="card-text"><?= $data_balita->rw; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="card-title">Umur</h6>
                <p class="card-text"><?= $data_balita->umur; ?> Tahun
                </p>
            </div>
        </div>
    </div>
</div>

<a href="/Admin/adm_inventaris" class="btn btn-secondary mt-3">&laquo; Kembali ke daftar barang inventaris</a>
</div>
</div>
</div> -->
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
                <p class="card-text"><strong>Nama :</strong> <?= $data_balita->nama; ?></p>
                <p class="card-text"><strong>Jenis Kelamin :</strong> <?= $data_balita->jenis_kelamin; ?></p>
                <p class="card-text"><strong>Tanggal Lahir :</strong> <?= date('d-m-Y', strtotime($data_balita->tgl_lahir)); ?></p>
                <p class="card-text"><strong>Umur :</strong> <?= $data_balita->umur; ?> Tahun</p>
            </div>
        </div>
    </div>

    <!-- Data Orang Tua dan Identitas Balita -->
    <div class="col-md-6 mb-3">
        <div class="card border-info shadow-sm h-100">
            <div class="card-body">
                <h6 class="card-title text-black font-weight-bold">Data Orang Tua</h6>
                <p class="card-text"><strong>Nama Orang Tua :</strong> <?= $data_balita->nama_ortu; ?></p>
                <p class="card-text"><strong>NIK Balita :</strong> <?= $data_balita->nik_balita; ?></p>
                <p class="card-text"><strong>NIK Orang Tua :</strong> <?= $data_balita->nik_ortu; ?></p>
            </div>
        </div>
    </div>

    <!-- Data No KK dan Alamat -->
    <div class="col-md-12 mb-3">
        <div class="card border-info shadow-sm h-100">
            <div class="card-body">
                <h6 class="card-title text-black font-weight-bold">Identitas Keluarga</h6>
                <p class="card-text"><strong>No KK :</strong> <?= $data_balita->no_kk; ?></p>
                <p class="card-text"><strong>Alamat :</strong>  <?= $data_balita->alamat ?></p>
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
                            <td><?= $data_balita->nama_posyandu; ?></td>
                            <td><?= $data_balita->bbl; ?></td>
                            <td><?= $data_balita->pbl; ?></td>
                            <td><?= $data_balita->lk_awal; ?></td>
                            <td><?= $data_balita->tb_awal; ?></td>
                            <td><?= date('d-m-Y', strtotime($data_balita->tgl_pemeriksaan_awal)); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

            <!-- <div class="row">
              
                <div class="col-md-6 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">Nama Balita</h6>
                            <p class="card-text">
                                <?= $data_balita->nama; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">Jenis Kelamin</h6>
                            <p class="card-text">
                                <?= $data_balita->jenis_kelamin; ?>
                            </p>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-6 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">Tanggal Lahir</h6>
                            <p class="card-text">
                                <?= date('d-m-Y', strtotime($data_balita->tgl_lahir)); ?>
                            </p>
                        </div>
                    </div>
                </div>
              
                <div class="col-md-6 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">Nama Orang Tua</h6>
                            <p class="card-text">
                                <?= $data_balita->nama_ortu; ?>
                            </p>
                        </div>
                    </div>
                </div>
              
                <div class="col-md-6 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">NIK Balita</h6>
                            <p class="card-text">
                                <?= $data_balita->nik_balita; ?>
                            </p>
                        </div>
                    </div>
                </div>
              
                <div class="col-md-6 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">No KK</h6>
                            <p class="card-text">
                                <?= $data_balita->no_kk; ?>
                            </p>
                        </div>
                    </div>
                </div>
              
                <div class="col-md-6 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">NIK Orang Tua</h6>
                            <p class="card-text">
                                <?= $data_balita->nik_ortu; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">Alamat</h6>
                            <p class="card-text">
                                <?= $data_balita->rt; ?>
                            </p>
                            <p class="card-text">
                                <?= $data_balita->rw; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">RW</h6>
                            <p class="card-text">
                                <?= $data_balita->rw; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-info shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-black font-weight-bold">Umur</h6>
                            <p class="card-text">
                                <?= $data_balita->umur; ?> Tahun
                            </p>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <a href="/User/balita" class="card border-info shadow-sm h-100 btn btn-secondary mt-3"
                style="background-color: #ffff; border-color: #17a2b8; color: black;">
                <i class="fa fa-arrow-left"></i> Kembali ke Daftar Balita
            </a> -->

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
                                <th>Tanggal Pengecekan</th>
                                <th>Keterangan</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php
                                $pengecekan = $pengecekanModel->where('balita_id', $data_balita->id)->findAll();
foreach ($pengecekan as $p) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= date('d-m-Y', strtotime($p['tgl_pemeriksaan'])); ?>
                                </td>
                                <td><?= $p['rambu_gizi']; ?>
                                </td>
                                <td>
                                    <?= ($p['vitamin'] == $data_balita->lokasi) ? $p['vitamin'] : $p['vitamin'] . ' <i class="fa fa-arrow-right"></i> ' . $data_balita->lokasi; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection('page-content'); ?>