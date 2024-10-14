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
                <a href="<?= base_url('databuku'); ?>"
                    class="btn btn-sm btn-secondary float-end "><i class="fas fa-arrow-circle-left me-1"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session() ?>
        <form action="/updatedatabuku/<?= $buku->kode_buku; ?>"
            method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1">Kode Buku</label>
                <input
                    class="form-control <?= $session->getFlashdata('pesan_error') ? 'is-invalid' : ''; ?>"
                    id="kode_buku" name="kode_buku" type="text"
                    oninvalid="this.setCustomValidity('Kode Buku Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required
                    value="<?= $buku->kode_buku; ?>" disabled>
                <div class="invalid-feedback">
                    <?php if ($session->getFlashdata('pesan_error')) : ?>
                    <?= $session->getFlashdata('pesan_error'); ?>
                    <?php endif ?>


                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Judul Buku</label>
                <input class="form-control" id="judul" name="judul" type="text"
                    oninvalid="this.setCustomValidity('Judul Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"
                    required value="<?= $buku->judul_buku; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Pengarang</label>
                <input class="form-control" id="pengarang" name="pengarang" type="text"
                    oninvalid="this.setCustomValidity('Pengarang Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required
                    value="<?= $buku->pengarang; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Penerbit</label>
                <input class="form-control" id="penerbit" name="penerbit" type="text"
                    oninvalid="this.setCustomValidity('Penerbit Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required
                    value="<?= old('pengarang'); ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Tahun Terbit</label>
                <input class="form-control" id="tahun_terbit" name="tahun_terbit" type="number" min="1900" max="2099"
                    step="1" oninvalid="this.setCustomValidity('Tahun Terbit Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required
                    value="<?= $buku->tahun_terbit; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Tempat Terbit</label>
                <input class="form-control" id="tempat_terbit" name="tempat_terbit" type="text"
                    oninvalid="this.setCustomValidity('Tempat Terbit Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required
                    value="<?= $buku->tempat_terbit; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Jumlah Buku</label>
                <input class="form-control" id="jumlah_buku" name="jumlah_buku" type="number"
                    oninvalid="this.setCustomValidity('Jumlah Buku Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required
                    value="<?= $buku->jumlah_buku; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Isbn</label>
                <input class="form-control" id="isbn" name="isbn" type="number"
                    oninvalid="this.setCustomValidity('isbn Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"
                    required value="<?= $buku->jumlah_buku; ?>">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>