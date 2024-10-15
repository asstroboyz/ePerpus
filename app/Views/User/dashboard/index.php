<?= $this->extend('user/layout/index'); ?>

<?= $this->section('content'); ?>
<style>
    body {
        background: rgba(255, 255, 255, 0.6);
        background-image: url('/img/logo.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        /* background-position: center; */
        background-position-x: 60%;
        background-position-y: 50%;
        background-size: 400px 400px;
    }

    body:before {
        content: "";
        background: rgba(255, 255, 255, 0.6);
        position: absolute;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    }
</style>
<center>

    <h1>Selamat datang di E-Perpus SMPN 6 Batang</h1>
</center>
<?= $this->endSection(); ?>