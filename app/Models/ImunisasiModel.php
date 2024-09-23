<?php

namespace App\Models;

use CodeIgniter\Model;

class ImunisasiModel extends Model
{
    protected $table = 'imunisasi';
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['nama', 'jenis_kelamin', 'tgl_lahir', 'nama_ortu', 'posyandu_id', 'bb_awal', 'tb_awal', 'bb_u', 'tb_u', 'bb_tb', 'jenis_imunisasi', 'tgl_imunisasi', 'keterangan'];

    public function getImunisasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getTotalImunisasi()
    {
        $builder = $this->db->table($this->table)
                            ->select('COUNT(*) as total_imunisasi');
        
        $result = $builder->get()->getRow();
        return $result ? $result->total_imunisasi : 0;
    }
}
