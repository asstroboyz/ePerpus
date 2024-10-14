<?= $this->extend('Admin/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <?php if (session()->has('pesanError')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session('pesanError') ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Daftar Hadir Balita</h6>
                    <button type="button" class="btn btn-secondary" id="add-balita">Tambah Balita</button>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Admin/saveDaftarhadir'); ?>" method="post">
                        <?= csrf_field(); ?>

                        <div id="balita-forms" class="row">
                            <!-- Form Balita akan ditambahkan di sini -->
                            <div class="col-lg-6 mb-3">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h6 class="m-0 font-weight-bold text-primary">Data Balita</h6>
                                        <!-- <button type="button" class="close" onclick="removeBalitaForm(this)" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama[]">Nama Balita</label>
                                            <input type="text" class="form-control" name="nama[]" value="<?= old('nama.0'); ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_kelamin[]">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin[]" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L" <?= old('jenis_kelamin.0') == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                                                <option value="P" <?= old('jenis_kelamin.0') == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_lahir[]">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir[]" value="<?= old('tgl_lahir.0'); ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_ortu[]">Nama Orang Tua</label>
                                            <input type="text" class="form-control" name="nama_ortu[]" value="<?= old('nama_ortu.0'); ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="posyandu_id[]">Posyandu</label>
                                            <select class="form-control" name="posyandu_id[]" required>
                                                <option value="">Pilih Posyandu</option>
                                                <?php foreach ($posyandus as $p) : ?>
                                                    <option value="<?= $p['id']; ?>" <?= old('posyandu_id.0') == $p['id'] ? 'selected' : ''; ?>><?= $p['nama_posyandu']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-balita').addEventListener('click', function() {
        const balitaForms = document.getElementById('balita-forms');

        // Buat form baru tanpa menggunakan formCount
        const newForm = `
        <div class="col-lg-6 mb-3">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Data Balita</h6>
                    <button type="button" class="close" onclick="removeBalitaForm(this)" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama[]">Nama Balita</label>
                        <input type="text" class="form-control" name="nama[]" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin[]">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin[]" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir[]">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir[]" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_ortu[]">Nama Orang Tua</label>
                        <input type="text" class="form-control" name="nama_ortu[]" required>
                    </div>

                    <div class="form-group">
                        <label for="posyandu_id[]">Posyandu</label>
                        <select class="form-control" name="posyandu_id[]" required>
                            <option value="">Pilih Posyandu</option>
                            <?php foreach ($posyandus as $p) : ?>
                                <option value="<?= $p['id']; ?>"><?= $p['nama_posyandu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    `;

        // Tambahkan form baru ke dalam kontainer
        balitaForms.insertAdjacentHTML('beforeend', newForm);
    });

    // Fungsi untuk menghapus form balita
    function removeBalitaForm(button) {
        const formCard = button.closest('.col-lg-6');
        formCard.remove();
    }
</script>
<?= $this->endSection(); ?>