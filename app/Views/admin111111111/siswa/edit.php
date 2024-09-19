<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<section class="section">

  <section class="section">
    <div class="section-header">
      <h1>Edit Siswa </h1>
      <div class="section-header-button">

      </div>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/admin">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</a></div>
        <div class="breadcrumb-item"><a href="/admin">Siswa</a></div>
        <div class="breadcrumb-item">Edit Data</div>
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
              <h4>Edit data </h4>

            </div>
            <div class="card-body">

              <form action="<?= base_url('/admin/updateSiswa/' . $id->id) ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>

                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <div class="row form-group">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="nisn">nisn :</label>
                        <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" name="nisn" required autofocus disabled value="<?= $siswa->username ?>">
                      </div>

                      <div class="form-group">
                        <label for="nama">nama :</label>
                        <input type="text" class="form-control" name="nama" required autofocus value="<?= $siswa->nama ?>">
                      </div>
                      <div class="form-group">
                        <label for="kelas">kelas :</label>
                        <select class="form-control" name="kelas">
                          <option selected disabled value="">-- pilih Kelas --</option>
                          <?php foreach ($kelas as $key => $k) { ?>
                            <option value="<?= $k->id_kelas ?>" <?= $siswa->id_kelas == $k->id_kelas ? ' selected ' : '' ?> name="kelas"><?= $k->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir :</label>
                        <input type="text" class="form-control" name="tempat_lahir" required autofocus value="<?= $siswa->tempat_lahir ?>">
                      </div>
                      <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir :</label>
                        <input type="date" class="form-control" name="tanggal_lahir" required autofocus value="<?= $siswa->tanggal_lahir ?>">
                      </div>
                      <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin :</label>
                        <div class="form-check">
                          <input class="form-check-input" <?= $siswa->jenis_kelamin == '1' ? ' checked  ' : '' ?> value="1" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">
                            Laki - Laki
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" <?= $siswa->jenis_kelamin == '2' ? ' checked  ' : '' ?> value="2" name="jenis_kelamin" id="flexRadioDefault2">
                          <label class="form-check-label" for="flexRadioDefault2">
                            Perempuan
                          </label>
                        </div>
                      </div>
                      <div class="">
                        <button class="btn btn-success"><i class="fas fa-paper-plane"></i>Simpan</button>
                        <a href="/admin/siswa" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="agama">Agama :</label>
                        <select class="form-control" name="agama">
                          <option selected disabled value="">-- pilih Agama --</option>

                          <option <?= $siswa->agama == 'islam' ? ' selected  ' : '' ?> value="islam">Islam</option>
                          <option <?= $siswa->agama == 'kristen' ? ' selected  ' : '' ?> value="kristen">Kristen</option>
                          <option <?= $siswa->agama == 'katolik' ? ' selected  ' : '' ?> value="katolik">Katolik</option>
                          <option <?= $siswa->agama == 'hindu' ? ' selected  ' : '' ?> value="hindu">hindu</option>
                          <option <?= $siswa->agama == 'budha' ? ' selected  ' : '' ?> value="budha">budha</option>
                          <option <?= $siswa->agama == 'konghucu' ? ' selected  ' : '' ?> value="konghucu">konghucu</option>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="no_hp">No Hp :</label>
                        <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" name="no_hp" required autofocus <?php if (session('errors.nama_mapel')) : ?>is-invalid<?php endif ?> value="<?= $siswa->no_hp ?>">
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="6"><?= $siswa->alamat ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="nama_orangtua">Nama Orang Tua / wali :</label>
                        <input type="text" class="form-control" name="nama_orangtua" required value="<?= $siswa->nama_orangtua ?>">
                      </div>
                      <div class="form-group">
                        <label for="pekerjaan_orangtua">Pekerjaan Orangtua/Wali :</label>
                        <input type="text" class="form-control" name="pekerjaan_orangtua" required value="<?= $siswa->pekerjaan_orangtua ?>">
                      </div>
                      <div class="form-group">
                        <label for="foto">Foto :</label>
                        <input type="file" class="form-control" name="foto" autofocus <?php if (session('errors.nama_mapel')) : ?>is-invalid<?php endif ?> value="">
                      </div>
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