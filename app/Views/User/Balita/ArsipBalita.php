<?=$this->extend('User/Templates/Index');?>

<?=$this->section('page-content');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900"></h1>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('error-msg')): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <?=session()->getFlashdata('error-msg');?>
            </div>
        </div>
    </div>
    <?php endif;?>

    <?php if (session()->getFlashdata('msg')): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <b><i class="fa fa-check"></i></b> <?=session()->getFlashdata('msg');?>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h3>Daftar Arsip Balita</h3>
                    <a href="/user/balita" class="btn btn-secondary">
                        &laquo; Kembali ke Daftar Balita
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 35%;">Nama</th>
                                    <th style="width: 15%;">Umur</th>
                                    <th style="width: 10%;">Jenis Kelamin</th>
                                    <th style="width: 15%;">Nama Orang Tua</th>
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nama Orang Tua</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php if (!empty($balitaTerhapus)): ?>
                                <?php $no = 1; ?>
                                <?php foreach ($balitaTerhapus as $balita): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $balita['nama']; ?></td>
                                    <td><?= $balita['umur']; ?></td>
                                    <td><?= ($balita['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan'; ?></td>
                                    <td><?= $balita['nama_ortu']; ?></td>
                                    <td>
                                        <a href="<?= base_url('user/restoreBalita/' . $balita['id']); ?>" class="btn btn-success">
                                            <i class="fa fa-undo"></i> Pulihkan
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data balita yang diarsipkan.</td>
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
<!-- End Page Content -->

<?=$this->endSection();?>

<?=$this->section('additional-js');?>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
<?=$this->endSection();?>
