<?= $this->extend('page/templates/index'); ?>

<section class="content-section">
    <?= $this->section('content'); ?>

    <div class="header-carousel owl-carousel">
        <div class="container py-5">
            <div class="container-fluid mt-60">
                <div class="card shadow mb-4 mt-10">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pencarian Data Balita</h6>
                    </div>
                    <div class="card-body">
                        <!-- <form method="get" action="<?= base_url('home/search'); ?>" onsubmit="return validateForm()">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama">Nama Orang Tua</label>
                                        <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Masukkan Nama orang tua balita">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nik_ortu">NIK Orang Tua <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nik_ortu" name="nik_ortu" placeholder="Masukkan NIK Balita" maxlength="16" oninput="maskInput(this, 5)" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_kk">Nomor KK <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Masukkan No. KK" maxlength="16" oninput="maskInput(this, 5)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form> -->
<form method="get" action="<?= base_url('home/search'); ?>" onsubmit="return validateForm()">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="nama">Nama Orang Tua</label>
                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Masukkan Nama orang tua balita">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="nik_ortu">NIK Orang Tua <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nik_ortu_display" placeholder="Masukkan NIK Balita" maxlength="16" oninput="maskInput(this, 'nik_ortu')" required>
                <input type="hidden" id="nik_ortu" name="nik_ortu">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="no_kk">Nomor KK <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="no_kk_display" placeholder="Masukkan No. KK" maxlength="16" oninput="maskInput(this, 'no_kk')" required>
                <input type="hidden" id="no_kk" name="no_kk">
            </div>
        </div>
    </div>
    <div class="text-right mt-3">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form>

                    </div>
                </div>

                <!-- Tabel Hasil Pencarian -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hasil Pencarian Balita</h6>
                    </div>
                    <div class="card-body">
                        <?php if (isset($balita) && count($balita) > 0): ?>
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Balita</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Nama Orang Tua</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($balita as $index => $b): ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= esc($b['nama']); ?></td>
                                            <td><?= esc($b['jenis_kelamin']); ?></td>
                                            <td><?= esc($b['tgl_lahir']); ?></td>
                                            <td><?= esc($b['nama_ortu']); ?></td>
                                            <td><?= esc($b['alamat']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="text-center">Data yang Anda cari tidak ditemukan. Silakan periksa kembali inputan Anda.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
function maskInput(displayInput, hiddenInputId) {
    const originalValue = displayInput.value.replace(/\*/g, '');
    const maskedValue = originalValue.slice(0, -4).replace(/./g, '*') + originalValue.slice(-4);
    displayInput.value = maskedValue;
    
    document.getElementById(hiddenInputId).value = originalValue;
}

function validateForm() {
    // Implement your form validation logic here
    return true;
}
</script>
    <?= $this->endSection(); ?>
</section>
