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
        if ($id === false) {
            // Jika tidak ada ID yang diberikan, kembalikan semua data
            return $this->findAll();
        }
    
        // Jika ada ID, kembalikan data yang sesuai dengan ID
        return $this->where('permintaan_peminjaman_id', $id)->first();
    }
    

   
}
