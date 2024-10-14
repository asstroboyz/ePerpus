<?= $this->extend('user/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Detail Jadwal Posyandu</h1> -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow p-3">
                <div class="row">
                    <div class="col-12">
                        <!-- <a href="<?= base_url('Admin/cetak_qr_id/' . $jadwal['id']); ?>" class="btn btn-success font-weight-bold float-right" target="_blank">
                        <i class="fa fa-print"></i> Print
                    </a> -->
                        <br>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Nama Posyandu:</strong> <?= esc($jadwal['nama_posyandu']); ?></li>
                            <li class="list-group-item"><strong>Alamat Posyandu:</strong> <?= esc($jadwal['alamat_posyandu']); ?></li>
                            <li class="list-group-item"><strong>Tanggal Jadwal:</strong> <?= date('d-m-Y', strtotime($jadwal['tanggal'])); ?></li>
                            <li class="list-group-item"><strong>Jam:</strong> <?= date('H:i', strtotime($jadwal['jam'])); ?> WIB</li>
                        </ul>
                        <br>
                        <a href="/user/jadwal" class="btn btn-secondary">&laquo; Kembali ke daftar jadwal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow p-3 mt-3">
                <div class="card-header">
                    <h5 class="font-weight-bold">Detail Balita yang Hadir</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Balita</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nama Ortu</th>
                                    <th>Umur</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($dataBalita)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada balita yang hadir.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dataBalita as $balita) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= esc($balita['nama']); ?></td>
                                            <td style="text-align:center;"><?= ($balita['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan'; ?></td>
                                            <td style="text-align:center;"><?= date('d-m-Y', strtotime($balita['tgl_lahir'])); ?></td>
                                            <td><?= esc($balita['nama_ortu']); ?> </td>
                                            <td>
                                                <?= esc($balita['umur']) ? esc($balita['umur']) . ' tahun' : ''; ?>
                                            </td>


                                        </tr>
                                    <?php endforeach; ?>
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