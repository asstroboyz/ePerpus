<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamModel extends Model
{
    protected $table            = 'datasiswa_peminjam';
    protected $primaryKey       = 'id_siswa_peminjam';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_siswa_peminjam', 'id_user', 'kelas', 'alamat', 'no_hp'];

    protected bool $allowEmptyInserts = false;

    public function getDataPeminjam($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_siswa_peminjam' => $id]);
        }
    }

    public function hapusDataPeminjam($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_siswa_peminjam' => $id]);
    }
}
