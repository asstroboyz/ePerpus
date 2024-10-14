<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataKunjunganModel;
use CodeIgniter\HTTP\ResponseInterface;

class DataKunjungan extends BaseController
{
    public function index()
    {
        session();
        $kunjungan = new DataKunjunganModel();
        $data = [
            'kunjungan' => $kunjungan->getDataKunjungan(),
            'title' => 'Data Kunjungan Perpustakaaan',
        ];
        return view('/data_kunjungan/index', $data);
    }
    public function formTambah()
    {
        session();
        $data = [
            'title' => 'Form Tambah Data Kunjungan Perpustakaan',
        ];
        return view('/data_kunjungan/add', $data);
    }
    public function add()
    {
        $kunjungan = new DataKunjunganModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'keanggotaan' => $this->request->getVar('keanggotaan'),
        ];
        $kunjungan->insert($data);
        session()->setFlashData('pesan_tambah', "Data Kunjungan Berhasil Ditambah");
        return redirect()->to('datakunjungan');
    }

    // edit
    public function edit($id)
    {
        session();
        $model = new DataKunjunganModel();
        $getKunjungan = $model->getDataKunjungan($id)->getRow();

        if (isset($getKunjungan)) {
            $data = [
                'title' => 'Edit Data Kunjungan ' . $getKunjungan->nama,
                'kunjungan' => $getKunjungan
            ];
            return view('/data_kunjungan/edit', $data);
        } else {
            session()->setFlashData('pesan_edit', 'Id tidak ditemukan');
            return redirect()->to('/data_kunjungan');
        }
    }

    public function update($id)
    {

        $kunjungan = new DataKunjunganModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'keanggotaan' => $this->request->getVar('keanggotaan'),
        ];
        // dd($data);
        $kunjungan->update($id, $data);
        session()->setFlashData('pesan_tambah', "Data Siswa Peminjam Berhasil Diupdate");
        return redirect()->to('datakunjungan');
    }

    // Hapus
    public function hapus($id)
    {
        $model = new DataKunjunganModel();
        $getData = $model->getDataKunjungan($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataKunjungan($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('/datakunjungan');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('/datakunjungan');
        }
    }
}
