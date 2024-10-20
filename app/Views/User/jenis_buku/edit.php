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
                <a href="<?= base_url('User/JenisBuku'); ?>" class="btn btn-sm btn-secondary float-end">
                    <i class="fas fa-arrow-circle-left me-1"></i>Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session(); ?>
        <form action="<?= base_url('user/updatedatabuku/' . $kode_buku); ?>" method="post">
        <?= csrf_field(); ?> 
        <div class="mb-3">
                <label for="kode_buku">Kode Buku</label>
                <input class="form-control <?= $session->getFlashdata('pesan_error') ? 'is-invalid' : ''; ?>"
                       id="kode_buku" name="kode_buku" type="text" required
                       value="<?= $dataBuku['kode_buku']; ?>" disabled>
                <div class="invalid-feedback">
                    <?php if ($session->getFlashdata('pesan_error')) : ?>
                        <?= $session->getFlashdata('pesan_error'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="judul_buku">Judul Buku</label>
                <input class="form-control" id="judul_buku" name="judul_buku" type="text" required
                       value="<?= $dataBuku['judul_buku']; ?>">
            </div>
            <div class="mb-3">
                <label for="pengarang">Pengarang</label>
                <input class="form-control" id="pengarang" name="pengarang" type="text" required
                       value="<?= $dataBuku['pengarang']; ?>">
            </div>
            <div class="mb-3">
                <label for="penerbit">Penerbit</label>
                <input class="form-control" id="penerbit" name="penerbit" type="text" required
                       value="<?= $dataBuku['penerbit']; ?>">
            </div>
            <div class="mb-3">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input class="form-control" id="tahun_terbit" name="tahun_terbit" type="number" min="1900" max="2099"
                       step="1" required value="<?= $dataBuku['tahun_terbit']; ?>">
            </div>
            <div class="mb-3">
                <label for="tempat_terbit">Tempat Terbit</label>
                <input class="form-control" id="tempat_terbit" name="tempat_terbit" type="text" required
                       value="<?= $dataBuku['tempat_terbit']; ?>">
            </div>
            <div class="mb-3">
                <label for="jumlah_buku">Jumlah Buku</label>
                <input class="form-control" id="jumlah_buku" name="jumlah_buku" type="number" required
                       value="<?= $dataBuku['jumlah_buku']; ?>">
            </div>
            <div class="mb-3">
                <label for="isbn">ISBN</label>
                <input class="form-control" id="isbn" name="isbn" type="text" required
                       value="<?= $dataBuku['isbn']; ?>">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
