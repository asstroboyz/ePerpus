<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalimunisasiModel extends Model
{
    protected $table = 'jadwal_imunisasi';
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['posyandu_id', 'nama_bidan', 'waktu'];

    public function getJadwalImunisasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getTotalJadwal()
    {
        $builder = $this->db->table($this->table)
                            ->select('COUNT(*) as total_jadwal_imunisasi');
        
        $result = $builder->get()->getRow();
        return $result ? $result->total_jadwal_imunisasi : 0;
    }
}
