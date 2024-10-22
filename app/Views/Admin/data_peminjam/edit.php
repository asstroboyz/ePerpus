<?= $this->extend('admin/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="card mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url('datapeminjam'); ?>" class="btn btn-sm btn-secondary float-end">
                    <i class="fas fa-arrow-circle-left me-1"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <!-- Display session flash message if present -->
        <?php if (session()->getFlashData('pesan_tambah')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashData('pesan_tambah'); ?>
            </div>
        <?php endif; ?>

        <!-- Begin form -->
        <form action="/user/updateDataPeminjam/<?= $peminjam['id']; ?>" method="post">
            <?= csrf_field(); ?>

            <!-- Nama field -->
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" type="text" required value="<?= old('nama', $peminjam['nama']); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>

            <!-- Kelas field -->
            <div class="mb-3">
                <label for="kelas">Kelas</label>
                <select class="form-control <?= $validation->hasError('kelas') ? 'is-invalid' : ''; ?>" id="kelas" name="kelas" required>
                    <option value="">--Pilih Kelas--</option>
                    <?php foreach (['7a', '7b', '7c', '7d', '7e', '7f', '7g', '8a', '8b', '8c', '8d', '8e', '8f', '8g', '9a', '9b', '9c', '9d', '9e', '9f', '9g'] as $kelas): ?>
                        <option value="<?= $kelas; ?>" <?= old('kelas', $peminjam['kelas']) == $kelas ? 'selected' : ''; ?>><?= $kelas; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('kelas'); ?>
                </div>
            </div>

            <!-- Jenis Kelamin field -->
            <div class="mb-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control <?= $validation->hasError('jenis_kelamin') ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki" <?= old('jenis_kelamin', $peminjam['jenis_kelamin']) === 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?= old('jenis_kelamin', $peminjam['jenis_kelamin']) === 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('jenis_kelamin'); ?>
                </div>
            </div>

            <!-- Alamat field -->
            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" rows="3" required><?= old('alamat', $peminjam['alamat']); ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>

            <!-- No. HP field -->
            <div class="mb-3">
                <label for="no_hp">No. HP</label>
                <input class="form-control <?= $validation->hasError('no_hp') ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" type="text" required value="<?= old('no_hp', $peminjam['no_hp']); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('no_hp'); ?>
                </div>
            </div>

            <!-- Submit button -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
