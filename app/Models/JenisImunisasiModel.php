<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisImunisasiModel extends Model
{
    protected $table = 'jenis_imunisasi';
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['usia_anak', 'jenis_imunisasi'];

    public function getJenisImunisasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getTotalJenisImunisasi()
    {
        $builder = $this->db->table($this->table)
                            ->select('COUNT(*) as total_jenis_imunisasi');
        
        $result = $builder->get()->getRow();
        return $result ? $result->total_jenis_imunisasi : 0;
    }
}
