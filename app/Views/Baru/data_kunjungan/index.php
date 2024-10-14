<?= $this->extend('baru/layout/index'); ?>

<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('pesan_tambah')) : ?>
<div class="alert alert-success my-2 text-center" role="alert">
    <i class="fas fa-check-circle"></i>
    <?= session()->getFlashdata('pesan_tambah'); ?>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('pesan_hapus')) : ?>
<div class="alert alert-danger my-2 text-center" role="alert">
    <i class="fas fa-times-circle"></i>
    <?= session()->getFlashdata('pesan_hapus'); ?>
</div>
<?php endif; ?>

<div class="card mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6 ">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6 ">
                <a href="<?= base_url('user/tambahkunjungan'); ?>"
                   class="btn btn-sm btn-primary float-end "><i class="fas fa-plus-square me-1"></i>Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">ID Kunjungan</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Keanggotaan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="text-center">ID Kunjungan</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Keanggotaan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </tfoot>
            <tbody> 
                <?php if ($kunjungan) : ?>
                    <?php foreach ($kunjungan as $index => $data) : ?>
                    <tr>
                        <td class="text-center"><?= $index + 1; ?></td>
                        <td class="text-center"><?= $data['nama']; ?></td>
                        <td class="text-center"><?= $data['keanggotaan']; ?></td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="<?= base_url('user/editKunjungan/' . $data['id_kunjungan']); ?>"
                                   class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i></a>
                                <form action="<?= base_url('user/hapusdatakunjungan/' . $data['id_kunjungan']); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data kunjungan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>
