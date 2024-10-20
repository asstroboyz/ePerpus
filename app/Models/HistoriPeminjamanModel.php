<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriPeminjamanModel extends Model
{
    protected $table            = 'histori_peminjaman';
    protected $primaryKey       = 'id_histori';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_histori', 'tgl_status', 'keterangan', 'kode_pinjam'];

    protected bool $allowEmptyInserts = false;

    public function getDataPeminjam($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_histori' => $id]);
        }
    }

    public function hapusDataPeminjam($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_histori' => $id]);
    }
}
