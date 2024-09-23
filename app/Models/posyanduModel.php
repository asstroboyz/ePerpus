<?php

namespace App\Models;

use CodeIgniter\Model;

class PosyanduModel extends Model
{
    protected $table = 'posyandu'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key dari tabel posyandu
      protected $allowedFields = ['nama_posyandu', 'alamat_posyandu', 'kader_posyandu', 'created_at', 'updated_at'];


    // Method untuk mendapatkan data posyandu
    public function getPosyandu($id = false)
    {
        if ($id == false) {
            return $this->findAll(); // Mengambil semua data posyandu
        }
        return $this->where(['id' => $id])->first(); // Mengambil data posyandu berdasarkan id
    }

    public function getPosyanduWithKader()
    {
        return $this->select('posyandu.*, users.username AS kader_username')
                    ->join('users', 'users.id = posyandu.kader_posyandu')
                    ->findAll(); 
    }
   
}
