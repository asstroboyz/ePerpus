<?= $this->extend('Admin/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <div class="row justify-content-start">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header text-center py-4">
                    <h4 class="font-weight-bold">Form Edit Jenis Imunisasi</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Admin/updateJenisImun/' . $jenis_imunisasi['id']); ?>" method="post">
                        <?= csrf_field(); ?>

                        <div class="mb-3">
                            <label for="usia_anak" class="form-label">Usia Anak (bulan)</label>
                            <input type="text" class="form-control form-control-user <?= ($validation->hasError('usia_anak')) ? 'is-invalid' : ''; ?>" 
                                id="usia_anak" name="usia_anak"
                                value="<?= old('usia_anak', $jenis_imunisasi['usia_anak']); ?>" 
                                placeholder="Masukkan usia anak dalam bulan" >
                            <?php if ($validation->hasError('usia_anak')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('usia_anak'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_imunisasi" class="form-label">Jenis Imunisasi</label>
                            <input type="text" class="form-control form-control-user <?= ($validation->hasError('jenis_imunisasi')) ? 'is-invalid' : ''; ?>" 
                                id="jenis_imunisasi" name="jenis_imunisasi"
                                value="<?= old('jenis_imunisasi', $jenis_imunisasi['jenis_imunisasi']); ?>" 
                                placeholder="Masukkan jenis imunisasi" >
                            <?php if ($validation->hasError('jenis_imunisasi')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenis_imunisasi'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-block btn-primary">Update Data</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
