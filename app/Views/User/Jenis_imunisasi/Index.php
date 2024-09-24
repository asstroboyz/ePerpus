<?= $this->extend('Admin/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Jenis Imunisasi</h1>

    <?php if (session()->has('pesanBerhasil')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('pesanBerhasil'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('Admin/tambahJenisImun'); ?>" class="btn btn-primary">Tambah Jenis Imunisasi</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Usia Anak</th>
                        <th>Jenis Imunisasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jenis_imunisasi as $index => $data) : ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= esc($data['usia_anak']); ?></td>
                            <td><?= esc($data['jenis_imunisasi']); ?></td>
                            <td>
                                <a href="<?= base_url('Admin/editJenisImun/' . $data['id']); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?= base_url('Admin/deleteJenisImun/' . $data['id']); ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
