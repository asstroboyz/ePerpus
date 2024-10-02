<?php

namespace App\Controllers;

use App\Models\DataBalitaModel;
use App\Models\JadwalimunisasiModel;
use App\Models\PosyanduModel;

class Home extends BaseController
{
    protected $DataBalitaModel;
    protected $JadwalimunisasiModel;
    public function __construct()
    {
        $this->DataBalitaModel = new DataBalitaModel();
        $this->JadwalimunisasiModel = new JadwalimunisasiModel();
        $this->PosyanduModel = new PosyanduModel();
    }
    public function index()
    {
        $userModel = new \Myth\Auth\Models\UserModel(); // Model untuk pengguna/kader
        $users = $userModel->findAll(); // Mengambil semua pengguna (kader)

        // Menginisialisasi model
        $jadwalModel = new JadwalimunisasiModel();
        $posyanduModel = new PosyanduModel(); // Model untuk posyandu

        // Mengambil data jadwal dengan join ke tabel posyandu dan users
        $data['jadwal'] = $jadwalModel
            ->select('jadwal_imunisasi.*, posyandu.nama_posyandu, posyandu.alamat_posyandu, users.username')
            ->join('posyandu', 'posyandu.id = jadwal_imunisasi.posyandu_id') // Join dengan tabel posyandu
            ->join('users', 'users.id = posyandu.kader_posyandu') // Join dengan tabel users
            ->findAll();

        $data['title'] = 'Daftar Jadwal Imunisasi'; // Judul untuk halaman
        $data['jumlah_balita'] = $this->DataBalitaModel->getTotalBalita();
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
        //     // Inisialisasi model
        //     $dataBalitaModel = new DataBalitaModel();

        //     // Cek apakah ada request GET
        //     if ($this->request->getMethod() === 'get') {
        //         // Ambil data dari query string
        //         $nama = $this->request->getGet('nama');
        //         $nik_ortu = $this->request->getGet('nik_ortu'); // Pastikan ini ada dalam URL atau diabaikan
        //         $nik_balita = $this->request->getGet('nik_balita');
        //         $no_kk = $this->request->getGet('no_kk');

        //         // Cari data peserta berdasarkan input
        //         $peserta = $dataBalitaModel->where('nama', $nama)
        //             ->where('nik_balita', $nik_balita)
        //             ->where('no_kk', $no_kk)
        //             // Anda bisa menambahkan nik_ortu jika ingin
        //             ->first();

        //         // Jika data ditemukan
        //         if ($peserta) {
        //             return view('page/templates/index', [
        //                 'peserta' => [$peserta], // Kirim data peserta sebagai array
        //             ]);
        //         } else {
        //             // Jika tidak ditemukan
        //             return view('page/templates/index', [
        //                 'peserta' => [], // Kirim array kosong dan error
        //                 'error' => 'Data tidak ditemukan atau tidak valid.'
        //             ]);
        //         }
        //     }

        //     // Tampilkan form pencarian jika tidak ada GET
        //     return view('page/templates/index', [
        //         'peserta' => null, // Kondisi tanpa hasil pencarian
        //     ]);
        // Inisialisasi model
        $balitaModel = new DataBalitaModel();

        // Cek apakah request menggunakan metode POST
        if ($this->request->getMethod() === 'post') {
            // Ambil data input dari form
            $nama = $this->request->getPost('nama');
            $nik_balita = $this->request->getPost('nik_balita');
            $no_kk = $this->request->getPost('no_kk');

            // Query data balita berdasarkan input
            $balita = $balitaModel->where('nama', $nama)
                ->where('nik_balita', $nik_balita)
                ->where('no_kk', $no_kk)
                ->findAll();

            // Kirim data balita ke view, baik ada hasil atau tidak
            return view('page/templates/index', [
                'balita' => $balita, // Mengirimkan data balita (array) ke view
            ]);
        }

        // Tampilkan form jika tidak ada POST
        return view('page/templates/index', [
            'balita' => null, // Tidak ada data yang dikirimkan di awal
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
