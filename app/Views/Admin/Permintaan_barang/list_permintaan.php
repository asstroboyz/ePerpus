<?= $this->extend('Admin/layout/Index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">


    <h1 class="h3 mb-4 text-gray-800">Detail Permintaan Barang </h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow p-3">
                <div class="row col-lg-12 mx-2">
                    <div class="col-lg-6">
                        <label for="kode_permintaan">Kode Permintaan</label>
                        <input name="kode_permintaan" type="text" class="form-control form-control-user"
                            id="input-kode_permintaan"
                            value="<?= $detail['permintaan_peminjaman_id']; ?>"
                            readonly />
                    </div>
                    <!-- permintaan_peminjaman_id -->
                    <!-- id_permintaan_peminjaman -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tgl_permintaan">Tanggal Permintaan</label>
                            <input name="tgl_permintaan" type="text" class="form-control form-control-user"
                                id="input-tgl_permintaan"
                                value="<?= $detail['tgl_permintaan']; ?>"
                                readonly />
                        </div>
                    </div>


                </div>
                <div class="row col-lg-12 mx-2 table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Perihal</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php if ($permintaan) { ?>
                                <?php foreach ($permintaan as $num => $data) { ?>

                                    <tr>
                                        <td style="width: 70px;">
                                            <?= $num + 1; ?>
                                        </td>

                                        <td>
                                            <?= $data['judul_buku']; ?>
                                        </td>
                                        <td
                                            style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: normal;">
                                            <?= $data['judul_buku']; ?>
                                        </td>


                                        <td style=" width: 120px;">
                                            <?= $data['jumlah']; ?>
                                        </td>


                                        <td style=" width: 120px;">
                                            <?php $date = date_create($data['tgl_pengajuan']); ?>
                                            <?= date_format($date, "d-m-Y"); ?>
                                        </td>
                                        <td style="text-align:center; width: 120px;">
                                            <span
                                                class="btn <?= $data['status'] == 'belum diproses' ? 'btn-danger' : ($data['status'] == 'diproses' ? 'btn-warning' : 'btn-success') ?> text-white">
                                                <?= $data['status']; ?>
                                            </span>
                                        </td>

                                        <!-- <td style="text-align:center; width: 150px;">

                                            <a href="/Admin/detailpermin/<?= $data['id'] ?>"
                                                class="  btn btn-primary"><i class="fas fa-eye"></i></a>
                                        </td> -->
                                    </tr>
                                <?php } ?>
                                <!-- end of foreach                -->
                            <?php } else { ?>
                                <tr>
                                    <td colspan="4">
                                        <h3 class="text-gray-900 text-center">Data belum ada.</h3>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <a href="<?= base_url('Admin/Permintaan'); ?>"
                    class="btn btn-secondary">&laquo; Kembali ke
                    daftar permintaan
                    barang
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('page-content'); ?>