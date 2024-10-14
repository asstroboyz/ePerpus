<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuRusakModel;
use App\Models\JenisBukuModel;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;

class DataBukuRusak extends BaseController
{
    public function index()
    {
        session();
        $model = new BukuRusakModel();
        $data = [
            'bukurusak' => $model->getDataBukuRusak(),
            'title' => 'Data Buku Rusak',
        ];

        return view('baru/buku_rusak/index', $data);
    }

    public function formTambah()
    {
        session();
        $modelBuku = new JenisBukuModel();
        $data = [
            'buku' => $modelBuku->getDataBuku(),
            'title' => 'Form Tambah Data Buku Rusak',
        ];
        return view('baru/buku_rusak/add', $data);
    }
    public function add()
    {
        if (!$this->validate([
            'kode_buku_rusak' => [
                'rules' => 'is_unique[buku_rusak.kode_buku_rusak]',
                'errors' => [
                    'is_unique' => 'Kode Buku Rusak Sudah Ada, Silahkan periksa lagi kode buku yang anda masukkan'
                ]
            ],
            'buku' => [
                'rules' => 'is_unique[buku_rusak.kode_buku]',
                'errors' => [
                    'is_unique' => 'Kode Buku Sudah Ada, Silahkan update jumlah pada data kode buku tersebut'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error1 = $validation->getError('kode_buku_rusak');
            $error2 = $validation->getError('buku');
            $session = session();
            $session->setFlashdata('pesan_error_kd_rusak', $error1);
            $session->setFlashdata('pesan_error_kd_buku', $error2);
            return redirect()->back()->withInput();
        }

        $model = new BukuRusakModel();
        $data = [
            'kode_buku_rusak' => strtoupper($this->request->getVar('kode_buku_rusak')),
            'kode_buku' => strtoupper($this->request->getVar('buku')),
            'jumlah_buku_rusak' => $this->request->getVar('jumlah_buku')
        ];
        // dd($data);
        $model->insert($data);
        session()->setFlashData('pesan_tambah', "Data Buku Rusak Berhasil Ditambah");
        return redirect()->to('databukurusak');
    }


    // edit
    public function edit($id)
    {
        session();
        $modelBuku = new JenisBukuModel();
        $model = new BukuRusakModel();
        $getBukuRusak = $model->getDataBukuRusak($id)->getRow();

        if (isset($getBukuRusak)) {
            $data = [
                'title' => 'Edit Data Buku ' . $getBukuRusak->kode_buku_rusak,
                'bukurusak' => $getBukuRusak,
                'buku' => $modelBuku->getDataBuku(),
            ];
            return view('baru/buku_rusak/edit', $data);
        } else {
            session()->setFlashData('pesan_edit', 'Kode Buku tidak ditemukan');
            return redirect()->to('/jenis_buku');
        }
    }

    public function update($id)
    {


        $model = new BukuRusakModel();
        $data = [
            'kode_buku_rusak' => $id,
            'kode_buku' => strtoupper($this->request->getVar('buku')),
            'jumlah_buku_rusak' => $this->request->getVar('jumlah_buku')
        ];
        $model->update($id, $data);
        session()->setFlashData('pesan_edit', "Data Buku Rusak Berhasil Diedit");
        return redirect()->to('databukurusak');
    }

    // Hapus
    public function hapus($id)
    {
        $model = new BukuRusakModel();
        $getData = $model->getDataBukuRusakBYKodeBuku($id)->getRow();
        // dd($getData);
        if (isset($getData)) {
            $model->hapusDataBukuRusak($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('/databukurusak');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('/databukurusak');
        }
    }

    public function cetakLaporan()
    {
        $model = new BukuRusakModel();
        $data['laporan'] = $model->getDataBukuRusak();
        $data['title'] = 'Laporan Data Buku Rusak';

        // dd($data);

        $laporan = view('baru/buku_rusak/laporanCetak', $data);

        $filename = 'LaporanDataBukuRusak-' . date('y-m-d-H-i-s');

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
