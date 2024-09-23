<?= $this->extend('Admin/Templates/Index'); ?>

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
                    <h3>Daftar Posyandu</h3>
                    <div>
                        <a href="<?php echo base_url('Admin/tambahPosyandu/'); ?>"
                            class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Posyandu
                        </a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Posyandu</th>
                                    <th>Alamat Posyandu</th>
                                    <th>Kader Posyandu</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Posyandu</th>
                                    <th>Alamat Posyandu</th>
                                    <th>Kader Posyandu</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php if ($posyandu) : ?>
                                    <?php foreach ($posyandu as $index => $data) : ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= esc($data['nama_posyandu']); ?></td>
                                            <td><?= esc($data['alamat_posyandu']); ?></td>
                                            <td><?= esc($data['kader_username']); ?></td>
                                            <td>
                                                <a href="/Admin/editPosyandu/<?= $data['id']; ?>" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $data['id']; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Delete Confirmation Modal -->
                                        <div class="modal fade" id="deleteModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $data['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel<?= $data['id']; ?>">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus posyandu ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <form action="/Admin/posyandu/delete/<?= $data['id']; ?>" method="post">
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
                                        <td colspan="5">
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