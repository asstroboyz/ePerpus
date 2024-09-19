<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUlangan extends Model
{
    protected $table = 'ikut_ulangan';
    // protected $useTimestamps = true;
    protected $primarykey = 'id_tes';
    protected $allowedFields = ['id_tes', 'id_ulangan', 'id_siswa', 'list_soal', 'list_jawaban', 'jml_benar', 'nilai', 'tgl_mulai', 'tgl_selesai', 'status'];
}
