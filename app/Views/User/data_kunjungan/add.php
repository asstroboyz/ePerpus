<?= $this->extend('user/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="card mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url('user/kunjungan'); ?>"
                   class="btn btn-sm btn-secondary float-end">
                   <i class="fas fa-arrow-circle-left me-1"></i>Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?> <!-- Mendapatkan instance validasi -->

        <!-- Jika ada error validasi -->
        <?php if ($validation->getErrors()): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?> <!-- Menampilkan semua error -->
            </div>
        <?php endif; ?>

        <form action="<?= base_url('user/saveKunjungan'); ?>" method="post">
            <?= csrf_field(); ?> <!-- CSRF protection -->
            
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" 
                       id="nama" 
                       name="nama" 
                       type="text" 
                       value="<?= old('nama'); ?>" 
                       required>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?> <!-- Menampilkan error khusus untuk nama -->
                </div>
            </div>

            <div class="mb-3">
                <label for="keanggotaan">Keanggotaan</label>
                <select class="form-control <?= ($validation->hasError('keanggotaan')) ? 'is-invalid' : ''; ?>" 
                        id="keanggotaan" 
                        name="keanggotaan" 
                        required>
                    <option value="">--Pilih Kelas--</option>
                    <option value="Guru" <?= old('keanggotaan') === 'Guru' ? 'selected' : ''; ?>>Guru</option>
                    <option value="Siswa" <?= old('keanggotaan') === 'Siswa' ? 'selected' : ''; ?>>Siswa</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('keanggotaan'); ?> <!-- Menampilkan error khusus untuk keanggotaan -->
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
