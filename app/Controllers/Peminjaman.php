<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisBukuModel;
use App\Models\PeminjamanModel;
use App\Models\PeminjamModel;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;

class Peminjaman extends BaseController
{
    public function index()
    {
        session();
        $model = new PeminjamanModel();
        $data = [
            'Peminjaman' => $model->getDataPeminjaman(),
            'title' => 'Data Peminjaman',
        ];
        return view('user/peminjaman/index', $data);
    }

    public function formTambah()
    {
        session();
        $modelBuku = new JenisBukuModel();
        $modelSiswa = new PeminjamModel();
        $data = [
            'buku' => $modelBuku->getDataBuku(),
            'siswa' => $modelSiswa->getDataPeminjam(),
            'title' => 'Form Tambah Data Peminjaman',
        ];
        return view('user/peminjaman/add', $data);
    }
    public function add()
    {
        $model = new PeminjamanModel();
        $DB = $model->getRowDataPeminjaman();
        ;
        $kodePinjam = date('d') . $this->request->getVar('buku')  . "-" . $this->request->getVar('siswa');
        if ($DB != null && $DB->kode_pinjam == $kodePinjam) {
            session()->setFlashData('pesan_pinjam', 'Siswa tersebut sudah meminjam buku ini, tidak boleh meminjam buku yang sama dalam waktu yang bersamaan');
            return redirect()->to('tambahdatapeminjaman')->withInput();
        } else {
            $data = [
                'nomor_buku' => $this->request->getVar('nomor'),
                'kode_pinjam' => $kodePinjam,
                'kode_buku' => $this->request->getVar('buku'),
                'nis' => $this->request->getVar('siswa'),
                'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                'tanggal_pengembalian' => $this->request->getVar('tanggal_kembali'),
                'jumlah_pinjam' => $this->request->getVar('jumlah'),
                'kondisi_buku' => $this->request->getVar('kondisi_buku'),
                'status' => "Belum Kembali"
            ];
            dd($data);
            $model->insert($data);
            session()->setFlashData('pesan_tambah', "Data Peminjaman Berhasil Ditambah");
            return redirect()->to('datapeminjaman');
        }
    }

    // Ubah Status
    public function ubahstatus($id)
    {
        $model = new PeminjamanModel();
        $data = [
            'status' => $this->request->getVar('status')
        ];

        $model->update($id, $data);
        return redirect()->to('datapeminjaman');
    }
    // Hapus
    public function hapus($id)
    {
        $model = new PeminjamanModel();
        $getData = $model->getDataPeminjaman($id)->getRow();
        // dd($getData);
        if (isset($getData)) {
            $model->hapusDataPeminjaman($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('/datapeminjaman');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('/datapeminjaman');
        }
    }

    public function cetakLaporan()
    {
        $model = new PeminjamanModel();
        $tanggal_awal = $this->request->getVar('tanggal1');
        $tanggal_akhir = $this->request->getVar('tanggal2');

        $data['laporan'] = $model->laporan($tanggal_awal, $tanggal_akhir);

        $laporan = view('baru/peminjaman/laporanCetak', $data);

        $filename = 'LaporanDataPeminjam-' . date('y-m-d-H-i-s');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml($laporan);

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }

    public function laporan()
    {
        session();

        $model = new PeminjamanModel();
        $tanggal_awal = $this->request->getVar('tanggal1');
        $tanggal_akhir = $this->request->getVar('tanggal2');

        if ($tanggal_awal && $tanggal_akhir) {
            $data['laporan'] = $model->laporan($tanggal_awal, $tanggal_akhir);
            $data['title'] = 'Laporan Data Peminjaman';
            $data['tanggal_awal'] = $tanggal_awal;
            $data['tanggal_akhir'] = $tanggal_akhir;
            echo view('/peminjaman/laporan', $data);
        } else {
            $data['tanggal_awal'] = $tanggal_awal;
            $data['tanggal_akhir'] = $tanggal_akhir;
            $data['laporan'] = $model->laporan(0, 0);
            $data['title'] = 'Laporan Data Peminjaman';
            // dd($data);
            echo view('/peminjaman/laporan', $data);
        }
    }
}
