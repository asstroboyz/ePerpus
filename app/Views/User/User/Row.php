
<tr>
    <td><?= $no; ?></td>
    <!-- <td><?= $row->id; ?></td> -->
    <td><?= $row->username; ?></td>
    <!-- <td><?= empty($group) ? '' : $group[0]['name']; ?>
    </td> -->
        <td><?= $row->email; ?></td>
    <td>  <?= ($row->id == 1) ? '' : $row->posisi; ?></td>

  

    <!-- <a href="<?= base_url('Admin/activateUser/' . $row->id . '/' . ($row->active == 1 ? 0 : 1)); ?>"
    class="btn btn-lg btn-circle btn-active-users" title="Klik untuk Mengaktifkan atau Menonaktifkan">
    <?= $row->active == 1 ? '<i class="fas fa-check-circle text-success fa-lg"></i>' : '<i class="fas fa-times text-danger fa-lg"></i>'; ?>
    </a> -->

    <td align="center">
        <!-- <a href="#" class="btn btn-warning btn-circle   btn-change-password" title="Ubah Password"
            data-id="<?= $row->id; ?>" data-toggle="modal"
        data-target="#ubah_password" data-id="<?= $row->id; ?>">

        <i class="fas fa-key"></i>
        </a> -->

        <a href="<?= base_url('Admin/activateUser/' . $row->id . '/' . ($row->active == 1 ? 0 : 1)); ?>"
            class="btn btn-circle"
            title="Klik untuk Mengaktifkan atau Menonaktifkan"
            style="width: 40px; height: 40px; background-color: #f9f9f9; border: 1px solid #ccc; color: #333;">
            <?= $row->active == 1 ? '<i class="fas fa-check-circle" style="color: green; font-size: 1.5em;"></i>' : '<i class="fas fa-times" style="color: red; font-size: 1.5em;"></i>'; ?>
        </a>


        <!-- <a href="#" class="btn btn-success btn-circle btn-change-group"
            data-id="<?= $row->id; ?>" title="Ubah Grup"
            style=" width: 40px; height: 40px; border-radius: 50%; border: 1px solid #28a745; background-color: #28a745; color: white;">
            <i class="fas fa-tasks" style="font-size: 1.2em;"></i>
        </a> -->
        <a href="#" class="btn btn-info btn-circle btn-detail" title="Detail"
            data-id="<?= $row->id; ?>" data-url="/Admin/detail/<?= $row->id; ?>"
            style=" width: 40px; height: 40px; border-radius: 50%; border: 1px solid #17a2b8; background-color: #17a2b8; color: white;">
            <i class="fa fa-info-circle" style="font-size: 1.2em;"></i>
        </a>

 <!-- <a href="#" class="btn btn-success btn-circle  btn-change-group"
            data-id="<?=$row->id;?>" title="Ubah Grup">
            <i class="fas fa-tasks"></i>
        </a>
        <a href="#" class="btn btn-info btn-circle btn-detail" title="Detail"
            data-id="<?=$row->id;?>"
            data-url="/Admin/detail/<?=$row->id;?>">
            <i class="fa fa-info-circle"></i>
        </a> -->



    </td>
</tr>