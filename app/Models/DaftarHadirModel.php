<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarHadirModel extends Model
{
    protected $table = 'daftar_hadir'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = [
        'jadwal_imunisasi_id', 
        'nama_peserta',        
        'status_kehadiran',    
        'created_at',          
        'updated_at'
    ];

    // Method untuk mendapatkan daftar hadir berdasarkan jadwal imunisasi
    public function getDaftarHadirByJadwal($jadwalImunisasiId)
    {
        return $this->where('jadwal_imunisasi_id', $jadwalImunisasiId)->findAll();
    }

   
    public function getJumlahHadirByJadwal($jadwalImunisasiId)
    {
        return $this->where('jadwal_imunisasi_id', $jadwalImunisasiId)
                    ->where('status_kehadiran', 'hadir') // Menghitung yang hadir
                    ->countAllResults();
    }

   
    public function getDaftarHadirLengkap()
    {
        return $this->select('daftar_hadir.*, jadwal_imunisasi.nama_posyandu, jadwal_imunisasi.tanggal, jadwal_imunisasi.jam')
                    ->join('jadwal_imunisasi', 'jadwal_imunisasi.id = daftar_hadir.jadwal_imunisasi_id') // Join ke tabel jadwal
                    ->findAll();
    }
}
