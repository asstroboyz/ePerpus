<?= $this->extend('Admin/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Hadir Imunisasi</h1>

    <?php if (session()->has('pesanBerhasil')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('pesanBerhasil'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('Admin/tambahDaftarHadir'); ?>" class="btn btn-primary">Tambah Daftar Hadir</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Jadwal Imunisasi</th>
                        <th>Status Kehadiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftar_hadir as $index => $data) : ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= esc($data['nama_peserta']); ?></td>
                            <td><?= esc($data['jadwal_imunisasi']); // Misalnya, nama jadwal imunisasi ?></td>
                            <td><?= esc($data['status_kehadiran']); ?></td>
                            <td>
                                <a href="<?= base_url('Admin/editDaftarHadir/' . $data['id']); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?= base_url('Admin/deleteDaftarHadir/' . $data['id']); ?>" method="post" class="d-inline">
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
