<?= $this->extend('admin/layout/index'); ?>

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
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">NIS</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">Tanggal Kunjungan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">NIS</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">Tanggal Kunjungan</th>
                    <th class="text-center">Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php if ($kunjungan) : ?>
                    <?php foreach ($kunjungan as $index => $data) : ?>
                        <tr>
                            <td class="text-center"><?= $index + 1; ?></td>
                            <td class="text-center"><?= $data['fullname']; ?></td>
                            <td class="text-center"><?= $data['nis']; ?></td>
                            <td class="text-center"><?= $data['kelas']; ?></td>
                            <td class="text-center"><?= $data['alamat']; ?></td>
                            <td class="text-center"><?= $data['no_hp']; ?></td>
                            <td class="text-center">
                                <?php
                                // Memeriksa apakah tanggal_kunjungan ada dan tidak kosong
                                if (!empty($data['tanggal_kunjungan'])) {
                                    $tanggal = new DateTime($data['tanggal_kunjungan']);
                                    echo $tanggal->format('d') . ' ' . $tanggal->format('F') . ' ' . $tanggal->format('Y');
                                } else {
                                    echo 'Tanggal tidak tersedia'; // Atau bisa menampilkan pesan lain
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="<?= base_url('user/editKunjungan/' . $data['id_kunjungan']); ?>" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i></a>
                                    <form action="<?= base_url('user/hapusdatakunjungan/' . $data['id_kunjungan']); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data kunjungan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

</div>

<?= $this->endSection(); ?>