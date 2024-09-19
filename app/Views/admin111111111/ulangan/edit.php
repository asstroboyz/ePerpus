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
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric">
                          <option>Tech</option>
                          <option>News</option>
                          <option>Political</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple"></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Publish</button>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <?= $this->endSection() ?>