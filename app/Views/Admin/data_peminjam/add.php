<?= $this->extend('admin/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="card mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6 ">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6 ">
                <a href="<?= base_url('user/peminjam'); ?>" class="btn btn-sm btn-secondary float-end ">
                    <i class="fas fa-arrow-circle-left me-1"></i>Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session(); ?>

        
        <form action="<?= base_url('user/savePeminjam'); ?>" method="post">
        <?= csrf_field(); ?>
            <!-- NIS -->
            <div class="mb-3">
                <label for="nis">NIS</label>
                <input class="form-control <?= $session->getFlashdata('pesan_error') ? 'is-invalid' : ''; ?>" 
                       id="nis" name="nis" type="text" required value="<?= old('nis'); ?>"
                       oninvalid="this.setCustomValidity('NIS Tidak Boleh Kosong')" oninput="this.setCustomValidity('')">
                <div class="invalid-feedback">
                    <?= $session->getFlashdata('pesan_error') ?: ''; ?>
                </div>
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input class="form-control" id="nama" name="nama" type="text" required
                       oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong')" oninput="this.setCustomValidity('')" 
                       value="<?= old('nama'); ?>">
            </div>

            <!-- Kelas -->
            <div class="mb-3">
                <label for="kelas">Kelas</label>
                <select class="form-control" id="kelas" name="kelas" required
                        oninvalid="this.setCustomValidity('Kelas Tidak Boleh Kosong')" oninput="this.setCustomValidity('')">
                    <option value="">--Pilih Kelas--</option>
                    <?php foreach (['7a', '7b', '7c', '7d', '7e', '7f', '7g', '8a', '8b', '8c', '8d', '8e', '8f', '8g', '9a', '9b', '9c', '9d', '9e', '9f', '9g'] as $kelas): ?>
                        <option value="<?= $kelas; ?>" <?= old('kelas') == $kelas ? 'selected' : ''; ?>>
                            <?= $kelas; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required
                        oninvalid="this.setCustomValidity('Jenis Kelamin Tidak Boleh Kosong')" oninput="this.setCustomValidity('')">
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki" <?= old('jenis_kelamin') === 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?= old('jenis_kelamin') === 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required
                          oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"><?= old('alamat'); ?></textarea>
            </div>

            <!-- No HP -->
            <div class="mb-3">
                <label for="no_hp">No. HP</label>
                <input class="form-control" id="no_hp" name="no_hp" type="text" required
                       oninvalid="this.setCustomValidity('No.HP Tidak Boleh Kosong')" oninput="this.setCustomValidity('')" 
                       value="<?= old('no_hp'); ?>">
            </div>

            <!-- Tombol Simpan -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
