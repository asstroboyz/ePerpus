<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Peminjam;
use App\Models\PeminjamModel;
use CodeIgniter\HTTP\ResponseInterface;

class DataPeminjam extends BaseController
{
    public function index()
    {
        session();
        $peminjam = new PeminjamModel();
        $data = [
            'peminjam' => $peminjam->getDataPeminjam(),
            'title' => 'Data Siswa Peminjam',
        ];
        return view('baru/data_peminjam/index', $data);
    }

    public function formTambah()
    {
        session();
        $data = [
            'title' => 'Form Tambah Data Siswa Peminjam',
        ];
        return view('baru/data_peminjam/add', $data);
    }
  public function add()
{
    // Validasi input NIS agar unik
    
    // Menginisialisasi model
    $peminjamModel = new PeminjamModel();

    // Mendapatkan data dari form
    $datapeminjam = [
        'nis' => $this->request->getVar('nis'),  // Pastikan kolom sesuai dengan tabel
        'nama' => $this->request->getVar('nama'),
        'kelas' => $this->request->getVar('kelas'),
        'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
        'alamat' => $this->request->getVar('alamat'),
        'no_hp' => $this->request->getVar('no_hp')
    ];

    // Memasukkan data ke database
    $peminjamModel->insert($datapeminjam);

    // Pesan sukses setelah data berhasil ditambahkan
    session()->setFlashData('pesan_tambah', "Data Siswa Peminjam Berhasil Ditambah");
    return redirect()->to('datapeminjam');
}


    // edit
    public function edit($id)
    {
        session();
        $model = new PeminjamModel();
        $getPeminjam = $model->getDataPeminjam($id)->getRow();

        if (isset($getPeminjam)) {
            $data = [
                'title' => 'Edit Data Peminjam ' . $getPeminjam->nama,
                'peminjam' => $getPeminjam
            ];
            return view('/data_peminjam/edit', $data);
        } else {
            session()->setFlashData('pesan_edit', 'Id tidak ditemukan');
            return redirect()->to('/data_peminjam');
        }
    }

    public function update($id)
    {

        $peminjamModel = new PeminjamModel();
        $datapeminjam = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp')
        ];
        // dd($datapeminjam);
        $peminjamModel->update($id, $datapeminjam);
        session()->setFlashData('pesan_tambah', "Data Siswa Peminjam Berhasil Ditambah");
        return redirect()->to('datapeminjam');
    }

    // Hapus
    public function hapus($id)
    {
        $model = new PeminjamModel();
        $getDataPeminjam = $model->getDataPeminjam($id)->getRow();
        if (isset($getDataPeminjam)) {
            $model->hapusDataPeminjam($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('/datapeminjam');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('/datapeminjam');
        }
    }
}
