<?= $this->extend('admin/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="card mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url('user/kunjungan'); ?>"
                    class="btn btn-sm btn-secondary float-end">
                    <i class="fas fa-arrow-circle-left me-1"></i>Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>

        <?php if ($validation->getErrors()): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors(); ?>
        </div>
        <?php endif; ?>

        <form
            action="<?= base_url('user/saveKunjungan'); ?>"
            method="post">
            <?= csrf_field(); ?>


            <div class="mb-3">
                <label for="nama">Pilih Siswa</label>
                <select name="id_user"
                    class="form-control <?= ($validation->hasError('id_user')) ? 'is-invalid' : ''; ?>"
                    id="input-id_user" required>
                    <option value="">Pilih Siswa</option>
                    <?php foreach ($users as $user): ?>
                    <option value="<?= $user->id; ?>"
                        data-username="<?= $user->username; ?>"
                        data-fullname="<?= $user->fullname; ?>"
                        data-nis="<?= $user->nis; ?>"
                        data-kelas="<?= $user->kelas; ?>"
                        data-alamat="<?= $user->alamat; ?>"
                        data-no_hp="<?= $user->no_hp; ?>" <?= old('id_user') == $user->id ? 'selected' : ''; ?>>
                        <?= $user->username; ?>
                    </option>
                    <?php endforeach; ?>
                </select>

                <div class="invalid-feedback">
                    <?= $validation->getError('id_user'); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="username">username</label>
                <input
                    class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                    id="username" name="username" type="text"
                    value="<?= old('username'); ?>"
                    required>
                <div class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="fullname">fullname</label>
                <input
                    class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>"
                    id="fullname" name="fullname" type="text"
                    value="<?= old('fullname'); ?>"
                    required>
                <div class="invalid-feedback">
                    <?= $validation->getError('fullname'); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="nis">NIS</label>
                <input
                    class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?>"
                    id="nis" name="nis" type="text"
                    value="<?= old('nis'); ?>"
                    required>
                <div class="invalid-feedback">
                    <?= $validation->getError('nis'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="kelas">Kelas</label>
                <input
                    class="form-control <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>"
                    id="kelas" name="kelas" type="text"
                    value="<?= old('kelas'); ?>"
                    required>
                <div class="invalid-feedback">
                    <?= $validation->getError('kelas'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <input
                    class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                    id="alamat" name="alamat" type="text"
                    value="<?= old('alamat'); ?>"
                    required>
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="no_hp">No HP</label>
                <input
                    class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>"
                    id="no_hp" name="no_hp" type="text"
                    value="<?= old('no_hp'); ?>"
                    required>
                <div class="invalid-feedback">
                    <?= $validation->getError('no_hp'); ?>
                </div>
            </div>


            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('input-id_user').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var username = selectedOption.getAttribute('data-username');
        var fullname = selectedOption.getAttribute('data-fullname');
        var nis = selectedOption.getAttribute('data-nis');
        var kelas = selectedOption.getAttribute('data-kelas');
        var alamat = selectedOption.getAttribute('data-alamat');
        var no_hp = selectedOption.getAttribute('data-no_hp');


        document.getElementById('username').value = username || '';
        document.getElementById('fullname').value = fullname || '';
        document.getElementById('nis').value = nis || '';
        document.getElementById('kelas').value = kelas || '';
        document.getElementById('alamat').value = alamat || '';
        document.getElementById('no_hp').value = no_hp || '';
    });
</script>

<?= $this->endSection(); ?>