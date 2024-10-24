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

    public function getDetailPermintaan($id = false)
    {
        if ($id == false) {
            return $this
                ->select('detail_permintaan_peminjaman.*,permintaan_peminjaman.tgl_permintaan, jenis_buku.judul_buku')
                ->join('jenis_buku', 'jenis_buku.kode_buku = detail_permintaan_peminjaman.kode_buku')
                ->join('permintaan_peminjaman', 'permintaan_peminjaman.permintaan_peminjaman_id = detail_permintaan_peminjaman.id_permintaan_peminjaman')
                ->findAll();
        }

        return $this
            ->select('detail_permintaan_peminjaman.*,detail_permintaan_peminjaman.status,jenis_buku.*,permintaan_peminjaman.tgl_permintaan, detail_permintaan_peminjaman.id as id_detail_permintaan')
            ->join('jenis_buku', 'jenis_buku.kode_buku = detail_permintaan_peminjaman.kode_buku')
            ->join('permintaan_peminjaman', 'permintaan_peminjaman.permintaan_peminjaman_id = detail_permintaan_peminjaman.id_permintaan_peminjaman')
            ->where(['detail_permintaan_peminjaman.id' => $id])
            ->first();
    }
    public function getPermintaanProses($id = false)
    {
       
        return $this
            ->select('detail_permintaan_peminjaman.*,detail_permintaan_peminjaman.status,jenis_buku.*,permintaan_peminjaman.tgl_permintaan, detail_permintaan_peminjaman.id as id_detail_permintaan')
            ->join('jenis_buku', 'jenis_buku.kode_buku = detail_permintaan_peminjaman.kode_buku')
            ->join('permintaan_peminjaman', 'permintaan_peminjaman.permintaan_peminjaman_id = detail_permintaan_peminjaman.id_permintaan_peminjaman')
          
            ->where(['detail_permintaan_peminjaman.status' => 'diproses'])
            ->first();
    }
    public function hapusDataBuku($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id' => $id]);
    }
}
