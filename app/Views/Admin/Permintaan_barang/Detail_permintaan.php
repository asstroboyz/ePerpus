<?= $this->extend('Admin/layout/Index') ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <?php if (session()->has('pesanBerhasil')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('pesanBerhasil') ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">

            <div class="card shadow mb-4">
                <div class="card-header">
                    <a href="/Admin/permintaan_masuk" class="btn ml-n3 text-primary font-weight-bold"><i
                            class="fas fa-chevron-left"></i> Kembali ke daftar permintaan </a>
                    <button class="btn btn-primary float-right ml-2" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fa fa-eye rounded-cyrcle"></i> Timeline
                    </button>
                    <?php if ($detail['status'] == 'belum diproses') { ?>

                        <a href="/Admin/prosesPermintaan/<?= $detail['id'] ?>"
                            class="text-light btn btn-warning font-weight-bold float-right"><i class="fa fa-clipboard"></i>
                            Proses Permintaan</a>
                    <?php } elseif ($detail['status'] == 'diproses') { ?>
                        <div class="btn-group float-right">
                            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modalPengaduan"><i
                                    class="fa fa-check"></i>
                                Selesaikan Permintaan
                            </a>
                        </div>

                    <?php }; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">Nama Barang Yang diajukan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?= $detail['judul_buku'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">Jumlah Barang Yang diajukan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?= $detail['jumlah'] ?>
                        </div>
                    </div>

                    <hr>
                    <div class="row  ">
                        <div class="col-md-3">Status Pengajuan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?= $detail['status'] ?>

                        </div>

                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-md-3">Tanggal Pengajuan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8">
                            <?php
                            $formattedDate = date('d-m-Y', strtotime($detail['tgl_pengajuan']));
                            echo $formattedDate;
                            ?>
                        </div>
                    </div>
                    <hr>

                    <hr>

                    <div class="accordion" id="accordionExample">
                        <div class="">
                            <div class="" id="headingOne">
                                <h5 class="mb-0">

                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <h1 style="font-family: Arial, sans-serif; color: #333;">Tracking Permintaan Peminjaman Buku</h1>
                                    <ul class="sessions" style="list-style: none; padding: 0; margin: 0;">
                                        <li class="li-diajukan" style="display: flex; align-items: center; margin-bottom: 20px; position: relative; padding-left: 40px;">
                                            <div class="time" style="font-weight: bold; color: #007bff; margin-right: 10px;">
                                                <?= $detail['tgl_pengajuan'] ?>
                                            </div>
                                            <p style="margin: 0; font-size: 16px; color: #555;">Permintaan Diajukan</p>
                                        </li>
                                        <?php if ($detail['tgl_proses'] != '0000-00-00 00:00:00') { ?>
                                            <li class="li-diproses" style="display: flex; align-items: center; margin-bottom: 20px; position: relative; padding-left: 40px;">
                                                <div class="time" style="font-weight: bold; color: #17a2b8; margin-right: 10px;">
                                                    <?= $detail['tgl_proses'] ?>
                                                </div>
                                                <p style="margin: 0; font-size: 16px; color: #555;">Permintaan Diproses</p>
                                            </li>
                                        <?php } ?>
                                        <?php if ($detail['tgl_selesai'] != '0000-00-00 00:00:00') { ?>
                                            <li class="li-selesai" style="display: flex; align-items: center; margin-bottom: 20px; position: relative; padding-left: 40px;">
                                                <div class="time" style="font-weight: bold; color: #28a745; margin-right: 10px;">
                                                    <?= $detail['tgl_selesai'] ?>
                                                </div>
                                                <p style="margin: 0; font-size: 16px; color: #555;">Permintaan Selesai</p>
                                                <p style="margin: 0; font-size: 14px; color: #555;">
                                                    Dengan Status: <?= $detail['status_akhir'] ?>
                                                </p>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalPengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Status Pengajuan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan "Selesai" jika akan mengubah status pengajuan menjadi selesai</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success"
                        href="/Admin/terimaPermintaan/<?= $detail['id'] ?>">Selesai</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('page-content'); ?>