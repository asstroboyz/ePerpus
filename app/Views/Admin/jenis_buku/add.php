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

            <!-- Kode Buku tidak perlu ditampilkan lagi, karena di-generate secara otomatis -->

            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" class="form-control <?= ($validation->hasError('judul_buku')) ? 'is-invalid' : ''; ?>" id="judul_buku" name="judul_buku" value="<?= old('judul_buku'); ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('judul_buku'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" class="form-control <?= ($validation->hasError('pengarang')) ? 'is-invalid' : ''; ?>" id="pengarang" name="pengarang" value="<?= old('pengarang'); ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('pengarang'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('penerbit'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number"
                    class="form-control <?= ($validation->hasError('tahun_terbit')) ? 'is-invalid' : ''; ?>"
                    id="tahun_terbit"
                    name="tahun_terbit"
                    value="<?= old('tahun_terbit'); ?>"
                    required
                    min="1000"
                    max="9999"
                    oninput="this.value = this.value.slice(0, 4)">
                <div class="invalid-feedback">
                    <?= $validation->getError('tahun_terbit'); ?>
                </div>
            </div>



            <div class="form-group">
                <label for="tempat_terbit">Tempat Terbit</label>
                <input type="text" class="form-control <?= ($validation->hasError('tempat_terbit')) ? 'is-invalid' : ''; ?>" id="tempat_terbit" name="tempat_terbit" value="<?= old('tempat_terbit'); ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('tempat_terbit'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_buku">Jumlah Buku</label>
                <input type="number" class="form-control <?= ($validation->hasError('jumlah_buku')) ? 'is-invalid' : ''; ?>" id="jumlah_buku" name="jumlah_buku" value="<?= old('jumlah_buku'); ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('jumlah_buku'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control <?= ($validation->hasError('isbn')) ? 'is-invalid' : ''; ?>" id="isbn" name="isbn" value="<?= old('isbn'); ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('isbn'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>

</div>

<?= $this->endSection(); ?>