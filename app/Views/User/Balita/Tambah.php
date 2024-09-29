<?= $this->extend('User/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Tampilkan pesan error jika ada -->
    <?php if (session()->has('pesanError')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session('pesanError') ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Form Data Balita</h6>
                    <div>
                        <a href="/User/balita" class="btn btn-secondary font-weight-bold ml-2"
                            style="background-color: #ffffff; border-color: #17a2b8; color: black;"
                            onmouseover="this.style.backgroundColor='#17a2b8'; this.style.color='white';"
                            onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='black';"
                            onmousedown="this.style.backgroundColor='#17a2b8'; this.style.color='white';"
                            onmouseup="this.style.backgroundColor='#17a2b8'; this.style.color='white';">
                            <i class="fa fa-arrow-left"></i> Kembali ke Daftar Balita
                        </a>
                    </div>
                </div>

                <!-- Form untuk insert data balita -->
                <div class="card-body">
                    <form
                        action="<?= base_url('user/saveBalita'); ?>"
                        method="post">
                        <?= csrf_field(); ?>

                        <!-- Card pertama: Data Identitas Balita -->
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Identitas Balita</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Balita</label>
                                            <input type="text"
                                                class="form-control form-control-user <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                                id="nama" name="nama"
                                                value="<?= old('nama'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select
                                                class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>"
                                                id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : ''; ?>>Laki-laki
                                                </option>
                                                <option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : ''; ?>>Perempuan
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis_kelamin'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control form-control-user <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>"
                                                id="tgl_lahir" name="tgl_lahir"
                                                value="<?= old('tgl_lahir'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tgl_lahir'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_ortu">Nama Orang Tua</label>
                                            <input type="text"
                                                class="form-control form-control-user <?= ($validation->hasError('nama_ortu')) ? 'is-invalid' : ''; ?>"
                                                id="nama_ortu" name="nama_ortu"
                                                value="<?= old('nama_ortu'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_ortu'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="anak_ke">Anak Ke</label>
                                            <input type="number"
                                                class="form-control form-control-user <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>"
                                                id="anak_ke" name="anak_ke"
                                                value="<?= old('anak_ke'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('anak_ke'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bbl">Berat Badan Lahir (Kg)</label>
                                            <input type="number"
                                                class="form-control form-control-user <?= ($validation->hasError('bbl')) ? 'is-invalid' : ''; ?>"
                                                id="bbl" name="bbl"
                                                value="<?= old('bbl'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('bbl'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pbl">Panjang Badan Lahir (cm)</label>
                                            <input type="number"
                                                class="form-control form-control-user <?= ($validation->hasError('pbl')) ? 'is-invalid' : ''; ?>"
                                                id="pbl" name="pbl"
                                                value="<?= old('pbl'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('pbl'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nik_balita">NIK Balita</label>
                                            <input type="text"
                                                class="form-control form-control-user <?= ($validation->hasError('nik_balita')) ? 'is-invalid' : ''; ?>"
                                                id="nik_balita" name="nik_balita"
                                                value="<?= old('nik_balita'); ?>"
                                                minlength="16" maxlength="16" pattern="\d{16}"
                                                title="NIK harus terdiri dari 16 digit angka" />
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nik_balita'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_kk">Nomor Kartu Keluarga</label>
                                            <input type="text"
                                                class="form-control form-control-user <?= ($validation->hasError('no_kk')) ? 'is-invalid' : ''; ?>"
                                                id="no_kk" name="no_kk"   minlength="16" maxlength="16" pattern="\d{16}"
                                                value="<?= old('no_kk'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('no_kk'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nik_ortu">NIK Orang Tua</label>
                                            <input type="text"
                                                class="form-control form-control-user <?= ($validation->hasError('nik_ortu')) ? 'is-invalid' : ''; ?>"
                                                id="nik_ortu" name="nik_ortu"   minlength="16" maxlength="16" pattern="\d{16}"
                                                value="<?= old('nik_ortu'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nik_ortu'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea
                                        class="form-control form-control-user <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                                        id="alamat"
                                        name="alamat"><?= old('alamat'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card kedua: Pemeriksaan Awal -->
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Pemeriksaan Awal</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="umur">Umur (bulan)</label>
                                            <input type="number"
                                                class="form-control form-control-user <?= ($validation->hasError('umur')) ? 'is-invalid' : ''; ?>"
                                                id="umur" name="umur"
                                                value="<?= old('umur'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('umur'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bb_awal">Berat Badan Awal (kg)</label>
                                            <input type="number" step="0.01"
                                                class="form-control form-control-user <?= ($validation->hasError('bb_awal')) ? 'is-invalid' : ''; ?>"
                                                id="bb_awal" name="bb_awal"
                                                value="<?= old('bb_awal'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('bb_awal'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tb_awal">Tinggi Badan Awal (cm)</label>
                                            <input type="number"
                                                class="form-control form-control-user <?= ($validation->hasError('tb_awal')) ? 'is-invalid' : ''; ?>"
                                                id="tb_awal" name="tb_awal"
                                                value="<?= old('tb_awal'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tb_awal'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lk_awal">Lingkar Kepala Awal (cm)</label>
                                            <input type="number"
                                                class="form-control form-control-user <?= ($validation->hasError('lk_awal')) ? 'is-invalid' : ''; ?>"
                                                id="lk_awal" name="lk_awal"
                                                value="<?= old('lk_awal'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('lk_awal'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- Tombol Kirim -->
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            <i class="fas fa-save"></i> Simpan Data Balita
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>