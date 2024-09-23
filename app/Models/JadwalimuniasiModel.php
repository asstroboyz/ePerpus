<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalimunisasiModel extends Model
{
    protected $table = 'jadwal_imunisasi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_posyandu',
        'alamat_posyandu',
        'kader_posyandu',
        'bidan',
        'tanggal',
        'jam',
        'created_at',
        'updated_at'
    ];

    
    public function getJadwalLengkap($id = false)
    {
        $builder = $this->db->table($this->table);

        if ($id == false) {
            return $builder->select('nama_posyandu, alamat_posyandu, kader_posyandu, bidan, tanggal, jam')
                           ->get()->getResultArray(); // Mengambil semua data lengkap jadwal
        }
        
        return $builder->select('nama_posyandu, alamat_posyandu, kader_posyandu, bidan, tanggal, jam')
                       ->where('id', $id)
                       ->get()->getRowArray(); // Mengambil data jadwal imunisasi berdasarkan id
    }

    // Method untuk mendapatkan jadwal yang berlangsung pada hari ini
    public function getJadwalHariIni()
    {
        return $this->where('tanggal', date('Y-m-d'))->findAll(); // Mengambil semua jadwal yang berlangsung hari ini
    }
}
