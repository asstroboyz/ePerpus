<?= $this->extend('User/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<?php

use App\Models\DataBalitaDetailModel;

$pengecekanModel = new DataBalitaDetailModel();
?>

<div class="container-fluid">
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
                    <div class="btn-group">
                        <!-- Tombol Tambah Balita -->

                        <a href="<?php echo base_url('User/tambahBalita/'); ?>" class="btn btn-primary mr-1" style="background-color: #17a2b8; border-color: #17a2b8; color: black;"
                            onmouseover="this.style.backgroundColor='#17a2b8'; this.style.color='white';"
                            onmouseout="this.style.backgroundColor='#17a2b8'; this.style.color='black';"
                            onmousedown="this.style.backgroundColor='#17a2b8'; this.style.color='white';"
                            onmouseup="this.style.backgroundColor='#17a2b8'; this.style.color='white';">
                            <i class="fa fa-plus"></i> Tambah Balita
                        </a>
                        <!-- Tombol Arsip Balita -->
                        <a href="<?= base_url('user/arsipBalita/'); ?>" class="btn btn-secondary">
                            <i class="fa fa-archive"></i> Arsip Balita
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead">
                                <tr>
                                    <th style="text-align:center; width: 5%;">No</th>
                                    <th style="text-align:left; width: 30%;">Nama Balita</th>
                                    <th style="text-align:center; width: 10%;">Jenis Kelamin</th>
                                    <th style="text-align:center; width: 15%;">Tanggal Lahir</th>
                                    <th style="text-align:center; width: 15%; ">Umur Saat Ini</th>

                                    <th style="text-align:left; width: 25%;">Nama Orang Tua</th>
                                    <th style="text-align:center; width: 20%;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if ($balita) : ?>
                                    <?php foreach ($balita as $num => $data) : ?>
                                        <tr>
                                            <td style="text-align:center;"><?= $num + 1; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td style="text-align:center;"><?= ($data['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan'; ?></td>
                                            <td style="text-align:center;"><?= date('d-m-Y', strtotime($data['tgl_lahir'])); ?></td>
                                            <td style="text-align:center; font-size: 1rem;">
                                                <?php
                                                $tanggalLahir = $data['tgl_lahir'];
                                                $birthDate = new DateTime($tanggalLahir);
                                                $today = new DateTime("today");
                                                $diff = $birthDate->diff($today);
                                                echo $diff->y . " tahun, " . $diff->m . " bulan, " . $diff->d . " hari";
                                                ?>
                                            </td>
                                            <td><?= $data['nama_ortu']; ?></td>
                                            <!-- <td><?= $data['nik_balita']; ?></td> -->
                                            <td style="text-align:center;">
                                                <div class="btn-group" role="group">
                                                    <?php if (user()->posisi === 'bidan'): ?>
                                                    <?php endif; ?>

                                                    <a href="<?= site_url('/user/pengecekan/' . $data['id']); ?>" class="btn btn-info btn-sm mx-1">
                                                        <i class="fa fa-stethoscope"></i>
                                                    </a>

                                                    <a href="<?= site_url('/user/detail_balita/' . $data['id']); ?>" class="btn btn-primary btn-sm mx-1">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="/user/editBalita/<?= $data['id']; ?>" class="btn btn-warning btn-sm mx-1">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <!-- <a href="#" class="btn btn-secondary btn-sm mx-1 btn-delete" data-toggle="modal" data-target="#modalKonfirmasiDelete" data-delete-url="<?= site_url('/user/deleteBalita/' . $data['id']); ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </a> -->
                                                    <a href="#" class="btn btn-danger btn-sm mx-1" data-toggle="modal" data-target="#modalKonfirmasiBanned" data-id="<?= $data['id'] ?>">
                                                        <i class="fa fa-ban"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Data belum ada.</td>
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

<!-- Modal Konfirmasi Banned -->
<div class="modal fade" id="modalKonfirmasiBanned" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Nonaktifkan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menonaktifkan data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a id="deleteLink" href="#" class="btn btn-danger">Nonaktifkan</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    // Fungsi untuk menampilkan modal dan set URL hapus
    $('#modalKonfirmasiBanned').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $('#deleteLink').attr('href', '<?= base_url("/user/softDelete/") ?>' + '/' + id);
    });

    // Efek alert fade out setelah 3 detik
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });

    // Fade out untuk alert setelah 7 detik
    setTimeout(function() {
        $('.alert.alert-danger').fadeOut('slow');
    }, 7000);
</script>
<?= $this->endSection(); ?>