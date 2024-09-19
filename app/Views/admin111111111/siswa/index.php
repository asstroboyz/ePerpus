<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<section class="section">

  <section class="section">
    <div class="section-header">
      <h1>Siswa</h1>
      <div class="section-header-button">

      </div>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/admin">Dashboard</a></div>
        <div class="breadcrumb-item">Registrasi</a></div>
        <div class="breadcrumb-item">Siswa</div>
      </div>
    </div>
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss>x</button>
          <b><i class="fa fa-check"></i></b>
          <?= session()->getFlashdata('success') ?>
        </div>
      </div>
    <?php endif; ?>
    <!-- flash data tidak ditemukan -->
    <?php if (session()->getFlashdata('eror')) : ?>
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss>x</button>
          <b><i class="fa fa-exclamation-triangle"></i></b>
          <?= session()->getFlashdata('eror') ?>
        </div>
      </div>
    <?php endif; ?>

    <div class="section-body">


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Siswa</h4>
              <div class="card-header-action">
                <a href="<?= base_url() ?>/admin/registerSiswa" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Nama Siswa</th>
                      <th>Edit</th>
                      <th>Hapus</th>




                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach ($siswa as $key => $ss) :

                    ?>
                      <tr class="align-middle">
                        <td class="text-center">
                          <?= $key + 1 ?>
                        </td>
                        <td><?= $ss->nama ?></td>




                        <td><a href="<?= base_url('admin/editSiswa/' . $ss->id) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                        <td>
                          <form action="<?= base_url('admin/hapusSiswa/' . $ss->user_id) ?>" method="post" onsubmit="return confirm('yakin ingin hapus data?')">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger">
                              <i class="fa fa-trash"></i></button>
                        </td>
                        </form>

                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <?= $this->endSection() ?>