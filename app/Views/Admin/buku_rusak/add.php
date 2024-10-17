<?= $this->extend('user/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="card mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6 ">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6 ">
                <a href="<?= base_url('databukurusak'); ?>"
                    class="btn btn-sm btn-secondary float-end "><i class="fas fa-arrow-circle-left me-1"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session() ?>
      
        <form action="<?= base_url('user/saveBukurusak'); ?>" method="post">
        <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="kode_buku_rusak">Kode Buku Rusak</label>
                <select
                    class="form-control <?= $session->getFlashdata('pesan_error_kd_rusak') ? 'is-invalid' : ''; ?>"
                    id="kode_buku_rusak" name="kode_buku_rusak"
                    oninvalid="this.setCustomValidity('Kode Buku Rusak Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required>

                    <option value="">-- Pilih Kode Buku --</option>
                    <?php foreach ($buku as $item): ?>
                        <option value="<?= $item['kode_buku']; ?>" <?= old('kode_buku_rusak') == $item['kode_buku'] ? 'selected' : ''; ?>>
                            <?= $item['kode_buku']; ?> - <?= $item['judul_buku']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

        
               
                <div class="invalid-feedback">
                    <?php if ($session->getFlashdata('pesan_error_kd_rusak')): ?>
                        <?= $session->getFlashdata('pesan_error_kd_rusak'); ?>
                    <?php endif ?>
                </div>
            </div>

       
            <div class="mb-3">
                <label for="exampleFormControlInput1">Jumlah Buku</label>
                <input class="form-control" id="jumlah_buku" name="jumlah_buku" type="number"
                    oninvalid="this.setCustomValidity('Jumlah Buku Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required
                    value="<?= old('jumlah_buku'); ?>">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>