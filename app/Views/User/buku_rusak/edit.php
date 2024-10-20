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
                <a href="<?= base_url('databukurusak'); ?>"
                    class="btn btn-sm btn-secondary float-end">
                    <i class="fas fa-arrow-circle-left me-1"></i>Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session(); ?>


        <form
            action="<?= base_url('user/updateBukurusak/' . $bukurusak['kode_buku_rusak']); ?>"
            method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="kode_buku_rusak">Kode Buku Rusak</label>
                <input
                    class="form-control <?= $session->getFlashdata('pesan_error_kd_rusak') ? 'is-invalid' : ''; ?>"
                    id="kode_buku_rusak" name="kode_buku_rusak" type="text"
                    value="<?= old('kode_buku_rusak', $bukurusak['kode_buku_rusak']); ?>"
                    required oninvalid="this.setCustomValidity('Kode Buku Rusak Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')">
                <div class="invalid-feedback">
                    <?= $session->getFlashdata('pesan_error_kd_rusak') ?? ''; ?>
                </div>
            </div>

            <!-- Pilih Buku -->
            <div class="mb-3">
                <label for="buku">Pilih Buku</label>
                <select
                    class="form-control <?= $session->getFlashdata('pesan_error_kd_buku') ? 'is-invalid' : ''; ?>"
                    id="buku" name="kode_buku" required oninvalid="this.setCustomValidity('Buku Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')">
                    <option value="">--Pilih Buku--</option>
                    <?php foreach ($buku as $row) : ?>
                    <option
                        value="<?= $row['kode_buku']; ?>"
                        <?= ($bukurusak['kode_buku'] == $row['kode_buku']) ? 'selected' : ''; ?>>
                        <?= $row['kode_buku']; ?>
                        -
                        <?= $row['judul_buku']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $session->getFlashdata('pesan_error_kd_buku') ?? ''; ?>
                </div>
            </div>

            <!-- Jumlah Buku -->
            <div class="mb-3">
                <label for="jumlah_buku">Jumlah Buku</label>
                <input class="form-control" id="jumlah_buku" name="jumlah_buku_rusak" type="number" required
                    value="<?= old('jumlah_buku', $bukurusak['jumlah_buku_rusak']); ?>"
                    oninvalid="this.setCustomValidity('Jumlah Buku Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')">
            </div>

            <!-- Tombol Simpan -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>