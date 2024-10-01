<div class="container-fluid nav-bar px-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a href="#" class="navbar-brand p-0">
                <img src="<?= base_url('assets/logo1.png'); ?>"
                    alt="Logo" class="img-fluid" style="max-height: 50px;">
                e-Posyandu
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="<?= base_url() ?>"
                        class="nav-item nav-link active">Home</a>
                   
                    <a href="<?= base_url() ?>/#statistik-anak" class="nav-item nav-link">Jumlah anak</a>
                    <a href="<?= base_url() ?>/#jadwal-imunisasi"
                    class="nav-item nav-link">Jadwal</a>
                    <a href="<?= base_url('Home/cariAnak'); ?>"
                        class="nav-item nav-link">Cari Riwayat Anak</a>

                </div>
                <a class="btn btn-dark rounded-pill py-2 px-4 ms-2"
                    href="<?= base_url() ?>/user">Login</a>
            </div>
        </div>
    </nav>
</div>