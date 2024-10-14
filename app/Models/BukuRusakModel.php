<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuRusakModel extends Model
{
    protected $table            = 'buku_rusak';
    protected $primaryKey       = 'kode_buku_rusak';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_buku_rusak', 'kode_buku', 'jumlah_buku_rusak'];

    protected bool $allowEmptyInserts = false;

    public function getDataBukuRusak($id = false)
    {
        if ($id === false) {
            return $this->table('buku_rusak')
                ->join('jenis_buku', 'jenis_buku.kode_buku = buku_rusak.kode_buku')
                ->get()->getResultArray();
        } else {
            return $this->getWhere(['kode_buku_rusak' => $id]);
        }
    }
    public function getDataBukuRusakBYKodeBuku($id = false)
    {
        if ($id === false) {
            return $this->table('buku_rusak')
                ->join('jenis_buku', 'jenis_buku.kode_buku = buku_rusak.kode_buku')
                ->get()->getResultArray();
        } else {
            return $this->getWhere(['kode_buku' => $id]);
        }
    }

    public function hapusDataBukuRusak($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['kode_buku' => $id]);
    }
}
