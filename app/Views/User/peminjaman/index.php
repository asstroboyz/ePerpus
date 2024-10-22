<?= $this->extend('user/layout/index'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('pesan_tambah')) : ?>
    <div class="alert alert-success my-2 text-center" role="alert">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('pesan_tambah'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('pesan_hapus')) : ?>
    <div class="alert alert-danger my-2 text-center" role="alert">
        <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('pesan_hapus'); ?>
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
                <a href="<?= base_url('user/createPeminjaman'); ?>" class="btn btn-primary float-end">
                    <i class="fas fa-plus-square me-1"></i> Tambah Data
                </a>
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
                    <th>Nama Siswa</th>
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
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Nama Siswa</th>
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
                <?php foreach ($peminjaman as $data) : ?>
                    <tr>
                        <td><?= $data['kode_pinjam']; ?></td>
                        <td><?= $data['kode_buku']; ?></td>
                        <td><?= $data['judul_buku']; ?></td>
                        <td><?= $data['fullname']; ?></td>
                        <td><?= $data['kelas']; ?></td>
                        <td><?= $data['jumlah_pinjam']; ?></td>
                        <td><?= $data['kondisi_buku']; ?></td>
                        <td><?= $data['tanggal_pinjam']; ?></td>
                        <td><?= $data['tanggal_pengembalian']; ?></td>
                        <td><?= $data['status']; ?></td>
                        <?php
                        // Penanganan denda
                        $denda = 0;
                        if (!empty($data['tanggal_pengembalian'])) {
                            $date1 = new DateTime($data['tanggal_pengembalian']);
                            $date2 = new DateTime();
                            $days = $date2->diff($date1)->format('%a');

                            if ($date2 > $date1) {
                                $denda = 2000 * $days; // Hitung denda
                            }
                        }
                        ?>
                        <td><?= $denda > 0 ? "Rp $denda" : "Tidak Denda"; ?></td>

                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <form action="<?= base_url('user/ubahstatus/' . $data['kode_pinjam']); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="status" value="<?= $data['status'] == 'Belum Kembali' ? 'Kembali' : 'Belum Kembali'; ?>">
                                    <button type="submit" class="btn btn-sm btn-success"
                                        onclick="return confirm('Apakah anda yakin ingin mengubah status peminjaman?');"
                                        <?= $data['status'] == 'Kembali' ? 'disabled' : ''; ?>>
                                        <?php if ($data['status'] == 'Kembali') : ?>
                                            <i class="fas fa-check-circle"></i> 
                                        <?php else : ?>
                                            <i class="fas fa-clock"></i> 
                                        <?php endif; ?>
                                    </button>
                                </form>



                                <form action="<?= base_url('hapusdatapeminjaman/' . $data['kode_pinjam']); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>