<?php

namespace App\Models;

use CodeIgniter\Model;

class detailPermintaanPeminjamanModel extends Model
{
    protected $table            = 'detail_permintaan_peminjaman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'id_balasan_permintaan', 'id_permintaan_peminjaman', 'id_user','jumlah','tgl_pengajuan','tgl_proses','tgl_selesai','status','status_akhir','kode_buku'];

    protected bool $allowEmptyInserts = false;

    public function getDetailPeminjaman($id = false)
    {
        return $this->findAll();
    }

    public function hapusDataBuku($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id' => $id]);
    }
}
