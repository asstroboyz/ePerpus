<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBalitaDetailModel extends Model
{
    protected $table = 'data_balita_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'bb_u',
        'bb_tb',
        'tb_u',
        'rambu_gizi',
        'jenis_imunisasi_id',
        'tgl',
        'asi_eks',
        'no_hp',
        'bb_awal',
        'tb_awal',
        'lk_awal',
        'balita_id'
    ];

    public function getBalitaDetail($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getTotalBalitaDetail()
    {
        $builder = $this->db->table($this->table)
            ->select('COUNT(*) as total_balita_detail');

        $result = $builder->get()->getRow();
        return $result ? $result->total_balita_detail : 0;
    }

    public function getBalitaDetailWithJenisImunisasi()
    {
        return $this->select('data_balita_detail.*, jenis_imunisasi.nama_imunisasi')
            ->join('jenis_imunisasi', 'jenis_imunisasi.id = data_balita_detail.jenis_imunisasi_id') // Menggunakan join untuk mengambil data jenis imunisasi terkait
            ->findAll();
    }
}