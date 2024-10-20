<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'kode_pinjam';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
     protected $allowedFields    = ['kode_pinjam', 'id_siswa_peminjaman', 'kode_buku', 'tanggal_pinjam', 'tanggal_pengembalian', 'status','jumlah_pinjam','kondisi_buku','id_user'];


    public function getDataPeminjaman($id = false)
    {
        if ($id === false) {
            return $this->table('peminjaman')
                ->join('jenis_buku', 'jenis_buku.kode_buku = peminjaman.kode_buku')
                ->join('datasiswa_peminjam', 'datasiswa_peminjam.id = peminjaman.nis')
                ->get()->getResultArray();
        } else {
            return $this->getWhere(['kode_pinjam' => $id]);
        }
    }

    public function laporan($tgl_awal, $tgl_akhir)
    {
        return $this->table('peminjaman')
            ->join('jenis_buku', 'jenis_buku.kode_buku = peminjaman.kode_buku')
            ->join('datasiswa_peminjam', 'datasiswa_peminjam.id = peminjaman.nis')
            ->where('tanggal_pinjam >=', $tgl_awal)
            ->where('tanggal_pinjam <=', $tgl_akhir)
            ->orderBy('peminjaman.kode_buku', 'ASC')
            ->get()->getResultArray();
    }

    public function getRowDataPeminjaman()
    {
        return $this->table('peminjaman')
            ->join('jenis_buku', 'jenis_buku.kode_buku = peminjaman.kode_buku')
            ->join('datasiswa_peminjam', 'datasiswa_peminjam.id = peminjaman.nis')
            ->get()->getRow();
    }

    public function hapusDataPeminjaman($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['kode_pinjam' => $id]);
    }
}
