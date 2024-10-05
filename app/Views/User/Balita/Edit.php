<?= $this->extend('user/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <?php if (session()->has('pesanError')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session('pesanError') ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-12">
       mb-4">
              <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6>Edit Data Balita</h6>
                    <div>
                        <a href="<?= base_url('user/balita/') ?>"
                            class="btn btn-dark"> &laquo; Kembali Daftar Jadwal</a>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        action="<?= base_url('/user/updateBalita/' . $balita['id']) ?>"
                        method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Balita</label>
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama"
                                        value="<?= old('nama', $balita['nama']); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" <?= old('jenis_kelamin', $balita['jenis_kelamin']) == 'L' ? 'selected' : ''; ?>>Laki-laki
                                        </option>
                                        <option value="P" <?= old('jenis_kelamin', $balita['jenis_kelamin']) == 'P' ? 'selected' : ''; ?>>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user" id="tgl_lahir"
                                        name="tgl_lahir"
                                        value="<?= old('tgl_lahir', $balita['tgl_lahir']); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_ortu">Nama Orang Tua</label>
                                    <input type="text" class="form-control form-control-user" id="nama_ortu"
                                        name="nama_ortu"
                                        value="<?= old('nama_ortu', $balita['nama_ortu']); ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="anak_ke">Anak Ke</label>
                                    <input type="number" class="form-control form-control-user" id="anak_ke"
                                        name="anak_ke"
                                        value="<?= old('anak_ke', $balita['anak_ke']); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bbl">Berat Badan Lahir (gram)</label>
                                    <input type="number" class="form-control form-control-user" id="bbl" name="bbl"
                                        value="<?= old('bbl', $balita['bbl']); ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pbl">Panjang Badan Lahir (cm)</label>
                                    <input type="number" class="form-control form-control-user" id="pbl" name="pbl"
                                        value="<?= old('pbl', $balita['pbl']); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik_balita">NIK Balita</label>
                                    <input type="text" class="form-control form-control-user" id="nik_balita"
                                        name="nik_balita"
                                        value="<?= old('nik_balita', $balita['nik_balita']); ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_kk">Nomor Kartu Keluarga</label>
                                    <input type="text" class="form-control form-control-user" id="no_kk" name="no_kk"
                                        value="<?= old('no_kk', $balita['no_kk']); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik_ortu">NIK Orang Tua</label>
                                    <input type="text" class="form-control form-control-user" id="nik_ortu"
                                        name="nik_ortu"
                                        value="<?= old('nik_ortu', $balita['nik_ortu']); ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rt">RT</label>
                                    <input type="number" class="form-control form-control-user" id="rt" name="rt"
                                        value="<?= old('rt', $balita['rt']); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rw">RW</label>
                                    <input type="number" class="form-control form-control-user" id="rw" name="rw"
                                        value="<?= old('rw', $balita['rw']); ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="umur">Umur (bulan)</label>
                                    <input type="number" class="form-control form-control-user" id="umur" name="umur"
                                        value="<?= old('umur', $balita['umur']); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bb_awal">Berat Badan Awal (kg)</label>
                                    <input type="number" step="0.01" class="form-control form-control-user" id="bb_awal"
                                        name="bb_awal"
                                        value="<?= old('bb_awal', $balita['bb_awal']); ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tb_awal">Tinggi Badan Awal (cm)</label>
                                    <input type="number" class="form-control form-control-user" id="tb_awal"
                                        name="tb_awal"
                                        value="<?= old('tb_awal', $balita['tb_awal']); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lk_awal">Lingkar Kepala Awal (cm)</label>
                                    <input type="number" class="form-control form-control-user" id="lk_awal"
                                        name="lk_awal"
                                        value="<?= old('lk_awal', $balita['lk_awal']); ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning">Update Data</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>