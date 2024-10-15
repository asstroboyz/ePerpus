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
                <a href="<?= base_url('databuku'); ?>"
                    class="btn btn-sm btn-secondary float-end "><i class="fas fa-arrow-circle-left me-1"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session() ?>

        <form action="<?= base_url('user/saveJenisBuku'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label for="kode_buku">Kode Buku</label>
                <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="<?= old('kode_buku'); ?>" required>
            </div>

            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?= old('judul_buku'); ?>" required>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= old('pengarang'); ?>" required>
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>" required>
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= old('tahun_terbit'); ?>" required>
            </div>

            <div class="form-group">
                <label for="tempat_terbit">Tempat Terbit</label>
                <input type="text" class="form-control" id="tempat_terbit" name="tempat_terbit" value="<?= old('tempat_terbit'); ?>" required>
            </div>

            <div class="form-group">
                <label for="jumlah_buku">Jumlah Buku</label>
                <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku" value="<?= old('jumlah_buku'); ?>" required>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?= old('isbn'); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>


    </div>
</div>

<?= $this->endSection(); ?>