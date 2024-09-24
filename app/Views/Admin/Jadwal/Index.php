<?= $this->extend('Admin/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Jadwal Posyandu</h1>

    <?php if (session()->has('pesanBerhasil')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('pesanBerhasil'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('Admin/tambahJadwalPosyandu'); ?>" class="btn btn-primary">Tambah Jadwal</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Posyandu</th>
                        <th>Alamat</th>
                        <th>Kader Posyandu</th>
                        <th>Bidan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jadwal as $index => $data) : ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= esc($data['nama_posyandu']); ?></td>
                            <td><?= esc($data['alamat_posyandu']); ?></td>
                            <td><?= esc($data['kader_posyandu']); ?></td>
                            <td><?= esc($data['bidan']); ?></td>
                            <td><?= esc($data['tanggal']); ?></td>
                            <td><?= esc($data['jam']); ?></td>
                            <td>
                                <a href="<?= base_url('Admin/editJadwalPosyandu/' . $data['id']); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?= base_url('Admin/deleteJadwalPosyandu/' . $data['id']); ?>" method="post" class="d-inline">
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
