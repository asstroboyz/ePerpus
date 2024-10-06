<?=$this->extend('Admin/Templates/Index')?>

<?=$this->section('page-content')?>



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                               <div class="col-md-12">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?=view('Myth\Auth\Views\_message_block')?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-header"> -->

                    <!-- <h3>Daftar Pengguna</h3>
                        <a href="#" class="btn btn-primary"
                            data-id="<?=$row->id;?>"
                    data-toggle="modal" data-target="#tambahUserModal">
                    <i class="fas fa-plus"> Tambah</i>
                    </a>
                </div> -->
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h3 class="m-0">Daftar Pengguna</h3>
                    <a href="#" class="btn btn-primary"
                        data-id="<?=$row->id;?>" data-toggle="modal"
                        data-target="#tambahUserModal"><i class="fa fa-plus"></i> Tambah
                        Pengguna</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align:center;">
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>

                                    <th>Nama Posyandu</th>
                                    <!-- activasi user berfungsi hanya saja di nonaktifkan -->
                                    <!-- <th>Active User</th> -->
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr style="text-align:center;">
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>

                                    <th>Nama Posyandu</th>
                                    <!-- <th>Active User</th> -->
                                    <th>Opsi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
$no = 1;

foreach ($users as $rw) {
    $row = "row" . $rw->id;
    echo $$row;
}
?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>




        </div>
    </div>

    </div>

</section>

<div class="modal fade" id="tambahUserModal" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi modal (formulir tambah user) -->
                <form class="user"
                    action="<?=url_to('register')?>"
                    method="post">
                    <?=csrf_field()?>
                    <!-- Isian formulir tambah user -->
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="username" placeholder="Username"
                            value="<?=old('username')?>">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="Email"
                            value="<?=old('email')?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L" <?=old('jenis_kelamin') == 'L' ? 'selected' : '';?>>Laki-laki
                            </option>
                            <option value="P" <?=old('jenis_kelamin') == 'P' ? 'selected' : '';?>>Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="posisi">Posisi</label>
                        <select class="form-control" id="posisi" name="posisi" required>
                            <option value="">Pilih Posisi</option>
                            <option value="kader" <?=old('posisi') == 'kader' ? 'selected' : '';?>>Kader
                            </option>
                            <option value="bidan" <?=old('posisi') == 'bidan' ? 'selected' : '';?>>Bidan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="posyandu_id">Nama Posyandu</label>
                        <select name="posyandu_id" class="form-control">
                             <option value="">Pilih Posyandu</option>
                            <?php foreach ($posyandus as $posyandu): ?>

                            <option
                                value="<?=htmlspecialchars($posyandu['id'], ENT_QUOTES, 'UTF-8');?>">
                                <?=htmlspecialchars($posyandu['nama_posyandu'], ENT_QUOTES, 'UTF-8');?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <input type="hidden" name="groupNamesString"
                        value="<?=$groupNamesString;?>">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" name="password"
                                placeholder="Password" autocomplete="off">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" name="pass_confirm" class="form-control form-control-user"
                                placeholder="Repeat Password" autocomplete="off">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark btn-user btn-block">
                        Tambah User
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Ubah Grup -->
<form action="<?=base_url();?>/Admin/changeGroup" method="post">
    <?=csrf_field()?>
    <div class="modal fade" id="changeGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Grup</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-4 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span class="card-title">Grup</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <select name="group" class="form-control" data-toggle="select">
                                    <?php
foreach ($groups as $key => $row) {
    ?>
                                    <option value="<?=$row->id;?>">
                                        <?=$row->name;?>
                                    </option>
                                    <?php
}
?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form action="<?=base_url();?>Admin/changePassword" method="post">
    <div class="modal fade" id="ubah_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-4 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span class="card-title">username</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <input type="text" class="form-control" id="username" name="username" readonly>
                                <input hidden type="text" class="form-control" value="" id="user_id" name="user_id">
                            </div>
                        </div>
                        <br>
                        <div class="row align-items-start">
                            <div class="col-md-4 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span class="card-title">Password Baru</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <input type="password" class="form-control" name="password_baru">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        // Menghilangkan alert setelah 3 detik (3000 ms)
        setTimeout(function() {
            $('.alert').alert('close');
        }, 1200);
    });
</script>
<?=$this->endSection()?>