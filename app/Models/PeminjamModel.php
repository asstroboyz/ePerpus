<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamModel extends Model
{
    protected $table            = 'datasiswa_peminjam';
    protected $primaryKey       = 'nis';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nis', 'nama', 'kelas', 'jenis_kelamin', 'alamat', 'no_hp'];

    protected bool $allowEmptyInserts = false;

    public function getDataPeminjam($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['nis' => $id]);
        }
    }

    public function hapusDataPeminjam($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['nis' => $id]);
    }
}
