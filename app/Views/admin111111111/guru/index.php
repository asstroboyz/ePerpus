<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<section class="section">

  <section class="section">
    <div class="section-header">
      <h1>Guru</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/admin">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</a></div>
        <div class="breadcrumb-item">Guru</div>
      </div>
    </div>

    <div class="section-body">


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data guru</h4>
              <div class="card-header-action">
                <a href="<?= base_url() ?>/admin/registerGuru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
                      <th>Nama</th>
                      <th>Edit</th>
                      <th>Hapus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($guru as $key => $gru) :

                    ?>
                      <tr class="align-middle">
                        <td class="text-center">
                          <?= $key + 1 ?>
                        </td>
                        <td><?= $gru->nama ?></td>




                        <td><a href="<?= base_url('admin/editGuru/' . $gru->id) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                        <td>
                          <form action="<?= base_url('admin/hapusGuru/' . $gru->user_id) ?>" method="post" onsubmit="return confirm('yakin ingin hapus data?')">
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