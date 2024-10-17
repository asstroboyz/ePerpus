<?= $this->extend('Admin/layout/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Edit Posyandu</h1>

    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">

            <div class="card shadow">
                <div class="card-header">
                    <a href="/Admin/posyandu">&laquo; Kembali ke daftar posyandu</a>
                </div>
                <div class="card-body">
                    <form
                        action="<?= base_url('/Admin/updatePosyandu') ?>"
                        method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= old('id', $posyandu['id']); ?>">

                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <!-- Nama Posyandu -->
                                <div class="form-group">
                                    <label for="nama_posyandu">Nama Posyandu</label>
                                    <input name="nama_posyandu" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('nama_posyandu')) ? 'is-invalid' : ''; ?>"
                                        id="input-nama_posyandu" placeholder="Masukkan nama posyandu"
                                        value="<?= old('nama_posyandu', $posyandu['nama_posyandu']); ?>"
                                        required />
                                    <div id="nama_posyanduFeedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_posyandu'); ?>
                                    </div>
                                </div>

                                <!-- Alamat Posyandu -->
                                <div class="form-group">
                                    <label for="alamat_posyandu">Alamat</label>
                                    <input name="alamat_posyandu" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('alamat_posyandu')) ? 'is-invalid' : ''; ?>"
                                        id="input-alamat_posyandu" placeholder="Masukkan alamat posyandu"
                                        value="<?= old('alamat_posyandu', $posyandu['alamat_posyandu']); ?>"
                                        required />
                                    <div id="alamat_posyanduFeedback" class="invalid-feedback">
                                        <?= $validation->getError('alamat_posyandu'); ?>
                                    </div>
                                </div>

                                <!-- Kecamatan -->


                                <!-- Kader Posyandu -->
                                <div class="form-group">
                                    <label for="kader_posyandu">Pilih Kader</label>
                                    <select name="kader_posyandu"
                                        class="form-control <?= ($validation->hasError('kader_posyandu')) ? 'is-invalid' : ''; ?>"
                                        id="input-kader_posyandu" required>
                                        <option value="">Pilih kader</option>
                                        <?php foreach ($users as $user): ?>
                                            <option
                                                value="<?= $user->id; ?>"
                                                <?= old('kader_posyandu', $posyandu['kader_posyandu']) == $user->id ? 'selected' : ''; ?>>
                                                <?= $user->username; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="kader_posyanduFeedback" class="invalid-feedback">
                                        <?= $validation->getError('kader_posyandu'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button class="btn btn-block btn-primary">Update Data Posyandu</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    });
</script>
<?= $this->endSection(); ?>