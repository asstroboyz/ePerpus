<?php

namespace App\Controllers;

use App\Models\DataBalitaModel;
use App\Models\JadwalimunisasiModel;

class Home extends BaseController
{
    protected $DataBalitaModel;
    protected $JadwalimunisasiModel;
    public function __construct()
    {
        $this->DataBalitaModel = new DataBalitaModel();
        $this->JadwalimunisasiModel = new JadwalimunisasiModel();
    }
    public function index()
    {
        $userModel = new \Myth\Auth\Models\UserModel(); // Pastikan ini mengacu ke Myth\Auth UserModel
$users = $userModel->findAll(); // Mengambil semua user sebagai objek

// Ambil semua data jadwal imunisasi
$jadwal = $this->JadwalimunisasiModel->findAll();

// Gabungkan data jadwal dengan username dari tabel users
foreach ($jadwal as &$item) {
    // Inisialisasi 'username' agar tidak undefined
    $item['username'] = 'Unknown'; // Jika tidak ditemukan user, tampilkan 'Unknown'
        
    // Cari user yang sesuai dengan user_id di kader_posyandu
    foreach ($users as $user) {
        if ($user->id == $item['kader_posyandu']) { // Akses properti sebagai objek
            $item['username'] = $user->username; // Akses username sebagai properti objek
            break; // Berhenti mencari setelah ditemukan
        }
    }
}

        $data = [
            'title' => 'Daftar Jadwal Imunisasi',
             'jadwal' => $jadwal,
            'jumlah_balita' => $this->DataBalitaModel->getTotalBalita(),
        ];
    //   dd($data);
        //  $data['jumlah_balita'] = $this->DataBalitaModel->getJumlahBalitaPerPosyandu();
        return view('page/templates/content', $data);
    }

    public function cariAnak()
    {

        return view('page/cariAnak/index');

    }

    public function cariPeserta()
    {
        // Inisialisasi model
        $dataBalitaModel = new DataBalitaModel();

        // Cek apakah ada request POST
        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $nama = $this->request->getPost('nama');
            $nik_ortu = $this->request->getPost('nik_ortu');
            $nik_balita = $this->request->getPost('nik_balita');
            $no_kk = $this->request->getPost('no_kk');

            // Cari data peserta berdasarkan input
            $peserta = $dataBalitaModel->where('nama', $nama)
                                       ->where('nik_ortu', $nik_ortu)
                                       ->where('nik_balita', $nik_balita)
                                       ->where('no_kk', $no_kk)
                                       ->first();

            // Jika data ditemukan
            if ($peserta) {
                return view('page/templates/index', [
                    'peserta' => [$peserta], // Kirim data peserta sebagai array
                ]);
            } else {
                // Jika tidak ditemukan
                return view('page/templates/index', [
                    'peserta' => [], // Kirim array kosong dan error
                    'error' => 'Data tidak ditemukan atau tidak valid.'
                ]);
            }
        }

        // Tampilkan form pencarian jika tidak ada POST
        return view('page/templates/index', [
            'peserta' => null, // Kondisi tanpa hasil pencarian
        ]);
    }

public function search()
{
    $model = new DataBalitaModel();

    // Ambil data dari form pencarian
    $nama = $this->request->getGet('nama');
    $nik_balita = $this->request->getGet('nik_balita');
    $no_kk = $this->request->getGet('no_kk');

    // Lihat data inputan dari form
    // dd($this->request->getGet()); // Akan menampilkan semua input dari form

    // Buat query untuk pencarian
    $query = $model->where('1=1'); // Kondisi awal, selalu benar
    if (!empty($nama)) {
        $query->like('nama', $nama);
    }
    if (!empty($nik_balita)) {
        $query->like('nik_balita', $nik_balita);
    }
    if (!empty($no_kk)) {
        $query->like('no_kk', $no_kk);
    }

    // Dapatkan hasil pencarian
    $data['balita'] = $query->findAll();

    // Lihat hasil query
    // dd($data['balita']); // Akan menampilkan hasil query sebelum di-return ke view

    return view('page/cariAnak/index', $data);
}


}
