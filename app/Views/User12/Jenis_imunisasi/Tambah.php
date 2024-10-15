<?= $this->extend('Admin/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">



    <div class="col-lg-6">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-gradient-info text-white text-center py-4">
                <h4 class="font-weight-bold">Form Tambah Jenis Imunisasi</h4>
            </div>
            <div class="card-body p-5">
                <form
                    action="<?= base_url('Admin/saveJenisImun'); ?>"
                    method="post">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label for="usia_anak" class="font-weight-bold">Usia Anak (bulan)</label>
                        <input type="text" class="form-control form-control-lg" id="usia_anak" name="usia_anak"
                            value="<?= old('usia_anak'); ?>"
                            placeholder="Masukkan usia anak dalam bulan" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_imunisasi" class="font-weight-bold">Jenis Imunisasi</label>
                        <input type="text" class="form-control form-control-lg" id="jenis_imunisasi"
                            name="jenis_imunisasi"
                            value="<?= old('jenis_imunisasi'); ?>"
                            placeholder="Masukkan jenis imunisasi" required>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>