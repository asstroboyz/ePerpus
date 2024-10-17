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
        <form
            action="/updatedatabukurusak/<?= $bukurusak->kode_buku_rusak; ?>"
            method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1">Kode Buku Rusak</label>
                <input
                    class="form-control <?= $session->getFlashdata('pesan_error_kd_rusak') ? 'is-invalid' : ''; ?>"
                    id="kode_buku_rusak" name="kode_buku_rusak" type="text"
                    oninvalid="this.setCustomValidity('Kode Buku Rusak Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required
                    value="<?= $bukurusak->kode_buku_rusak; ?>">
                <div class="invalid-feedback">
                    <?php if ($session->getFlashdata('pesan_error_kd_rusak')) : ?>
                    <?= $session->getFlashdata('pesan_error_kd_rusak'); ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Pilih Buku</label>
                <select
                    class="form-control <?= $session->getFlashdata('pesan_error_kd_buku') ? 'is-invalid' : ''; ?>"
                    id="buku" name="buku" oninvalid="this.setCustomValidity('Bukurr Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required>
                    <option value="">--Pilih Buku--</option>
                    <?php foreach ($buku as $row) : ?>
                    <option
                        value="<?= $row['kode_buku']; ?>"
                        <?php if ($bukurusak->kode_buku == $row['kode_buku']) {
                            echo 'selected';
                        } ?>><?= $row['kode_buku']; ?>
                        -
                        <?= $row['judul_buku']; ?>
                    </option>

                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?php if ($session->getFlashdata('pesan_error_kd_buku')) : ?>
                    <?= $session->getFlashdata('pesan_error_kd_buku'); ?>
                    <?php endif ?>
                </div>

            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Jumlah Buku</label>
                <input class="form-control" id="jumlah_buku" name="jumlah_buku" type="number"
                    oninvalid="this.setCustomValidity('Jumlah Buku Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required
                    value="<?= $bukurusak->jumlah_buku_rusak; ?>">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>