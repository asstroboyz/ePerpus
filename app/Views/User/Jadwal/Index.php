<?= $this->extend('user/Templates/Index'); ?>

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
            <a href="<?= base_url('user/tambahJadwalPosyandu'); ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Jadwal
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Posyandu</th>
                            <th>Alamat</th>
                            <th>Kader Posyandu</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($jadwal)): ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada jadwal yang tersedia.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($jadwal as $index => $data) : ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td><?= esc($data['nama_posyandu']); ?></td>
                                    <td><?= esc($data['alamat_posyandu']); ?></td>
                                    <td><?= esc($data['username']); ?></td>
                                    <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                                    <td><?= date('H:i', strtotime($data['jam'])); ?> WIB</td>
                                    <td>
                                        <a href="<?= base_url('Admin/editJadwalPosyandu/' . $data['id']); ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="<?= base_url('Admin/deleteJadwalPosyandu/' . $data['id']); ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jadwal Posyandu ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
