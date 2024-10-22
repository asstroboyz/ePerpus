<?php

namespace App\Models;

use CodeIgniter\Model;

class PermintaanPeminjamanModel extends Model
{
    protected $table            = 'permintaan_peminjaman';
    protected $primaryKey       = 'permintaan_peminjaman_id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['permintaan_peminjaman_id', 'tgl_permintaan', 'id_user'];

    protected bool $allowEmptyInserts = false;

    public function getDataPermintaan($id = false)
    {
        return $this->findAll(); 
    }

   
}
