<?= $this->extend('User/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?php if (session()->has('pesanBerhasil')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session('pesanBerhasil') ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h3>Daftar Balita</h3>
                    <div>
                        <a href="<?php echo base_url('user/tambahBalita/'); ?>"
                            class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Balita
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Balita</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nama Orang Tua</th>
                                    <th>Posyandu</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Balita</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nama Orang Tua</th>
                                    <th>Posyandu</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php if ($balita) : ?>
                                <?php foreach ($balita as $index => $data) : ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td><?= esc($data['nama']); ?>
                                    </td>
                                    <td><?= esc($data['jenis_kelamin']); ?>
                                    </td>
                                    <td><?= esc($data['tgl_lahir']); ?>
                                    </td>
                                    <td><?= esc($data['nama_ortu']); ?>
                                    </td>
                                    <td><?= esc($data['nama_posyandu']); ?>
                                    </td>
                                    <td>
                                        <a href="/user/editBalita/<?= $data['id']; ?>"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModal<?= $data['id']; ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade"
                                    id="deleteModal<?= $data['id']; ?>"
                                    tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel<?= $data['id']; ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="deleteModalLabel<?= $data['id']; ?>">
                                                    Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data balita ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <form
                                                    action="/Admin/deleteBalita/<?= $data['id']; ?>"
                                                    method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="7">
                                        <h3 class="text-gray-900 text-center">Data belum ada.</h3>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    });
</script>
<?= $this->endSection(); ?>