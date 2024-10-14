<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisBukuModel;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;

class JenisBuku extends BaseController
{
    public function index()
    {
        session();
        $model = new JenisBukuModel();
        $data = [
            'buku' => $model->getDataBuku(),
            'title' => 'Data Jenis Buku',
        ];
        return view('baru/jenis_buku/index', $data);
    }

    public function formTambah()
    {
        session();
        $data = [
            'title' => 'Form Tambah Data Jenis Buku',
        ];
        return view('baru/jenis_buku/add', $data);
    }
    public function add()
    {
        if (!$this->validate([
            'kode_buku' => [
                'rules' => 'is_unique[jenis_buku.kode_buku]',
                'errors' => [
                    'is_unique' => 'Kode Buku Sudah Ada, Silahkan periksa lagi kode buku yang anda masukkan'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = $validation->getError('kode_buku');
            $session = session();
            $session->setFlashdata('pesan_error', $error);
            return redirect()->back()->withInput();
        }

        $model = new JenisBukuModel();
        $data = [
            'kode_buku' => strtoupper($this->request->getVar('kode_buku')),
            'judul_buku' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'tempat_terbit' => $this->request->getVar('tempat_terbit'),
            'jumlah_buku' => $this->request->getVar('jumlah_buku'),
            'isbn' => $this->request->getVar('isbn'),
        ];
        // dd($data);
        $model->insert($data);
        session()->setFlashData('pesan_tambah', "Data Jenis Buku Berhasil Ditambah");
        return redirect()->to('databuku');
    }

    // edit
    public function edit($id)
    {
        session();
        $model = new JenisBukuModel();
        $getBuku = $model->getDataBuku($id)->getRow();

        if (isset($getBuku)) {
            $data = [
                'title' => 'Edit Data Buku ' . $getBuku->judul_buku,
                'buku' => $getBuku
            ];
            return view('/jenis_buku/edit', $data);
        } else {
            session()->setFlashData('pesan_edit', 'Kode Buku tidak ditemukan');
            return redirect()->to('/jenis_buku');
        }
    }

    public function update($id)
    {
        $model = new JenisBukuModel();
        $data = [
            'kode_buku' => $id,
            'judul_buku' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'tempat_terbit' => $this->request->getVar('tempat_terbit'),
            'jumlah_buku' => $this->request->getVar('jumlah_buku'),
            'isbn' => $this->request->getVar('isbn'),
        ];

        $model->update($id, $data);
        session()->setFlashData('pesan_edit', "Data Jenis Buku Berhasil Diubah");
        return redirect()->to('databuku');
    }


    // Hapus
    public function hapus($id)
    {
        $model = new JenisBukuModel();
        $getData = $model->getDataBuku($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataBuku($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('/databuku');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('/databuku');
        }
    }

    public function cetakLaporan()
    {
        $model = new JenisBukuModel();
        $data['laporan'] = $model->getDataBuku();

        // dd($data);

        $laporan = view('baru/jenis_buku/laporanCetak', $data);

        $filename = 'LaporanDataBuku-' . date('y-m-d-H-i-s');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml($laporan);

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
