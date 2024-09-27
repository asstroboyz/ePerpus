<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBalitaDetailModel extends Model
{
    protected $table = 'data_balita_detail';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = [
        'bb_u', //
        'bb_tb', //
        'tb_u', //
        'rambu_gizi', //
        'jenis_imunisasi_id', //
        'tgl_pemeriksaan', //
        'asi_eks', //
        'no_hp', //
        'bb_awal', //
        'tb_awal', //
        'lk_awal', //
        'balita_id'//
    ];


    public function getPengecekan($id = false)
    {
        if ($id == false) {
            return $this
                ->join('data_balita', 'data_balita.id = data_balita_detail.balita_id')
                ->findAll();
        }

        return $this
            ->where(['id_detail' => $id])
            ->join('data_balita', 'data_balita.id = data_balita_detail.balita_id')
            ->first();
    }
    
    public function getBalitaDetail($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_detail' => $id])->first();
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
            ->join('jenis_imunisasi', 'jenis_imunisasi.id_detail = data_balita_detail.jenis_imunisasi_id_detail') // Menggunakan join untuk mengambil data jenis imunisasi terkait
            ->findAll();
    }
}