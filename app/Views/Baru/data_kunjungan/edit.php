<?= $this->extend('baru/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="card mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6 ">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6 ">
                <a href="<?= base_url('user/Kunjungan'); ?>"
                   class="btn btn-sm btn-secondary float-end "><i class="fas fa-arrow-circle-left me-1"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session(); ?>
        <form action="<?= base_url('user/updateDataKunjungan/' . $kunjungan['id_kunjungan']); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="nama">Nama</label>
                <input class="form-control <?= isset($validation) && $validation->hasError('nama') ? 'is-invalid' : ''; ?>"
                       id="nama" name="nama" type="text"
                       value="<?= old('nama', $kunjungan['nama']); ?>"
                       oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"
                       required>
                <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('nama') : ''; ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="keanggotaan">Keanggotaan</label>
                <select class="form-control <?= isset($validation) && $validation->hasError('keanggotaan') ? 'is-invalid' : ''; ?>"
                        id="keanggotaan" name="keanggotaan"
                        oninvalid="this.setCustomValidity('Keanggotaan Tidak Boleh Kosong')"
                        oninput="this.setCustomValidity('')" required>
                    <option value="">--Pilih Keanggotaan--</option>
                    <option value="Guru" <?= old('keanggotaan', $kunjungan['keanggotaan']) === 'Guru' ? 'selected' : ''; ?>>Guru
                    </option>
                    <option value="Siswa" <?= old('keanggotaan', $kunjungan['keanggotaan']) === 'Siswa' ? 'selected' : ''; ?>>Siswa
                    </option>
                </select>
                <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('keanggotaan') : ''; ?>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
