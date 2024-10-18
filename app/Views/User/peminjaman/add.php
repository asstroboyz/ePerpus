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
                <a href="<?= base_url('datapeminjaman'); ?>" class="btn btn-sm btn-secondary float-end "><i class="fas fa-arrow-circle-left me-1"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session() ?>
        <form action="simpandatapeminjaman" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1">Nomor Buku</label>
                <input class="form-control " id="nomor" name="nomor" type="text" oninvalid="this.setCustomValidity('Nomor Buku harus diisi Tidak Boleh Kosong')" oninput="this.setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Pilih Buku</label>
                <select class="form-control selectpicker <?= $session->getFlashdata('pesan_pinjam') ? 'is-invalid' : ''; ?>" id="buku" name="buku" oninvalid="this.setCustomValidity('Buku Tidak Boleh Kosong')" oninput="this.setCustomValidity('')" required data-live-search="true">

                    <option value="">--Pilih Buku--</option>
                    <?php foreach ($buku as $row) : ?>
                        <option value="<?= $row['kode_buku']; ?>" <?php if (old('buku') == $row['kode_buku']) echo 'selected'; ?>><?= $row['kode_buku']; ?> - <?= $row['judul_buku']; ?></option>

                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?php if ($session->getFlashdata('pesan_pinjam')) : ?>
                        <?= $session->getFlashdata('pesan_pinjam'); ?>
                    <?php endif ?>


                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Pilih Siswa</label>
                <select class="form-control selectpicker" data-live-search="true" id="siswa" name="siswa" oninvalid="this.setCustomValidity('Siswa Tidak Boleh Kosong')" oninput="this.setCustomValidity('')" required>
                    <option value="">--Pilih Siswa--</option>
                    <?php foreach ($siswa as $row) : ?>
                        <option value="<?= $row['id']; ?>" <?php if (old('siswa') == $row['id']) echo 'selected'; ?>><?= $row['id']; ?> - <?= $row['nama']; ?> - Kelas <?= $row['kelas']; ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Tanggal Pinjam</label>
                <input class="form-control <?= $session->getFlashdata('pesan_error_kd_rusak') ? 'is-invalid' : ''; ?>" id="tanggal_pinjam" name="tanggal_pinjam" type="date" value="<?php echo date('Y-m-d'); ?>" oninvalid="this.setCustomValidity('Tanggal Pinjam harus diisi Tidak Boleh Kosong')" oninput="this.setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Tanggal Kembali</label>
                <input class="form-control <?= $session->getFlashdata('pesan_error_kd_rusak') ? 'is-invalid' : ''; ?>" id="tanggal_kembali" name="tanggal_kembali" type="date" oninvalid="this.setCustomValidity('Tanggal Kembali harus diisi Tidak Boleh Kosong')" oninput="this.setCustomValidity('')" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Jumlah Pinjam</label>
                <input class="form-control " id="jumlah" name="jumlah" type="number" value="<?php echo date('Y-m-d'); ?>" oninvalid="this.setCustomValidity('Nomor Buku harus diisi Tidak Boleh Kosong')" oninput="this.setCustomValidity('')">
            </div>
            <div class="mb-3">
    <label for="exampleFormControlSelect1">Kondisi Buku</label>
    <select class="form-control" id="kondisi_buku" name="kondisi_buku" oninvalid="this.setCustomValidity('Kondisi_BukuTidak Boleh Kosong')" oninput="this.setCustomValidity('')" required>
        <option value="">--Pilih Kondisi Buku--</option>
        <option value="Baik" <?= old('baik') === 'baik' ? 'selected' : ''; ?>>Baik</option>
        <option value="Rusak" <?= old('rusak') === 'rusak' ? 'selected' : ''; ?>>Rusak</option>
    </select>
</div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>