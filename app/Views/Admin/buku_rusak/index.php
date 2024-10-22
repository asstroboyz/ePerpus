<?= $this->extend('admin/layout/index'); ?>


<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('pesan_tambah')) : ?>
    <div class="alert alert-success my-2 text-center" role="alert">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('pesan_tambah'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('pesan_hapus')) : ?>
    <div class="alert alert-danger my-2 text-center" role="alert">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('pesan_hapus'); ?>
    </div>
<?php endif; ?>

<div class="card mb-4">
    <div class="card-header">

        <div class="row align-items-center">
            <div class="col-md-6 ">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6 d-flex justify-content-end gap-2">
                <a href="<?= base_url('cetakdatabukurusak'); ?>" class="btn btn-success float-end "><i class="fas fa-print me-1"></i>Print</a>
                <a href="<?= base_url('user/tambahbukuRusak'); ?>" class="btn btn-primary float-end "><i class="fas fa-plus-square me-1"></i>Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Kode Buku Rusak</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Tempat Terbit</th>
                    <th>Jumlah Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Kode Buku Rusak</th>
                    <th>Kode Buku</th>
                    <th>Judul Bukui</th>
                    <th>Pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Tempat Terbit</th>
                    <th>Jumlah Buku</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($bukurusak as $data) : ?>
                    <tr>
                        <td><?= $data['kode_buku_rusak']; ?></td>
                        <td><?= $data['kode_buku']; ?></td>
                        <td><?= $data['judul_buku']; ?></td>
                        <td><?= $data['pengarang']; ?></td>
                        <td><?= $data['tahun_terbit']; ?></td>
                        <td><?= $data['tempat_terbit']; ?></td>
                        <td><?= $data['jumlah_buku_rusak']; ?></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="<?= base_url('user/editBukuRusak/' . $data['kode_buku_rusak']); ?>" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i></a>
                                <form action="<?= base_url('hapusdatabukurusak/' . $data['kode_buku']); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>