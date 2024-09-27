<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBalitaModel extends Model
{
    protected $table = 'data_balita';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jenis_kelamin', 'tgl_lahir', 'nama_ortu', 'posyandu_id','anak_ke','bbl','pbl','nik_balita','no_kk','nik_ortu','rt','rw','umur','bb_awal','tb_awal','lk_awal','tgl_pemeriksaan_awal'];

    public function getBalita($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    // menampilkan data balita by id posyandu yang login
    public function getBalitaWithIdPos($posyanduId)
    {
        return $this->select('data_balita.*, posyandu.nama_posyandu')
                ->join('posyandu', 'posyandu.id = data_balita.posyandu_id')
        ->where('posyandu_id', $posyanduId)->findAll(); // Ambil data balita berdasarkan ID posyandu
    }


    public function getTotalBalita()
    {
        $builder = $this->db->table($this->table)
            ->select('COUNT(*) as total_balita');

        $result = $builder->get()->getRow();
        return $result ? $result->total_balita : 0;
    }
    public function getBalitaWithPosyandu()
    {
        return $this->select('data_balita.*, posyandu.nama_posyandu')
            ->join('posyandu', 'posyandu.id = data_balita.posyandu_id') // Menggunakan join untuk mengambil data posyandu terkait
            ->findAll();
    }

    public function getJumlahBalitaPerPosyandu()
    {
        return $this->db->table('posyandu p')
            ->select('p.nama_posyandu, COUNT(b.id) AS jumlah_balita')
            ->join('data_balita b', 'p.id = b.posyandu_id', 'left')
            ->groupBy('p.nama_posyandu')
            ->get()
            ->getResultArray();
    }

}
