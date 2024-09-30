<?= $this->extend('Admin/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <div class="row justify-content-start">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header text-center py-4">
                    <h4 class="font-weight-bold">Form Tambah Jenis Imunisasi</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Admin/saveJenisImun'); ?>" method="post">
                        <?= csrf_field(); ?>

                        <div class="mb-3">
                            <label for="usia_anak" class="form-label">Usia Anak (bulan)</label>
                            <input type="text" class="form-control form-control-user" id="usia_anak" name="usia_anak"
                                value="<?= old('usia_anak'); ?>" placeholder="Masukkan usia anak dalam bulan" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_imunisasi" class="form-label">Jenis Imunisasi</label>
                            <input type="text" class="form-control form-control-user" id="jenis_imunisasi" name="jenis_imunisasi"
                                value="<?= old('jenis_imunisasi'); ?>" placeholder="Masukkan jenis imunisasi" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-block btn-primary">Tambah Data</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
