<?= $this->extend('User/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<?php

use App\Models\DataBalitaDetailModel;

$pengecekanModel = new DataBalitaDetailModel();
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <?php if (session()->has('pesanBerhasil')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session('pesanBerhasil') ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h3>Daftar Balita</h3>
                    <div>
                        <a href="<?php echo base_url('user/tambahBalita/'); ?>"
                            class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Balita
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%; text-align:center;">No</th>
                                    <th>Nama Balita</th>
                                    <th style="width: 10%; text-align:center;">Jenis Kelamin</th>
                                    <th style="width: 15%; text-align:center;">Tanggal Lahir</th>
                                    <th>Nama Orang Tua</th>
                                    <th>Nik Anak</th>
                                    <th style="width: 15%; text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%; text-align:center;">No</th>
                                    <th>Nama Balita</th>
                                    <th style="width: 10%; text-align:center;">Jenis Kelamin</th>
                                    <th style="width: 15%; text-align:center;">Tanggal Lahir</th>
                                    <th>Nama Orang Tua</th>
                                    <th>Nik Anak</th>
                                    <th style="width: 15%; text-align:center;">Aksi</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php if ($balita) { ?>
                                <?php
        $rule_cek = 1;
                                    $daynow = date('Y-m-d');
                                    foreach ($balita as $num => $data) {
                                        $pengecekan = $pengecekanModel->where('balita_id', $data['id'])->orderBy('id_detail', 'DESC')->first();
                                        ?>
                                <tr>
                                    <td style="text-align:center;">
                                        <?= $num + 1; ?>
                                    </td>
                                    <td><?= $data['nama']; ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <?= $data['jenis_kelamin']; ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <?= $data['tgl_lahir']; ?>
                                    </td>
                                    <td><?= $data['nama_ortu']; ?>
                                    </td>
                                    <td><?= $data['nik_balita']; ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <div class="d-flex justify-content-around">
                                            <?php if ($pengecekan) {
                                                $date1 = date_create($pengecekan['tgl_pemeriksaan']);
                                                $date2 = date_create($daynow);
                                                $diff = date_diff($date1, $date2);
                                                $hari = $diff->format("%a");
                                                if ($hari > $rule_cek) {
                                                    echo '<a href="' . site_url('/user/pengecekan/' . $data['id']) . '" class="btn btn-info mx-1"><i class="fa fa-stethoscope"></i></a>';
                                                } else {
                                                    echo '<a href="' . site_url('/user/detail_inv/' . $data['id']) . '" class="btn btn-primary mx-1"><i class="fa fa-eye"></i></a>';
                                                    echo '<a href="/user/ubah/' . $data['id'] . '" class="btn btn-warning mx-1"><i class="fa fa-edit"></i></a>';
                                                    echo '<a href="#" class="btn btn-danger btn-delete mx-1" data-toggle="modal" data-target="#modalKonfirmasiDelete" data-delete-url="' . site_url('/user/delete/' . $data['id']) . '"><i class="fa fa-trash"></i></a>';
                                                }
                                            } else {
                                                echo '<a href="' . site_url('/user/pengecekan/' . $data['id']) . '" class="btn btn-info mx-1"><i class="fa fa-stethoscope"></i></a>';
                                                echo '<a href="' . site_url('/user/detail_inv/' . $data['id']) . '" class="btn btn-primary mx-1"><i class="fa fa-eye"></i></a>';
                                                echo '<a href="/user/ubah/' . $data['id'] . '" class="btn btn-warning mx-1"><i class="fa fa-edit"></i></a>';
                                                echo '<a href="#" class="btn btn-danger btn-delete mx-1" data-toggle="modal" data-target="#modalKonfirmasiDelete" data-delete-url="' . site_url('/user/delete/' . $data['id']) . '"><i class="fa fa-trash"></i></a>';
                                            }
                                        ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php } else { ?>
                                <tr>
                                    <td colspan="7">
                                        <h3 class="text-gray-900 text-center">Data belum ada.</h3>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    });
</script>
<?= $this->endSection(); ?>