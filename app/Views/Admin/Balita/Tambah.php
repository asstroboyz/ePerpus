<?= $this->extend('Admin/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <h3 class="h3 mb-4 text-gray-800">Tambah Data Balita</h3>

    <?php if (session()->has('pesanError')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session('pesanError') ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-8">
            <form action="<?= base_url('Admin/saveBalita'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama">Nama Balita</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_ortu">Nama Orang Tua</label>
                    <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="<?= old('nama_ortu'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="posyandu_id">Posyandu</label>
                    <select class="form-control" id="posyandu_id" name="posyandu_id" required>
                        <option value="">Pilih Posyandu</option>
                        <?php foreach ($posyandus as $p) : ?>
                            <option value="<?= $p['id']; ?>" <?= old('posyandu_id') == $p['id'] ? 'selected' : ''; ?>><?= $p['nama_posyandu']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
