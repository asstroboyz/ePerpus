<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisBukuModel extends Model
{
    protected $table            = 'jenis_buku';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','kode_buku', 'judul_buku', 'pengarang', 'penerbit', 'tahun_terbit', 'tempat_terbit', 'jumlah_buku', 'isbn'];

    protected bool $allowEmptyInserts = false;

    public function getDataBuku($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function hapusDataBuku($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id' => $id]);
    }
}
