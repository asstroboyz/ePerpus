<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<section class="section">

    <section class="section">
        <div class="section-header">
            <h1>Guru </h1>
            <div class="section-header-button">

            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin">Dashboard</a></div>
                <div class="breadcrumb-item">Registrasi</a></div>
                <div class="breadcrumb-item">Guru</div>
            </div>
        </div>
        <?php if (session()->getFlashdata('is_unique')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss>x</button>
                    <b><i class="fa fa-exclamation-triangle "></i></b>
                    <?= session()->getFlashdata('is_unique') ?>
                </div>


            </div>
        <?php endif; ?>
        <div class="section-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Registrasi data Guru</h4>

                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/admin/simpanGuru') ?>" method="post" autocomplete="off">
                                <?= csrf_field(); ?>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nik">Nik :</label>
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" name="nik" required autofocus <?php if (session('errors.nama_mapel')) : ?>is-invalid<?php endif ?> value="<?= old('nama_mapel') ?>">
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="id_mengajar">Id Mengajar :</label>
                                            <input type="text" class="form-control" name="id_mengajar" required autofocus>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="nama">Nama :</label>
                                            <input type="text" class="form-control" name="nama" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir :</label>
                                            <input type="text" class="form-control" name="tempat_lahir" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir :</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin :</label>
                                            <div class="form-check">
                                                <input class="form-check-input" value="1" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Laki - Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="2" name="jenis_kelamin" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="">
                                            <button class="btn btn-success"><i class="fas fa-paper-plane"></i>Simpan</button>
                                            <a href="/admin/guru" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="agama">Agama :</label>
                                            <select class="form-control" name="agama">
                                                <option selected disabled value="">-- pilih Agama --</option>

                                                <option value="islam">Islam</option>
                                                <option value="kristen">Kristen</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">hindu</option>
                                                <option value="budha">budha</option>
                                                <option value="konghucu">konghucu</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No Hp :</label>
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" name="no_hp" required autofocus <?php if (session('errors.nama_mapel')) : ?>is-invalid<?php endif ?> value="<?= old('nama_mapel') ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat :</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="6"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto :</label>
                                            <input type="file" class="form-control" name="foto" autofocus <?php if (session('errors.nama_mapel')) : ?>is-invalid<?php endif ?> value="">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?= $this->endSection() ?>