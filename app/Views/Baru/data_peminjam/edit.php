<?= $this->extend('baru/layout/index'); ?>


<?= $this->section('content'); ?>

<div class="card mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6 ">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6 ">
                <a href="<?= base_url('datapeminjam'); ?>"
                    class="btn btn-sm btn-secondary float-end "><i class="fas fa-arrow-circle-left me-1"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?php $session = session() ?>
        <form action="/updatedatapeminjam/<?= $peminjam->id; ?>"
            method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1">NIS</label>
                <input
                    class="form-control <?= $session->getFlashdata('pesan_error') ? 'is-invalid' : ''; ?>"
                    id="nis" name="nis" type="text" oninvalid="this.setCustomValidity('NIS Tidak Boleh Kosong')"
                    oninput="this.setCustomValidity('')" required
                    value="<?= $peminjam->id; ?>" disabled>
                <div class="invalid-feedback">
                    <?php if ($session->getFlashdata('pesan_error')) : ?>
                    <?= $session->getFlashdata('pesan_error'); ?>
                    <?php endif ?>


                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Nama</label>
                <input class="form-control" id="nama" name="nama" type="text"
                    oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"
                    required value="<?= $peminjam->nama; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" id="kelas" name="kelas"
                    oninvalid="this.setCustomValidity('Kelas Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"
                    required>
                    <option value="">--Pilih Kelas--</option>
                    <option value="7a" <?= $peminjam->kelas === '7a' ? 'selected' : '7a'; ?>>7a
                    </option>
                    <option value="7b" <?= $peminjam->kelas === '7b' ? 'selected' : '7b'; ?>>7b
                    </option>
                    <option value="7c" <?= $peminjam->kelas === '7c' ? 'selected' : '7c'; ?>>7c
                    </option>
                    <option value="7d" <?= $peminjam->kelas === '7d' ? 'selected' : '7d'; ?>>7d
                    </option>
                    <option value="7e" <?= $peminjam->kelas === '7e' ? 'selected' : '7e'; ?>>7e
                    </option>
                    <option value="7f" <?= $peminjam->kelas === '7f' ? 'selected' : '7f'; ?>>7f
                    </option>
                    <option value="7g" <?= $peminjam->kelas === '7g' ? 'selected' : '7g'; ?>>7g
                    </option>
                    <option value="8a" <?= $peminjam->kelas === '8a' ? 'selected' : '8a'; ?>>8a
                    </option>
                    <option value="8b" <?= $peminjam->kelas === '8b' ? 'selected' : '8b'; ?>>8b
                    </option>
                    <option value="8c" <?= $peminjam->kelas === '8c' ? 'selected' : '8c'; ?>>8c
                    </option>
                    <option value="8d" <?= $peminjam->kelas === '8d' ? 'selected' : '8d'; ?>>8d
                    </option>
                    <option value="8e" <?= $peminjam->kelas === '8e' ? 'selected' : '8e'; ?>>8e
                    </option>
                    <option value="8f" <?= $peminjam->kelas === '8f' ? 'selected' : '8f'; ?>>8f
                    </option>
                    <option value="8g" <?= $peminjam->kelas === '8g' ? 'selected' : '8g'; ?>>8g
                    </option>
                    <option value="9a" <?= $peminjam->kelas === '9a' ? 'selected' : '9a'; ?>>9a
                    </option>
                    <option value="9b" <?= $peminjam->kelas === '9b' ? 'selected' : '9b'; ?>>9b
                    </option>
                    <option value="9c" <?= $peminjam->kelas === '9c' ? 'selected' : '9c'; ?>>9c
                    </option>
                    <option value="9d" <?= $peminjam->kelas === '9d' ? 'selected' : '9d'; ?>>9d
                    </option>
                    <option value="9e" <?= $peminjam->kelas === '9e' ? 'selected' : '9e'; ?>>9e
                    </option>
                    <option value="9f" <?= $peminjam->kelas === '9f' ? 'selected' : '9f'; ?>>9f
                    </option>
                    <option value="9g" <?= $peminjam->kelas === '9g' ? 'selected' : '9g'; ?>>9g
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                        oninvalid="this.setCustomValidity('Jenis Kelamin Tidak Boleh Kosong')"
                        oninput="this.setCustomValidity('')" required>
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-laki" <?= old('jenis_kelamin') === 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki
                        </option>
                        <option value="Perempuan" <?= old('jenis_kelamin') === 'Perempuan' ? 'selected' : ''; ?>>Perempuan
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"
                        oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')"
                        oninput="this.setCustomValidity('')"
                        required><?= $peminjam->alamat; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1">No.HP</label>
                    <input class="form-control" id="no_hp" name="no_hp" type="text"
                        oninvalid="this.setCustomValidity('No.HP Tidak Boleh Kosong')"
                        oninput="this.setCustomValidity('')" required
                        value="<?= $peminjam->no_hp; ?>">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>