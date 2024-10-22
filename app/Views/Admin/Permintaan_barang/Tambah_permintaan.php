<?= $this->extend('admin/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="card mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <i class="fas fa-table me-1"></i>
                <?= $title; ?>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url('user/kunjungan'); ?>"
                    class="btn btn-sm btn-secondary float-end">
                    <i class="fas fa-arrow-circle-left me-1"></i>Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>

        <?php if ($validation->getErrors()): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors(); ?>
        </div>
        <?php endif; ?>

        <form
            action="<?= base_url('admin/simpanPermintaan'); ?>"
            method="post" onsubmit="return validateForm()">
            <?= csrf_field(); ?>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="kode_buku">Pilih Buku</label>
                    <select name="kode_buku" id="kode_buku" class="form-control" required>
                        <option value="">Pilih Buku</option>
                        <?php foreach ($barangList as $brg) : ?>
                        <option
                            value="<?= $brg['kode_buku']; ?>"
                            data-satuan="<?= $brg['judul_buku']; ?>"
                            data-jumlah="<?= $brg['jumlah_buku']; ?>"
                            data-pengarang="<?= $brg['pengarang']; ?>"
                            data-penerbit="<?= $brg['penerbit']; ?>">
                            <?= $brg['penerbit']; ?>(<?= $brg['isbn']; ?>)
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('kode_buku'); ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="jumlah_buku">Jumlah Buku Tersedia:</label>
                        <input type="text" id="jumlah_buku" name="jumlah_buku" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="pengarang">Pengarang:</label>
                        <input type="text" id="pengarang" name="pengarang" class="form-control" readonly required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="penerbit">Penerbit:</label>
                        <input type="text" id="penerbit" name="penerbit" class="form-control" readonly required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="jumlah">Jumlah Peminjaman:</label>
                        <input type="number" id="jumlah" name="jumlah" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('kode_buku').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var pengarang = selectedOption.getAttribute('data-pengarang');
        var penerbit = selectedOption.getAttribute('data-penerbit');
        var jumlahbuku = selectedOption.getAttribute('data-jumlah');

        // Mengisi input pengarang, penerbit, dan jumlah buku
        document.getElementById('pengarang').value = pengarang || '';
        document.getElementById('penerbit').value = penerbit || '';
        document.getElementById('jumlah_buku').value = jumlahbuku || '';
        document.getElementById('jumlah').value = ''; // Reset jumlah peminjaman
    });

    function validateForm() {
        var jumlahBuku = parseInt(document.getElementById('jumlah_buku').value);
        var jumlahPeminjaman = parseInt(document.getElementById('jumlah').value);

        if (jumlahPeminjaman > jumlahBuku) {
            alert('Jumlah peminjaman tidak boleh melebihi jumlah buku yang tersedia.');
            return false;
        }
        return true;
    }
</script>

<?= $this->endSection(); ?>