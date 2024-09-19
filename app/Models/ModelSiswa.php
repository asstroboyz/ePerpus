<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    protected $table = 'siswa';
    protected $useTimestamps = true;
    protected $primarykey = 'id';
    protected $allowedFields = ['id', 'user_id', 'id_kelas', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'no_hp', 'alamat', 'nama_orangtua', 'pekerjaan_orangtua', 'foto', 'status_pembayaran'];
}
