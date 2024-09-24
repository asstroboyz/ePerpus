<?= $this->extend('Admin/Templates/Index') ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
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

                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h3>Tambah Jadwal Posyandu</h3>
                    <div>
                        <a href="<?= base_url('Admin/jadwal/') ?>" class="btn btn-dark"> &laquo; Kembali Daftar Jadwal</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('/Admin/simpanJadwalPosyandu') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <!-- Nama Posyandu -->
                                <div class="form-group">
                                    <label for="nama_posyandu">Nama Posyandu</label>
                                    <input name="nama_posyandu" type="text"
                                           class="form-control form-control-user <?= ($validation->hasError('nama_posyandu')) ? 'is-invalid' : ''; ?>"
                                           id="input-nama_posyandu" placeholder="Masukkan nama posyandu"
                                           value="<?= old('nama_posyandu'); ?>" required />
                                    <div id="nama_posyanduFeedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_posyandu'); ?>
                                    </div>
                                </div>

                                <!-- Alamat Posyandu -->
                                <div class="form-group">
                                    <label for="alamat_posyandu">Alamat</label>
                                    <input name="alamat_posyandu" type="text"
                                           class="form-control form-control-user <?= ($validation->hasError('alamat_posyandu')) ? 'is-invalid' : ''; ?>"
                                           id="input-alamat_posyandu" placeholder="Masukkan Alamat Posyandu"
                                           value="<?= old('alamat_posyandu'); ?>" required />
                                    <div id="alamat_posyanduFeedback" class="invalid-feedback">
                                        <?= $validation->getError('alamat_posyandu'); ?>
                                    </div>
                                </div>

                                <!-- Kader Posyandu -->
                                <div class="form-group">
                                    <label for="kader_posyandu">Pilih Kader</label>
                                    <select name="kader_posyandu"
                                            class="form-control <?= ($validation->hasError('kader_posyandu')) ? 'is-invalid' : ''; ?>"
                                            id="input-kader_posyandu" required>
                                        <option value="">Pilih kader</option>
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?= $user->id; ?>"
                                                <?= old('kader_posyandu') == $user->id ? 'selected' : ''; ?>>
                                                <?= $user->username; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="kader_posyanduFeedback" class="invalid-feedback">
                                        <?= $validation->getError('kader_posyandu'); ?>
                                    </div>
                                </div>

                                <!-- Bidan -->
                                <div class="form-group">
                                    <label for="bidan">Bidan</label>
                                    <input name="bidan" type="text"
                                           class="form-control form-control-user <?= ($validation->hasError('bidan')) ? 'is-invalid' : ''; ?>"
                                           id="input-bidan" placeholder="Masukkan Nama Bidan"
                                           value="<?= old('bidan'); ?>" required />
                                    <div id="bidanFeedback" class="invalid-feedback">
                                        <?= $validation->getError('bidan'); ?>
                                    </div>
                                </div>

                                <!-- Tanggal -->
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input name="tanggal" type="date"
                                           class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>"
                                           id="input-tanggal" value="<?= old('tanggal'); ?>" required />
                                    <div id="tanggalFeedback" class="invalid-feedback">
                                        <?= $validation->getError('tanggal'); ?>
                                    </div>
                                </div>

                                <!-- Jam -->
                                <div class="form-group">
                                    <label for="jam">Jam</label>
                                    <input name="jam" type="time"
                                           class="form-control <?= ($validation->hasError('jam')) ? 'is-invalid' : ''; ?>"
                                           id="input-jam" value="<?= old('jam'); ?>" required />
                                    <div id="jamFeedback" class="invalid-feedback">
                                        <?= $validation->getError('jam'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button class="btn btn-block btn-primary">Tambah Jadwal Posyandu</button>
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
