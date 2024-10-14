<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKunjunganModel extends Model
{
    protected $table            = 'kunjungan';
    protected $primaryKey       = 'id_kunjungan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kunjungan', 'nama', 'keanggotaan'];

    public function getDataKunjungan($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_kunjungan' => $id]);
        }
    }

    public function hapusDataKunjungan($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_kunjungan' => $id]);
    }
}
