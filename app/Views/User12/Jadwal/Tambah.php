<?= $this->extend('User/Templates/Index') ?>

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
                        <a href="<?= base_url('User/jadwal/') ?>" class="btn btn-dark"> &laquo; Kembali Daftar Jadwal</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('/User/simpanJadwalPosyandu') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <!-- Nama Posyandu -->
                                <div class="form-group">
                                    <label for="nama_posyandu">Nama Posyandu</label>
                                    <input type="text" name="nama_posyandu" id="nama_posyandu" class="form-control"
                                        value="<?= $selectedPosyandu['nama_posyandu']; ?>" readonly />
                                </div>

  
                                <input type="hidden" name="posyandu_id" value="<?= $selectedPosyandu['id']; ?>" />
                                <!-- Alamat Posyandu -->
                                <div class="form-group">
                                    <label for="alamat_posyandu">Alamat</label>
                                    <input type="text" name="alamat_posyandu" id="alamat_posyandu" class="form-control"
                                        value="<?= $selectedPosyandu['alamat_posyandu']; ?>" readonly />
                                </div>

                                <div class="form-group">
                                    <label for="kader_posyandu">Kader Posyandu</label>
                                    <input type="text" name="kader_posyandu" id="kader_posyandu" class="form-control"
                                        value="<?= $kaderPosyandu->username; ?>" readonly />
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
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        const tanggalInput = document.getElementById('input-tanggal');

        // Set the minimum date to today
        tanggalInput.setAttribute('min', today);
    });

    $(document).ready(function() {
        // Auto-dismiss alert after 3 seconds
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    });
</script>

<?= $this->endSection(); ?>