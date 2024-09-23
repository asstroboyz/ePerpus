<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBalitaModel extends Model
{
    protected $table = 'data_balita';
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['nama', 'jenis_kelamin', 'tgl_lahir', 'nama_ortu', 'posyandu_id'];

    public function getBalita($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
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
