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

<div class="card mb-4">
    <div class="card-header">

        <div class="row align-items-center">
            <div class="col-md-6 ">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6 d-flex justify-content-end gap-2">
                
                <a href="<?= base_url('tambahdatapeminjaman'); ?>" class="btn  btn-primary float-end "><i class="fas fa-plus-square me-1"></i>Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Kode Pinjam</th>
                    <th>Nomor Buku</th>
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Kode Pinjam</th>
                    <th>Nomor Buku</th>
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
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($Peminjaman as $data) : ?>
                    <tr>
                        <td><?= $data['kode_pinjam']; ?></td>
                        <td><?= $data['nomor_buku']; ?></td>
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
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <form action="<?= base_url('ubahstatuspinjam/' . $data['kode_pinjam']); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <?php if ($data['status'] == "Belum Kembali") : ?>
                                        <input type="hidden" name="status" value="Kembali">

                                        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Buku di kembalikan, pastikan data benar?');"><i class="fas fa-check-circle"></i></button>

                                    <?php else : ?>
                                        <input type="hidden" name="status" value="Kembali">

                                        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Apakah anda yakin ingin mengubah status data ini, pastikan data benar?');" disabled><i class="fas fa-check-circle"></i></button>
                                    <?php endif; ?>

                                </form>
                                <form action="<?= base_url('hapusdatapeminjaman/' . $data['kode_pinjam']); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>