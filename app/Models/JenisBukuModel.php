<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisBukuModel extends Model
{
    protected $table            = 'jenis_buku';
    protected $primaryKey       = 'kode_buku';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_buku', 'judul_buku', 'pengarang', 'penerbit', 'tahun_terbit', 'tempat_terbit', 'jumlah_buku', 'isbn'];

    protected bool $allowEmptyInserts = false;

    public function getDataBuku($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kode_buku' => $id]);
        }

        return $this->findAll(); // Mengambil semua data buku
    }

      public function find($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['kode_buku' => $id])
            ->first();
    }
    public function hapusDataBuku($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id' => $id]);
    }
}
