<?= $this->extend('User/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<?php

use App\Models\DataBalitaModel;

$pengecekanModel = new DataBalitaModel();

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
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Balita</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nama Orang Tua</th>
                                    <th>Posyandu</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Balita</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nama Orang Tua</th>
                                    <th>Posyandu</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </tfoot>
                         
                            <tbody>

                                <?php if ($balita) { ?>
                                <?php
                                    $rule_cek = 90;
                                    $daynow = date('Y-m-d');

                                    foreach ($balita as $index => $data) {
                                        $pengecekan = $pengecekanModel->where('id_detail', $data['id'])->orderBy('id_detail', 'DESC')->first();
                                        ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td style="text-align:center; width: 30px;">
                                        <?= $data['id']; ?>
                                    </td>
                                    <td><?= $data['nama']; ?>
                                    </td>
                                    <td><?= $data['jenis_kelamin']; ?>
                                    </td>
                                    <td><?= $data['nama_ortu']; ?>
                                    </td>
                               

                            
                                    <td style="text-align:center; width: 150px;">
                               
                                        <?php
                                                    if ($pengecekan) {
                                                        // hitung hari dari tanggal pengecekan sampai saatini
                                                        $date1 = date_create($pengecekan['tgl']);
                                                        $date2 = date_create($daynow);
                                                        $diff = date_diff($date1, $date2);
                                                        $hari = $diff->format("%a");
                                                        if ($hari > $rule_cek) {
                                                            echo '<a href="' . site_url('/Admin/pengecekan/' . $data['id']) . '" class="  btn btn-danger"><i class="fa fa-exclamation-triangle"></i> </a>';
                                                        } else {
                                                            // masukan button diatas
                                                            echo '<a href="' . site_url('/Admin/detail_inv/' . $data['id']) . '" class="  btn btn-primary"><i class="fa fa-eye"></i> </a>';
                                                            echo '<a href="/Admin/ubah/' . $data['id'] . '" class="  btn btn-warning"><i class="fa fa-edit"></i> </a>';
                                                            echo '<a href="#" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modalKonfirmasiDelete" data-delete-url="' . site_url('/Admin/delete/' . $data['id']) . '"><i class="fa fa-trash"></i></a>';
                                                        }
                                                    } else {
                                                        echo '<a href="' . site_url('/Admin/detail_inv/' . $data['id']) . '" class="  btn btn-primary"><i class="fa fa-eye"></i> </a>';
                                                        echo '<a href="/Admin/ubah/' . $data['id'] . '" class="  btn btn-warning"><i class="fa fa-edit"></i> </a>';
                                                        echo '<a href="#" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modalKonfirmasiDelete" data-delete-url="' . site_url('/Admin/delete/' . $data['id']) . '"><i class="fa fa-trash"></i></a>';
                                                    }
                                        ?>
                                    </td>
                                </tr>
                                <?php } ?>
                                <!-- end of foreach                -->
                                <?php } else { ?>
                                <tr>
                                    <td colspan="4">
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