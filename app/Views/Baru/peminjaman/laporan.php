<?= $this->extend('layout/index'); ?>


<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('pesan_tambah')) : ?>
    <div class="alert alert-success my-2 text-center" role="alert">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('pesan_tambah'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('pesan_hapus')) : ?>
    <div class="alert alert-danger my-2 text-center" role="alert">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('pesan_hapus'); ?>
    </div>
<?php endif; ?>
<div class="row ">
    <div class="col-lg-2 col-sm-2 col-md-2 me-4">
        <div class="row">
            <div class="d-flex justify-content-center gap-2">
                <form action="cetakdatapeminjam" method="post">
                    <input type="hidden" value="<?= $tanggal_awal; ?>" name="tanggal1">
                    <input type="hidden" value="<?= $tanggal_akhir; ?>" name="tanggal2">
                    <button type="submit" class="btn btn-success "><i class="fas fa-print me-1"></i>Print</button>
                </form>
                <a href="laporandatapeminjaman" class="btn btn-secondary mb-2"><i class="fas fa-circle-notch"></i></a>
            </div>

        </div>

    </div>

    <div class="col me-2 pb-3">

        <form class="d-flex" role="search" action="laporandatapeminjaman" method="POST">
            <!-- date 1 -->
            <div class="input-group mb-3 mx-2">
                <span class="input-group-text" id="basic-addon1">Dari</span>
                <input type="date" class="form-control" name="tanggal1" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <!-- date 2 -->
            <div class="input-group mb-3 mx-2">
                <span class="input-group-text" id="basic-addon1">Sampai</span>
                <input type="date" class="form-control" name="tanggal2" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <button class="btn btn-secondary btn-sm cari mb-3" type="submit"><i class="fas fa-search"></i></button>

        </form>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">

        <div class="row align-items-center">
            <div class="col-md-6 ">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Kode Pinjam</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jumlah Pinjam</th>
                    <th>Kondisi Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Kode Pinjam</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jumlah Pinjam</th>
                    <th>Kondisi Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Denda</th>
                </tr>
            </tfoot>
            <tbody>

                <?php foreach ($laporan as $data) : ?>
                    <tr>
                        <td><?= $data['kode_pinjam']; ?></td>
                        <td><?= $data['kode_buku']; ?></td>
                        <td><?= $data['judul_buku']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['kelas']; ?></td>
                        <td><?= $data['jumlah_pinjam']; ?></td>
                        <td><?= $data['kondisi_buku']; ?></td>
                        <td><?= $data['tanggal_pinjam']; ?></td>
                        <td><?= $data['tanggal_pengembalian']; ?></td>
                        <td><?= $data['status']; ?></td>
                        <?php $date1 = new DateTime($data['tanggal_pengembalian']) ?>
                        <?php $date2 = new DateTime(date('Y-m-d')) ?>
                        <?php $days  = $date2->diff($date1)->format('%a'); ?>
                        <!-- Denda -->
                        <?php $denda = 2000 * $days ?>
                        <td><?= date('Y-m-d') > $data['tanggal_pengembalian'] ? "Rp $denda" : "Tidak Denda"; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>