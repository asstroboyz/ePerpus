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
    protected $allowedFields    = ['id_kunjungan', 'id_user','tanggal_kunjungan'];

    public function getDataKunjungan($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_kunjungan' => $id]);
        }
    }
    public function getDataPengunjung()
    {
        return $this->select('kunjungan.*, users.username, users.fullname, users.nis, users.kelas, users.alamat, users.no_hp')
            ->join('users', 'users.id = kunjungan.id_user')
            ->findAll();
    }
    public function hapusDataKunjungan($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_kunjungan' => $id]);
    }
}
