<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<section class="section">

  <section class="section">
    <div class="section-header">
      <h1>Siswa </h1>
      <div class="section-header-button">

      </div>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/admin">Dashboard</a></div>
        <div class="breadcrumb-item">Ulangan</a></div>
        <div class="breadcrumb-item">Tambah</div>
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
              <h4>Tambah Ulangan</h4>

            </div>
            <div class="card-body">
              <form action="<?= base_url('/admin/simpanUlangan') ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
                  <div class="col-sm-12 col-md-7">



                    <select class="form-control selectric" name="kelas" required>
                      <option selected disabled value="">-- pilih kelas --</option>

                      <?php foreach ($kelas as $key => $kel) { ?>
                        <option value="<?= $kel->id_kelas ?>"><?= $kel->nama_kelas ?></option>
                      <?php } ?>
                    </select>

                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mapel</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric" name="mapel" required autofocus>
                      <option selected disabled value="">-- pilih Mapel --</option>

                      <?php foreach ($mapel as $key => $m) { ?>
                        <option value="<?= $m->id ?>"><?= $m->nama_mapel ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Guru</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric" name="guru" required>
                      <option selected disabled value="">-- pilih Guru --</option>

                      <?php foreach ($guru as $key => $g) { ?>
                        <option value="<?= $g->id ?>"><?= $g->nama ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Waktu</label>
                  <div class="col-sm-12 col-md-7">
                    <input name="waktu" type="text" class="form-control" placeholder="Menit">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal</label>
                  <div class="col-sm-12 col-md-7">
                    <input name="tanggal" type="date" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section>
  <?= $this->endSection() ?>