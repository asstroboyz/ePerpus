<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\asetModel;
use App\Models\BarangModel;
use App\Models\detailPenjualanBarangModel;
use App\Models\detailRestokModel;
use App\Models\hutangModel;
use App\Models\KasModel;
use App\Models\masterBarangModel;
use App\Models\modalTokoModel;
use App\Models\PelangganModel;
use App\Models\PemasukanModel;
use App\Models\pembayaranPiutangModel;
use App\Models\pengecekanModel;
use App\Models\PengeluaranModel;
use App\Models\PenjualanBarangModel;
use App\Models\perkiraanModel;
use App\Models\piutangModel;
use App\Models\Profil;
use App\Models\restokModel;
use App\Models\riwayatSaldo;
use App\Models\SaldoModel;
use App\Models\satuanModel;
use App\Models\supplierModel;
use App\Models\tipeBarangModel;
use App\Models\TransaksiBarangModel;
use App\Models\PosyanduModel;
use App\Models\DataBalitaModel;
use App\Models\JenisImunisasiModel;
use App\Models\DaftarHadirModel;
use App\Models\JadwalimunisasiModel;
use Mpdf\Mpdf;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;

class Admin extends BaseController
{
    protected $db;
    protected $builder;
    protected $BarangModel;
    protected $DaftarHadirModel;
    protected $DataBalitaModel;
    protected $validation;
    protected $session;
    protected $tipeBarangModel;
    protected $masterBarangModel;
    protected $Profil;
    protected $perkiraanModel;
    protected $pengecekanModel;
    protected $satuanModel;
    protected $TransaksiBarangModel;
    protected $KeuntunganModel;
    protected $PenjualanBarangModel;
    protected $SaldoModel;
    protected $PemasukanModel;
    protected $PengeluaranModel;
    protected $detailPenjualanBarangModel;
    protected $riwayatSaldo;
    protected $PelangganModel;
    protected $asetModel;
    protected $hutangModel;
    protected $modalTokoModel;
    protected $supplierModel;
    protected $restokModel;
    protected $detailRestokModel;
    protected $KasModel;
    protected $piutangModel;
    protected $pembayaranPiutangModel;
    protected $PosyanduModel;
    protected $JenisImunisasiModel;
    protected $JadwalimunisasiModel;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->DaftarHadirModel = new DaftarHadirModel();
        $this->JadwalimunisasiModel = new JadwalimunisasiModel();
        $this->PosyanduModel = new PosyanduModel();
        $this->JenisImunisasiModel = new JenisImunisasiModel();
        $this->DataBalitaModel = new DataBalitaModel();
        $this->riwayatSaldo = new riwayatSaldo();
        $this->pembayaranPiutangModel = new pembayaranPiutangModel();
        $this->piutangModel = new piutangModel();
        $this->Profil = new Profil();
        $this->asetModel = new asetModel();
        $this->hutangModel = new hutangModel();
        $this->modalTokoModel = new modalTokoModel();
        $this->restokModel = new restokModel();
        $this->supplierModel = new supplierModel();
        $this->tipeBarangModel = new tipeBarangModel();
        $this->pengecekanModel = new pengecekanModel();
        $this->BarangModel = new BarangModel();
        $this->satuanModel = new satuanModel();
        $this->KasModel = new KasModel();
        $this->TransaksiBarangModel = new TransaksiBarangModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->masterBarangModel = new masterBarangModel();
        $this->perkiraanModel = new perkiraanModel();
        $this->PelangganModel = new PelangganModel();
        $this->SaldoModel = new SaldoModel();
        $this->PemasukanModel = new PemasukanModel();
        $this->PengeluaranModel = new PengeluaranModel();
        $this->PenjualanBarangModel = new PenjualanBarangModel();
        $this->detailPenjualanBarangModel = new detailPenjualanBarangModel();
        $this->detailRestokModel = new detailRestokModel();
    }

    // public function index()
    // {
    //     $latestKas = $this->KasModel->orderBy('id_kas', 'DESC')->first();

    //     // Mendapatkan saldo terakhir
    //     $saldoTerakhir = $latestKas ? $latestKas['saldo_terakhir'] : 0;

    //     // Menghitung jumlah inventaris
    //     $dataInventaris = $this->db->table('penjualan_barang')->get()->getResult();

    //     // Menghitung stok barang yang dibawah 10
    //     $queryBarangStokDibawah10 = $this->db->table('barang')->where('stok <', 10)->get()->getResult();
    //     $stokdibawah10 = count($queryBarangStokDibawah10);

    //     // Menghitung total penjualan barang dalam 24 jam terakhir
    //     $waktu24JamYangLalu = date('Y-m-d H:i:s', strtotime('-24 hours'));
    //     $totalPenjualan24Jam = $this->db->table('penjualan_barang')->where('tanggal_penjualan >=', $waktu24JamYangLalu)->countAllResults();

    //     $data = [
    //         'title' => 'e-Posyandu - Home',
    //         'saldo_terakhir' => $saldoTerakhir,
    //         'stokdibawah10' => $stokdibawah10,
    //         'totalPenjualan24Jam' => $totalPenjualan24Jam,
    //     ];

    //     return view('Admin/Home/Index', $data);
    // }

    public function index()
    {
        $latestKas = $this->KasModel->orderBy('id_kas', 'DESC')->first();
        $saldoTerakhir = $latestKas ? $latestKas['saldo_terakhir'] : 0;

        $queryBarangStokDibawah10 = $this->db->table('barang')->where('stok <', 10)->get()->getResult();
        $stokdibawah10 = count($queryBarangStokDibawah10);

        $waktu24JamYangLalu = date('Y-m-d H:i:s', strtotime('-24 hours'));
        $totalPenjualan24Jam = $this->db->table('penjualan_barang')->where('tanggal_penjualan >=', $waktu24JamYangLalu)->countAllResults();

        // $totalKasMasuk = $this->db->table('kas_toko')
        // ->selectSum('jumlah_akhir')
        // ->where('jenis_transaksi', 'penerimaan')
        // ->get()
        // ->getRow()->jumlah_akhir;
        $totalKasMasuk = $this->db->table('kas_toko')
            ->select('SUM(jumlah_akhir - jumlah_awal) AS total_masuk', false)
            ->where('jenis_transaksi', 'penerimaan')
            ->get()
            ->getRow()->total_masuk;
        // $totalKasMasuk = $this->db->query("
        //     SELECT SUM(jumlah_akhir - jumlah_awal) AS total_masuk
        //     FROM kas_toko
        //     WHERE jenis_transaksi = 'penerimaan'
        // ")->getRow()->total_masuk;
        $totalKasKeluar = $this->db->table('kas_toko')
            ->select('SUM(jumlah_awal - jumlah_akhir) AS total_keluar', false)
            ->where('jenis_transaksi', 'pengeluaran')
            ->get()
            ->getRow()->total_keluar;

        //         $totalKasKeluar = $this->db->query("
        //     SELECT SUM(jumlah_awal - jumlah_akhir) AS total_keluar
        //     FROM kas_toko
        //     WHERE jenis_transaksi = 'pengeluaran'
        // ")->getRow()->total_keluar;
        $dataPenjualan = $this->PenjualanBarangModel->getAllSales(); // Mengambil semua data penjualan
        // dd($dataPenjualan);
        $data = [
            'title' => 'e-Posyandu - Home',
            'saldo_terakhir' => $saldoTerakhir,
            'stokdibawah10' => $stokdibawah10,
            'totalKasMasuk' => $totalKasMasuk,
            'totalKasKeluar' => $totalKasKeluar,
            'totalPenjualan24Jam' => $totalPenjualan24Jam,
            'dataPenjualan' => $dataPenjualan,
        ];

        return view('Admin/Home/Index', $data);
    }

    public function user_list()
    {
        $data['title'] = 'User List';
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users']  = $users->findAll();

        //join tabel memanggil fungsi
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();
        return view('Admin/User_list', $data);
    }

    public function detail($id = 0)
    {
        $data['title'] = 'e-Posyandu - Detail Pengguna';

        $this->builder->select('users.id as userid, username, email, foto, name,created_at');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        if (empty($data['user'])) {
            return redirect()->to('/Admin');
        }

        return view('Admin/Detail', $data);
    }

    public function profil()
    {
        $data['title'] = 'User Profile ';
        $userlogin = user()->username;
        $userid = user()->id;
        $role = $this->db->table('auth_groups_users')->where('user_id', $userid)->get()->getRow();
        $role == '1' ? $role_echo = 'Admin' : $role_echo = 'Pegawai'; // $data['title'] = 'User Profile ';
        $userlogin = user()->username;
        $userid = user()->id;

        // Mengambil data role dari tabel auth_groups_users
        $roleData = $this->db->table('auth_groups_users')->where('user_id', $userid)->get()->getRow();

        // Memeriksa apakah data role ditemukan
        if ($roleData) {

            $adminRoleId = 1;
            $petugasPengadaan = 2;

            // Menentukan status role berdasarkan ID role
            if ($roleData->group_id == $adminRoleId) {
                $role_echo = 'Admin';
            } elseif ($roleData->group_id == $petugasPengadaan) {
                $role_echo = 'Petugas Pengadaan';
            } else {
                $role_echo = 'Pegawai';
            }
        } else {
            // Jika data role tidak ditemukan, mengatur nilai default sebagai 'Pegawai'
            $role_echo = 'Pegawai';
        }

        // $data = $this->db->table('permintaan_barang');
        // $query1 = $data->where('id_user', $userid)->get()->getResult();
        $builder = $this->db->table('users');
        $builder->select('id,username,fullname,email,created_at,foto');
        $builder->where('username', $userlogin);
        $query = $builder->get();
        // $semua = count($query1);
        $data = [
            // 'semua' => $semua,
            'user' => $query->getRow(),
            'title' => 'Profil - e-Posyandu',
            'role' => $role_echo,

        ];

        return view('Admin/Home/Profil', $data);
    }

    public function simpanProfile($id)
    {
        // dd($this->request->getPost());
        $userlogin = user()->username;
        $builder = $this->db->table('users');
        $builder->select('*');
        $query = $builder->where('username', $userlogin)->get()->getRowArray();

        $foto = $this->request->getFile('foto');
        if ($foto->getError() == 4) {
            $this->Profil->update($id, [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'fullname' => $this->request->getPost('fullname'),
            ]);
        } else {

            $nama_foto = 'AdminFOTO' . $this->request->getPost('username') . '.' . $foto->guessExtension();
            if (!(empty($query['foto']))) {
                unlink('uploads/profile/' . $query['foto']);
            }
            $foto->move('uploads/profile', $nama_foto);

            $this->Profil->update($id, [
                'email' => $this->request->getPost('email'),
                'fullname' => $this->request->getPost('fullname'),
                'username' => $this->request->getPost('username'),
                'foto' => $nama_foto,
            ]);
        }
        session()->setFlashdata('msg', 'Profil Admin  berhasil Diubah');
        return redirect()->to(base_url('Admin/profil/' . $id));
    }

    public function updatePassword($id)
    {
        $passwordLama = $this->request->getPost('passwordLama');
        $passwordbaru = $this->request->getPost('passwordBaru');
        $konfirm = $this->request->getPost('konfirm');

        if ($passwordbaru != $konfirm) {
            session()->setFlashdata('error-msg', 'Password Baru tidak sesuai');
            return redirect()->to(base_url('admin/profil/' . $id));
        }

        $builder = $this->db->table('users');
        $builder->where('id', user()->id);
        $query = $builder->get()->getRow();
        $verify_pass = password_verify(base64_encode(hash('sha384', $passwordLama, true)), $query->password_hash);

        if ($verify_pass) {
            $users = new UserModel();
            $entity = new \Myth\Auth\Entities\User();

            $entity->setPassword($passwordbaru);
            $hash = $entity->password_hash;
            $users->update($id, ['password_hash' => $hash]);
            session()->setFlashdata('msg', 'Password berhasil Diubah');
            return redirect()->to('/admin/profil/' . $id);
        } else {
            session()->setFlashdata('error-msg', 'Password Lama tidak sesuai');
            return redirect()->to(base_url('admin/profil/' . $id));
        }
    }



    // Menu Penjualan

    public function hapus_penjualan($id)
    {
        $this->PenjualanModel->delete($id);
        session()->setFlashdata('msg', 'Penjualan berhasil dihapus.');
        return redirect()->to('/Admin/penjualan');
    }

    public function penjualanbarang()
    {
        $model = new PenjualanBarangModel();
        // $data['pengaduan'] = $query;
        $this->builder = $this->db->table('penjualan_barang');
        $this->builder->select('*');
        $this->query = $this->builder->get();
        $data['penjualan'] = $this->query->getResultArray();
        // dd(  $data['permintaan']);
        $data['title'] = 'Penjualan Barang';

        return view('Admin/Penjualan_barang/Index', $data);
    }

    public function list_penjualan($id)
    {
        $data['detail'] = $this->PenjualanBarangModel->getPenjualan($id);
        $data['penjualan'] = $this->detailPenjualanBarangModel
            ->select('detail_penjualan_barang.*, master_barang.nama_brg, satuan.nama_satuan,penjualan_barang.tanggal_penjualan, master_barang.merk,detail_master.tipe_barang')
            ->join('barang', 'barang.kode_barang = detail_penjualan_barang.kode_barang')
            ->join('satuan', 'satuan.satuan_id = barang.id_satuan')
            ->join('detail_master', 'detail_master.detail_master_id = barang.id_master_barang')
            ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
            ->join('penjualan_barang', 'penjualan_barang.penjualan_barang_id = detail_penjualan_barang.id_penjualan_barang')
            ->where('id_penjualan_barang', $id)->findAll();
        // dd(  $data['penjualan']);
        $data['title'] = 'Penjualan Barang';
        return view('Admin/Penjualan_barang/list_penjualan', $data);
    }

    public function tambah_penjualanBarang()
    {
        $data = [
            'validation' => $this->validation,
            'title' => 'Tambah Penjualan',
            'barangList' => $this->BarangModel
                ->select('barang.*,master_barang.nama_brg, satuan.nama_satuan, master_barang.merk,detail_master.detail_master_id,detail_master.tipe_barang')
                ->join('detail_master', 'detail_master.detail_master_id = barang.id_master_barang')
                ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
                ->join('satuan', 'satuan.satuan_id = barang.id_satuan')

                ->findAll(),
            'selectedBarang' => null,
            'pelangganList' => $this->PelangganModel->findAll(),
        ];

        $kode_barang = $this->request->getPost('kode_barang');
        if ($kode_barang) {
            $selectedBarang = $this->BarangModel->find($kode_barang);
            if ($selectedBarang) {
                $data['selectedBarang'] = $selectedBarang;
            }
        }

        return view('Admin/Penjualan_barang/Tambah_penjualan', $data);
    }

    public function simpanPenjualanBrg()
    {
        $PelangganModel = new PelangganModel();
        $barangModel = new BarangModel();
        $TransaksiBarangModel = new TransaksiBarangModel();
        $KasModel = new KasModel();

        // Mendapatkan saldo terakhir menggunakan fungsi getSaldoTerakhir()
        $latestKas = $KasModel->getSaldoTerakhir();
        $saldoTerakhir = $latestKas ? $latestKas['saldo_terakhir'] : 0;

        // Debug saldo terakhir
        // dd($saldoTerakhir);

        // Mendapatkan data barang dari input post
        $barangList = $this->request->getPost('kode_barang');
        $idPelangganList = $this->request->getPost('id_pelanggan'); // Ubah dari $barangList menjadi $idPelangganList

        $jumlahList = $this->request->getPost('jumlah');

        $total_penjualan = 0;

        // Membuat kode permintaan untuk penjualan
        $kode_penjualan = 'NHR-' . mt_rand(1000, 9999);

        // Persiapkan data untuk penyimpanan penjualan barang
        $penjualanData = [
            'penjualan_barang_id' => $kode_penjualan,
            'tanggal_penjualan' => 'YYYY-MM-DD HH:MM:SS',
            'id_pelanggan' => $this->request->getPost('id_pelanggan')[0],
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran')[0],
            'total_penjualan' => 0, // Total penjualan diisi sementara dengan 0
        ];

        // Simpan data penjualan barang terlebih dahulu

        $this->PenjualanBarangModel->insert($penjualanData);

        // Simpan id transaksi untuk seluruh detail penjualan
        $id_transaksi = $kode_penjualan;

        foreach ($barangList as $index => $kode_barang) {
            // Mendapatkan data barang dari database berdasarkan kode barang
            $barang = $barangModel->where('kode_barang', $kode_barang)->first();

            // Memastikan barang tersedia dan stok mencukupi
            if ($barang && $barang['stok'] >= $jumlahList[$index]) {
                $harga_jual = $barang['harga_jual'];
                $harga_beli = $barang['harga_beli'];

                $jumlah = $jumlahList[$index];
                $sub_total = $jumlah * $harga_jual;
                $keuntungan = $jumlah * ($harga_jual - $harga_beli);

                $total_penjualan += $sub_total;

                // Mengurangi stok barang
                $stokBaru = $barang['stok'] - $jumlah;
                $barangModel->update($kode_barang, ['stok' => $stokBaru]);

                // Menyimpan detail penjualan barang
                $dataDetailPenjualan = [
                    'kode_barang' => $kode_barang,
                    'jumlah' => $jumlah,
                    'sub_total' => $sub_total,
                    'keuntungan' => $keuntungan,
                    'id_penjualan_barang' => $kode_penjualan,
                    'id_transaksi' => $id_transaksi, // Menggunakan id_transaksi yang sama untuk seluruh detail penjualan
                ];

                // Simpan detail penjualan barang
                $id_detail_penjualan_barang = $this->detailPenjualanBarangModel->insert($dataDetailPenjualan);

                // Menyimpan data pemasukan ke kas
                $jumlah_awal = $saldoTerakhir;
                $jumlah_akhir = $saldoTerakhir + $sub_total;
                $saldoTerakhir = $jumlah_akhir; // Update saldo terakhir

                $dataPemasukan = [
                    'cek_sub' => $sub_total,
                    'tanggal' =>  date('Y-m-d H:i:s'),
                    'jenis_transaksi' => 'penerimaan',
                    'keterangan' => 'Penjualan barang - ' . $barang['nama_brg'],
                    'jumlah_awal' => $jumlah_awal,
                    'jumlah_akhir' => $jumlah_akhir,
                    'saldo_terakhir' => $saldoTerakhir,
                ];

                // Simpan data pemasukan ke kas
                $KasModel->insert($dataPemasukan);
            } else {
                // Jika stok tidak mencukupi, tampilkan pesan kesalahan
                session()->setFlashdata('msg', 'Stok barang tidak mencukupi.');
                return redirect()->back()->withInput();
            }
        }

        // Update total penjualan setelah selesai menyimpan detail penjualan
        $this->PenjualanBarangModel->update($kode_penjualan, ['total_penjualan' => $total_penjualan]);

        session()->setFlashdata('msg', 'Penjualan berhasil dilakukan.');
        return redirect()->to('PenjualanBarangCont/');
    }

    public function ubah($id)
    {

        session();
        $barangList = $this->BarangModel->getBarang();

        $data = [
            'title' => "e-Posyandu Ubah Data Permintaan",
            'validation' => \Config\Services::validation(),
            'barangList' => $barangList,
            'permintaan' => $this->detailPermintaanModel->getDetailPermintaan($id),
        ];

        return view('Pegawai/Permintaan_barang/Edit_permintaan', $data);
    }

    public function updatePenjualanBarang($id)
    {
        $dataPermintaan = [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'jumlah' => $this->request->getPost('jumlah'),
            'perihal' => $this->request->getPost('perihal'),
            'detail' => $this->request->getPost('detail'),
        ];
        // dd($dataPermintaan);

        $this->detailPermintaanModel->update($id, $dataPermintaan);
        $id_permintaan = $this->request->getPost('id_permintaan_barang');
        session()->setFlashdata('msg', 'Permintaan berhasil diperbarui.');
        return redirect()->to('/Pegawai/list_permintaan/' . $id_permintaan);
    }

    public function delete_penjualanBarang($id)
    {
        // Cari penjualan barang berdasarkan ID
        $penjualan = $this->PenjualanBarangModel->find($id);

        // Pastikan penjualan barang ditemukan
        if ($penjualan) {
            // Hapus detail penjualan barang berdasarkan ID penjualan
            $this->detailPenjualanBarangModel->where('id_penjualan_barang', $penjualan['penjualan_barang_id'])->delete();

            // Hapus transaksi penjualan berdasarkan ID penjualan
            $this->TransaksiBarangModel->where('id_penjualan_barang', $penjualan['penjualan_barang_id'])->delete();

            // Hapus pemasukan penjualan berdasarkan ID penjualan
            $this->PemasukanModel->where('id_detail_penjualan_barang', $penjualan['penjualan_barang_id'])->delete();

            // Hapus riwayat saldo penjualan berdasarkan ID penjualan
            $this->riwayatSaldo->where('id_detail_penjualan_barang', $penjualan['penjualan_barang_id'])->delete();

            // Update saldo terakhir dengan mengurangkan total penjualan yang dihapus
            $lastBalance = $this->SaldoModel->getLastBalance();
            $newBalance = $lastBalance - $penjualan['total_penjualan'];
            $this->SaldoModel->updateLastBalance($newBalance);

            // Hapus penjualan barang berdasarkan ID
            $this->PenjualanBarangModel->delete($id);

            session()->setFlashdata('msg', 'Penjualan barang berhasil dihapus.');
            return redirect()->to('Admin/penjualanbarang/');
        } else {
            // Jika penjualan barang tidak ditemukan, tampilkan pesan kesalahan
            session()->setFlashdata('msg', 'Penjualan barang tidak ditemukan.');
            return redirect()->to('Admin/penjualanbarang/');
        }
    }
    // Menu Penjualan
    //barang
    public function Barang()
    {
        $data = [
            'title' => 'Produk - Hera',
            'barangs' => $this->BarangModel
                ->join('detail_master', 'detail_master.detail_master_id = barang.id_master_barang')
                ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
                ->join('satuan', 'satuan.satuan_id = barang.id_satuan')
                ->where('deleted_at', null)->findAll(),
        ];

        return view('Admin/Barang/Index', $data);
    }



    public function atk_trash()
    {
        $barangs = $this->BarangModel->onlyDeleted()->getBarang();

        // Menyaring data yang belum di-restore
        $barangsNotRestored = array_filter($barangs, function ($barang) {
            return $barang['deleted_at'] !== null; // Filter barang yang sudah di-restore
        });

        $data = [
            'title' => 'e-Posyandu - Barang',
            'barangs' => $barangsNotRestored,
        ];

        return view('Admin/Barang/Soft_deleted', $data);
    }

    public function tambahForm()
    {
        // Tampilkan form tambah stok
        $data = [
            'validation' => $this->validation,
            'title' => 'Tambah Barang ',
            'satuan' => $this->satuanModel->findAll(),
            'master_barang' => $this->tipeBarangModel->getMasterBarang(),
        ];

        return view('Admin/Barang/Tambah_barang', $data);
    }

    public function tambah()
    {
        $namaBarang = $this->request->getPost('nama_barang');
        $idSatuan = $this->request->getPost('satuan_barang');

        // Lakukan pengecekan apakah barang sudah ada berdasarkan id_master_barang dan id_satuan
        $barangExists = $this->BarangModel->where('id_master_barang', $namaBarang)
            ->where('id_satuan', $idSatuan)
            ->first();

        // Jika barang sudah ada, berikan pesan error dan kembalikan ke form tambah
        if ($barangExists) {
            session()->setFlashdata('error-msg', 'Barang sudah ada dalam database.');
            return redirect()->to('/Admin/tambahForm')->withInput();
        }

        // Validasi input form tambah barang
        $this->validation->setRules([
            'nama_barang' => 'required',
            'satuan_barang' => 'required',
            'stok' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Stok wajib diisi.',
                    'numeric' => 'Stok harus berupa angka.',
                    'greater_than' => 'Stok harus lebih besar dari 0.',
                ],
            ],
        ]);

        if (!$this->validation->withRequest($this->request)->run()) {
            // Ambil pesan kesalahan
            $errors = $this->validation->getErrors();

            // Tampilkan pesan kesalahan sesuai dengan aturan yang telah ditentukan
            foreach ($errors as $error) {
                echo $error . '<br>';
            }

            // Redirect kembali ke formulir dengan input
            return redirect()->to('/Admin/tambahForm')->withInput();
        }

        // Simpan data barang ke database tanpa menyertakan kode_barang
        $data = [
            'id_master_barang' => $this->request->getPost('nama_barang'),
            'id_satuan' => $this->request->getPost('satuan_barang'),
            'stok' => $this->request->getPost('stok'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'tanggal_barang_masuk' => date('Y-m-d H:i:s'), // Tambahkan waktu saat ini
        ];

        // Debug nilai variabel sebelum menyimpan
        var_dump($data);

        // Simpan data ke BarangModel tanpa kode_barang
        $this->BarangModel->save($data);

        // Dapatkan kode_barang yang baru saja disimpan
        $kodeBarang = $this->TransaksiBarangModel->insertID();

        // Debug nilai kode_barang setelah menyimpan
        var_dump($kodeBarang);

        // Masukkan data ke tabel transaksi_barang dengan kode_brg sebagai kode_barang dari BarangModel
        $this->TransaksiBarangModel->insert([
            'kode_brg' => $kodeBarang, // ini dari tab
            'stok' => $data['stok'],
            'tanggal_barang_masuk' => $data['tanggal_barang_masuk'],
            'jumlah_perubahan' => $data['stok'],
            'jenis_transaksi' => 'masuk',
            'informasi_tambahan' => 'Penambahan stok.',
            'tanggal_perubahan' => $data['tanggal_barang_masuk'],
        ]);

        // Tampilkan pesan sukses atau error
        session()->setFlashdata('msg', 'Data barang berhasil ditambahkan.');
        return redirect()->to('/Admin/barang');
    }

    // public function tambah()
    // {
    //     $namaBarang = $this->request->getPost('nama_barang');
    //     $idSatuan = $this->request->getPost('satuan_barang');

    //     // Lakukan pengecekan apakah barang sudah ada berdasarkan id_master_barang dan id_satuan
    //     $barangExists = $this->BarangModel->where('id_master_barang', $namaBarang)
    //         ->where('id_satuan', $idSatuan)
    //         ->first();

    //     // Jika barang sudah ada, berikan pesan error dan kembalikan ke form tambah
    //     if ($barangExists) {
    //         session()->setFlashdata('error-msg', 'Barang sudah ada dalam database.');
    //         return redirect()->to('/Admin/tambahForm')->withInput();
    //     }

    //     // Validasi input form tambah barang
    //     $this->validation->setRules([
    //         'nama_barang' => 'required',
    //         'satuan_barang' => 'required',
    //         'stok' => [
    //             'rules' => 'required|numeric|greater_than[0]',
    //             'errors' => [
    //                 'required' => 'Stok wajib diisi.',
    //                 'numeric' => 'Stok harus berupa angka.',
    //                 'greater_than' => 'Stok harus lebih besar dari 0.',
    //             ],
    //         ],
    //     ]);

    //     if (!$this->validation->withRequest($this->request)->run()) {
    //         // Node 1: Ambil pesan kesalahan
    //         $errors = $this->validation->getErrors();

    //         // Node 2: Tampilkan pesan kesalahan sesuai dengan aturan yang telah ditentukan
    //         foreach ($errors as $error) {
    //             echo $error . '<br>';
    //         }

    //         // Node 3: Redirect kembali ke formulir dengan input
    //         return redirect()->to('/Admin/tambahForm')->withInput();
    //     }

    //     // Simpan data barang ke database
    //     $data = [
    //         'id_master_barang' => $this->request->getPost('nama_barang'),
    //         'id_satuan' => $this->request->getPost('satuan_barang'),
    //         'stok' => $this->request->getPost('stok'),
    //         'harga_beli' => $this->request->getPost('harga_beli'),
    //         'harga_jual' => $this->request->getPost('harga_jual'),
    //         'tanggal_barang_masuk' => date('Y-m-d H:i:s'), // Tambahkan waktu saat ini
    //     ];
    //     // dd($data);

    //     // Generate dan tambahkan kode_barang ke dalam data
    //     $this->BarangModel->save($data);

    //     // Dapatkan kode_barang yang baru saja disimpan
    //     $kodeBarang = $this->BarangModel->getInsertID();

    //     // Masukkan data ke tabel transaksi_barang
    //     $this->TransaksiBarangModel->insert([
    //         'kode_barang' => $kodeBarang,
    //         'stok' => $data['stok'],
    //         'tanggal_barang_masuk' => $data['tanggal_barang_masuk'],
    //         'jumlah_perubahan' => $data['stok'],
    //         'jenis_transaksi' => 'masuk',
    //         'informasi_tambahan' => 'Penambahan stok.',
    //         'tanggal_perubahan' => $data['tanggal_barang_masuk'],
    //     ]);

    //     // Tampilkan pesan sukses atau error
    //     session()->setFlashdata('msg', 'Data barang berhasil ditambahkan.');
    //     return redirect()->to('/Admin/barang');

    // }

    public function softDelete($kode_barang)
    {
        $barangModel = new BarangModel();

        // Cek apakah barang dengan kode_barang tertentu ada
        $barang = $barangModel->find($kode_barang);

        if ($barang) {
            // Lakukan soft delete dengan menghapus record di tabel Barang dan TransaksiBarang
            $barangModel->softDeleteWithRelations($kode_barang);

            return redirect()->to('/Admin/barang')->with('success', 'Data berhasil dihapus secara soft delete.');
        } else {
            return redirect()->to('/Admin/barang')->with('error', 'Data tidak ditemukan.');
        }
    }
    // app/Controllers/AdminController.php
    public function restore($kode_barang)
    {
        $restored = $this->BarangModel->restoreBarang($kode_barang);

        if ($restored) {
            return redirect()->to(base_url('BarangCont'))->with('msg', 'Barang berhasil dipulihkan.');
        } else {
            return redirect()->to(base_url('BarangCont'))->with('error-msg', 'Gagal memulihkan barang.');
        }
    }

    public function barangMasuk()
    {
        $barangModel = new BarangModel();

        // Ambil barang-barang yang baru masuk
        $barangMasuk = $barangModel->getBarangMasuk();

        // Kirim data ke view
        $data['title'] = 'Riawayat Stok ';
        $data = [
            'barangMasuk' => $barangMasuk,
            'title' => 'Barang',
        ];

        return view('Admin/Barang/Barang_masuk', $data);
    }

    public function barangKeluar()
    {
        $barangModel = new BarangModel();

        // Ambil barang-barang yang baru keluar
        $barangKeluar = $barangModel->getBarangKeluar();

        // Kirim data ke view
        $data = [
            'barangKeluar' => $barangKeluar,
        ];

        return view('admin/riwayat_stok/barang_keluar', $data);
    }
    public function formTambahStok($kodeBarang)
    {
        $barangModel = new BarangModel();
        $barang = $barangModel->where('kode_barang', $kodeBarang)->first();

        if (!$barang) {
            return redirect()->to('/admin/barang')->with('error-msg', 'Barang tidak ditemukan.');
        }

        $data = [
            'barang' => $barang,
            'kode_barang' => $kodeBarang,
            'stok' => $barang['stok'],
            'harga_beli' => $barang['harga_beli'],
            'validation' => $this->validation,
            'title' => 'Tambah Stok',
        ];

        return view('Admin/Barang/Tambah_stok', $data);
    }

    public function tambahStok($kodeBarang)
    {
        $barangModel = new BarangModel();
        $TransaksiBarangModel = new TransaksiBarangModel();
        $KasModel = new KasModel(); // Model untuk kas
        $PengeluaranModel = new PengeluaranModel();

        // Mendapatkan data barang
        $barang = $barangModel->where('kode_barang', $kodeBarang)->first();

        if (!$barang) {
            return redirect()->to("/Admin/formTambahStok/{$kodeBarang}")->withInput()->with('error-msg', 'Barang tidak ditemukan.');
        }

        // Mendapatkan data dari form
        $jumlahPenambahanStok = (int) $this->request->getPost('jumlah_penambahan_stok');
        $tanggalBarangMasuk = $this->request->getPost('tanggal_barang_masuk');

        // Mendapatkan harga_beli dari barang
        $hargaBeli = $barang['harga_beli'];

        // Menghitung total nilai barang yang ditambahkan
        $totalNilai = $jumlahPenambahanStok * $hargaBeli;

        // Mendapatkan kas terakhir
        $lastBalance = $KasModel->getLastBalance();

        // Mengupdate kas dengan nilai total barang yang ditambahkan
        $newBalance = $lastBalance - $totalNilai;

        // Update kas terakhir
        $KasModel->updateLastBalance($newBalance); // Memasukkan pemanggilan updateLastBalance()

        // Update stok pada tabel barang
        $stokBaru = $barang['stok'] + $jumlahPenambahanStok;
        $barangModel->update($barang['kode_barang'], [
            'stok' => $stokBaru,
        ]);

        // Insert data restok
        $dataRestok = [
            'jumlah' => $totalNilai, // Simpan total nilai sebagai jumlah pengeluaran
            'keterangan' => 'Restok barang',
            'tanggal' =>  date('Y-m-d H:i:s'), // Tanggal pemasukan, bisa diubah sesuai kebutuhan
        ];
        $PengeluaranModel->insert($dataRestok); // Menggunakan model PengeluaranModel

        // Masukkan data ke tabel transaksi_barang
        $TransaksiBarangModel->insert([
            'kode_brg' => $kodeBarang,
            'stok' => $stokBaru,
            'tanggal_barang_masuk' => $tanggalBarangMasuk,
            'jumlah_perubahan' => $jumlahPenambahanStok,
            'jenis_transaksi' => 'masuk',
            'informasi_tambahan' => 'Penambahan stok melalui form tambah stok.',
            'tanggal_perubahan' => $tanggalBarangMasuk,
        ]);

        // Set pesan sukses dan redirect
        session()->setFlashdata('msg', 'Stok barang berhasil ditambahkan.');
        return redirect()->to('/Admin/barang')->with('success-msg', 'Stok barang berhasil ditambahkan.');
    }

    public function formKurangStok($kodeBarang)
    {
        $barangModel = new BarangModel();
        $barang = $barangModel->where('kode_barang', $kodeBarang)->first();
        $harga_jual = $barang['harga_jual'];

        // Pastikan barang ditemukan sebelum melanjutkan
        if (!$barang) {
            // Tampilkan pesan kesalahan atau redirect ke halaman lain jika perlu
            return redirect()->to('/Admin/barang')->with('error-msg', 'Barang tidak ditemukan.');
        }

        // Kirim data ke view, termasuk nilai stok
        $data = [
            'barang' => $barang,
            'kodeBarang' => $kodeBarang,
            'stok' => $barang['stok'], // Inisialisasi variabel stok
            'harga_jual' => $harga_jual,
            'validation' => $this->validation,
            'title' => 'Kurang Barang',
        ];

        return view('Admin/Barang/Kurang_stok', $data);
    }

    public function kurangiStok($kodeBarang)
    {
        $barangModel = new BarangModel();
        $TransaksiBarangModel = new TransaksiBarangModel();

        // Mendapatkan data barang
        $barang = $barangModel->where('kode_barang', $kodeBarang)->first();

        if (!$barang) {
            // Tampilkan pesan kesalahan atau redirect ke halaman lain jika perlu
            return redirect()->to('/Admin/barang')->with('error-msg', 'Barang tidak ditemukan.');
        }

        // Mendapatkan data dari form
        $jumlahPenguranganStok = (int) $this->request->getPost('jumlah_pengurangan_stok');
        $tanggalBarangKeluar = $this->request->getPost('tanggal_barang_keluar');
        $stok = $barang['stok']; // Menggunakan jenis_barang dari data barang
        $stokBaru = max(0, $stok - $jumlahPenguranganStok);

        // Update stok pada tabel barang
        $barangModel->update($barang['kode_barang'], [
            'stok' => $stokBaru,
        ]);

        // Menghitung harga jual total
        $hargaJualTotal = $barang['harga_jual'] * $jumlahPenguranganStok;

        // Masukkan data ke tabel transaksi_barang
        $TransaksiBarangModel->insert([
            'kode_brg' => $kodeBarang,
            'stok' => $stok,
            'tanggal_barang_keluar' => $tanggalBarangKeluar,
            'jumlah_perubahan' => $jumlahPenguranganStok,
            'jenis_transaksi' => 'keluar',
            'informasi_tambahan' => 'Pengurangan stok melalui form kurang stok.',
            'tanggal_perubahan' => $tanggalBarangKeluar,
            'harga_jual_total' => $hargaJualTotal, // Menyimpan nilai harga jual total ke dalam tabel
        ]);

        // Set pesan sukses dan redirect
        session()->setFlashdata('msg', 'Stok barang berhasil dikurangi.');
        return redirect()->to('/Admin/barang');
    }

    public function trans_masuk()
    {
        $this->builder = $this->db->table('transaksi_barang');
        $this->builder->select('transaksi_barang.*, satuan.nama_satuan, master_barang.nama_brg, master_barang.merk');
        $this->builder->join('barang', 'transaksi_barang.kode_barang = barang.kode_barang');
        $this->builder->join('satuan', 'barang.id_satuan = satuan.satuan_id');
        $this->builder->join('detail_master', 'detail_master.detail_master_id = barang.id_master_barang');
        $this->builder->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang');
        $this->builder->where('transaksi_barang.jenis_transaksi', 'masuk');

        $this->query = $this->builder->get();

        $data = [
            'transaksi_barang' => $this->query->getResultArray(),
            'title' => 'Daftar Transaksi Barang Masuk',
        ];

        return view('Admin/Barang/Barang_masuk', $data);
    }
    public function trans_keluar()
    {
        $this->builder = $this->db->table('transaksi_barang');
        $this->builder->select('transaksi_barang.*, satuan.nama_satuan, master_barang.nama_brg, master_barang.merk');
        $this->builder->join('barang', 'transaksi_barang.kode_barang = barang.kode_barang');
        $this->builder->join('satuan', 'barang.id_satuan = satuan.satuan_id');
        $this->builder->join('detail_master', 'detail_master.detail_master_id = barang.id_master_barang');
        $this->builder->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang');

        $this->builder->where('transaksi_barang.jenis_transaksi', 'keluar');

        $this->query = $this->builder->get();

        $data = [
            'transaksi_barang' => $this->query->getResultArray(),
            'title' => 'Daftar Transaksi Barang Keluar',
        ];

        return view('Admin/Barang/Barang_keluar', $data);
    }

    public function lap_permintaan_barang()
    {
        $data = [
            // 'user'=> $query->getResult(),
            'title' => 'e-Posyandu - Laporan',

        ];

        return view('Admin/Laporan/Home_permintaan', $data);
    }

    public function cetakDataMasuk()
    {

        $tanggalMulai = $this->request->getGet('tanggal_mulai');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');

        if (empty($tanggalMulai) || empty($tanggalAkhir)) {
            return redirect()->to(base_url('Admin'))->with('error', 'Tanggal mulai dan tanggal akhir harus diisi.');
        }

        $dateMulai = strtotime($tanggalMulai);
        $dateAkhir = strtotime($tanggalAkhir);

        if ($dateMulai === false || $dateAkhir === false || $dateMulai > $dateAkhir) {
            return redirect()->to(base_url('Admin'))->with('error', 'Format tanggal tidak valid atau tanggal mulai melebihi tanggal akhir.');
        }

        $transaksiBarangModel = new TransaksiBarangModel();
        $data['atk'] = $transaksiBarangModel
            ->withDeleted()
            ->select('transaksi_barang.*, satuan.nama_satuan, master_barang.nama_brg, barang.id_master_barang, barang.id_satuan, master_barang.merk,detail_master.tipe_barang')
            ->join('barang', 'transaksi_barang.kode_barang = barang.kode_barang')
            ->join('detail_master', 'detail_master.detail_master_id = barang.id_master_barang')
            ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
            ->join('satuan', 'barang.id_satuan = satuan.satuan_id')
            ->where('transaksi_barang.tanggal_barang_masuk >=', $tanggalMulai . ' 00:00:00')
            ->where('transaksi_barang.tanggal_barang_masuk <=', $tanggalAkhir . ' 23:59:59')
            ->findAll();
        $data['tanggalMulai'] = $tanggalMulai; // Add this line
        $data['tanggalAkhir'] = $tanggalAkhir;

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = true;
        $html = view('Admin/Laporan/Lap_barangMasuk', $data);

        $mpdf->setAutoPageBreak(true);

        $options = [
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ],
        ];

        $mpdf->AddPageByArray(['orientation' => 'L'] + $options);

        $mpdf->WriteHtml($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('Lap Barang Masuk Inventaris Barang.pdf', 'I');
    }

    public function cetakDataKeluar()
    {

        $tanggalMulai = $this->request->getGet('tanggal_mulai');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');

        if (empty($tanggalMulai) || empty($tanggalAkhir)) {
            return redirect()->to(base_url('Admin'))->with('error', 'Tanggal mulai dan tanggal akhir harus diisi.');
        }

        $dateMulai = strtotime($tanggalMulai);
        $dateAkhir = strtotime($tanggalAkhir);

        if ($dateMulai === false || $dateAkhir === false || $dateMulai > $dateAkhir) {
            return redirect()->to(base_url('Admin'))->with('error', 'Format tanggal tidak valid atau tanggal mulai melebihi tanggal akhir.');
        }

        $transaksiBarangModel = new TransaksiBarangModel();

        $data['atkKeluar'] = $transaksiBarangModel
            ->withDeleted()
            ->select('transaksi_barang.*, satuan.nama_satuan, master_barang.nama_brg, barang.id_master_barang, barang.id_satuan, master_barang.merk,detail_master.tipe_barang')
            ->join('barang', 'transaksi_barang.kode_barang = barang.kode_barang')
            ->join('detail_master', 'detail_master.detail_master_id = barang.id_master_barang')
            ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')

            ->join('satuan', 'barang.id_satuan = satuan.satuan_id')
            ->where('transaksi_barang.tanggal_barang_keluar >=', $tanggalMulai . ' 00:00:00') // Mengatur kondisi where untuk tanggal mulai
            ->where('transaksi_barang.tanggal_barang_keluar <=', $tanggalAkhir . ' 23:59:59') // Mengatur kondisi where untuk tanggal akhir
            ->findAll();

        $data['tanggalMulai'] = $tanggalMulai; // Add this line
        $data['tanggalAkhir'] = $tanggalAkhir;
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = true;
        $html = view('Admin/Laporan/Lap_barangKeluar', $data);

        $mpdf->setAutoPageBreak(true);

        $options = [
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ],
        ];

        $mpdf->AddPageByArray(['orientation' => 'L'] + $options);

        $mpdf->WriteHtml($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('Lap Barang Keluar Barang.pdf', 'I');
    }

    // peramalan


    //Laporan

    public function lap_permintaan()
    {
        $data = [
            // 'user'=> $query->getResult(),
            'title' => 'e-Posyandu - Laporan',

        ];

        return view('Admin/Laporan/Index', $data);
    }

    public function lap_masuk()
    {
        $data = [
            // 'user'=> $query->getResult(),
            'title' => 'e-Posyandu - Laporan',

        ];

        return view('Admin/Laporan/Home_transaksimasuk', $data);
    }
    public function lap_keluar()
    {
        $data = [
            // 'user'=> $query->getResult(),
            'title' => 'e-Posyandu - Laporan',

        ];

        return view('Admin/Laporan/Home_transaksikeluar', $data);
    }

    //laporan inventaris

    //Laporan Barang
    public function lap_barang()
    {
        $data = [
            'title' => 'e-Posyandu - Laporan Barang',
        ];

        return view('Admin/Laporan/Home_barang', $data);
    }
    public function lap_arus_kas()
    {
        $data = [
            'title' => 'e-Posyandu - Laporan Arus Kas',
        ];

        return view('Admin/Laporan/Home_arus', $data);
    }
    public function lap_analisa_arus_kas()
    {
        $data = [
            'title' => 'e-Posyandu - Laporan Analisa arus kas',
        ];

        return view('Admin/Laporan/Home_analisa', $data);
    }
    public function lap_laba_rugi()
    {
        $data = [
            'title' => 'e-Posyandu - Laporan Laba rugi',
        ];

        return view('Admin/Laporan/Home_laba', $data);
    }


    public function cetakDataBarang()
    {
        // Ambil tanggal mulai dan tanggal akhir dari form
        $tanggalMulai = $this->request->getPost('tanggal_mulai');
        $tanggalAkhir = $this->request->getPost('tanggal_akhir');

        // Pastikan kedua tanggal tidak kosong
        if (empty($tanggalMulai) || empty($tanggalAkhir)) {
            return redirect()->back()->withInput()->with('error', 'Pilih rentang waktu terlebih dahulu.');
        }

        $barangModel = new BarangModel();
        $satuanModel = new satuanModel(); // Tambahkan ini

        // Ambil data persediaan barang berdasarkan rentang waktu
        $data['barang'] = $barangModel
            ->select('barang.*,
                   SUM(CASE WHEN transaksi_barang.jenis_transaksi = "masuk" THEN transaksi_barang.jumlah_perubahan ELSE 0 END) AS total_masuk,
                   SUM(CASE WHEN transaksi_barang.jenis_transaksi = "keluar" THEN transaksi_barang.jumlah_perubahan ELSE 0 END) AS total_keluar,
                   satuan.nama_satuan') // Tambahkan kolom nama_satuan
            ->join('transaksi_barang', 'transaksi_barang.kode_barang = barang.kode_barang', 'left')
            ->join('satuan', 'satuan.satuan_id = barang.id_satuan', 'left') // Join dengan tabel satuan
            ->where('transaksi_barang.tanggal_barang_keluar >=', $tanggalMulai)
            ->where('transaksi_barang.tanggal_barang_keluar <=', $tanggalAkhir)
            ->groupBy('barang.kode_barang') // Assuming kode_barang is the primary key of barang table
            ->findAll();

        $db = \Config\Database::connect();

        $builder = $db->table('users');
        $builder->select('users.fullname');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->where('auth_groups_users.group_id', 3);
        $query = $builder->get();
        $pemilikData = $query->getRow();
        $pemilikName = $pemilikData ? $pemilikData->fullname : 'Nama Pemilik Tidak Ditemukan';

        // Kirim data tanggal mulai dan tanggal akhir ke view
        $data['pemilikName'] = $pemilikName;

        $data['tanggalMulai'] = $tanggalMulai;
        $data['tanggalAkhir'] = $tanggalAkhir;

        // Load view untuk cetak laporan

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = true;
        // Menambahkan alias untuk nomor halaman
        $mpdf->AliasNbPages();

        // Mengatur header dan footer
        $mpdf->SetFooter('Halaman {PAGENO} dari {nbpg}');
        $html = view('Admin/Laporan/Lap_barang', $data);

        $mpdf->setAutoPageBreak(true);

        $options = [
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ],
        ];

        $mpdf->AddPageByArray(['orientation' => 'L'] + $options);

        $mpdf->WriteHtml($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('Laporan Laba Rugi.pdf', 'I');
    }

    public function cetakLabaRugi()
    {
        $tanggalMulai = $this->request->getPost('tanggal_mulai');
        $tanggalAkhir = $this->request->getPost('tanggal_akhir');

        // Validasi input
        if (!$tanggalMulai || !$tanggalAkhir) {
            return redirect()->back()->with('error', 'Tanggal mulai dan akhir harus diisi.');
        }

        // Query untuk mendapatkan data penjualan bersih dari model PenjualanBarangModel
        $penjualanModel = new PenjualanBarangModel();
        $totalPenjualan = $penjualanModel
            ->selectSum('total_penjualan')
            ->where('tanggal_penjualan >=', $tanggalMulai)
            ->where('tanggal_penjualan <=', $tanggalAkhir)
            ->first()['total_penjualan'];

        // Query untuk mendapatkan total harga beli barang yang terjual dari model detailPenjualanBarangModel dan BarangModel

        $db = \Config\Database::connect();
        $builder = $db->table('detail_penjualan_barang');
        $totalHPP = $builder
            ->select('SUM(barang.harga_beli * detail_penjualan_barang.jumlah) AS total_hpp')
            ->join('barang', 'barang.kode_barang = detail_penjualan_barang.kode_barang')
            ->join('penjualan_barang', 'penjualan_barang.penjualan_barang_id = detail_penjualan_barang.id_penjualan_barang')
            ->where('penjualan_barang.tanggal_penjualan >=', $tanggalMulai)
            ->where('penjualan_barang.tanggal_penjualan <=', $tanggalAkhir)
            ->get()
            ->getRow()
            ->total_hpp;
        // Query untuk mendapatkan total biaya operasional dari model PengeluaranModel
        $pengeluaranModel = new PengeluaranModel();
        $totalBiayaOperasional = $pengeluaranModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulai)
            ->where('tanggal <=', $tanggalAkhir)
            ->first()['jumlah'];


        $gaji = $pengeluaranModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulai)
            ->where('tanggal <=', $tanggalAkhir)
            ->where('keterangan', 'gaji')
            ->first()['jumlah'];


        $listrik = $pengeluaranModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulai)
            ->where('tanggal <=', $tanggalAkhir)
            ->where('keterangan', 'listrik')
            ->first()['jumlah'];


        $air = $pengeluaranModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulai)
            ->where('tanggal <=', $tanggalAkhir)
            ->where('keterangan', 'air')
            ->first()['jumlah'];


        // $pembelian_restok = $pengeluaranModel
        //     ->selectSum('jumlah')
        //     ->where('tanggal >=', $tanggalMulai)
        //     ->where('tanggal <=', $tanggalAkhir)
        //     ->where(function($builder) {
        //         $builder->like('keterangan', 'Pembelian', 'both'); // Mengandung kata 'Pembelian'
        //         $builder->orLike('keterangan', 'Restok', 'both'); // Atau mengandung kata 'Restok'
        //     })
        //     ->first()['jumlah'];
        $beliDanRestok = $pengeluaranModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulai)
            ->where('tanggal <=', $tanggalAkhir)
            ->groupStart()
            ->like('keterangan', 'Pembelian')
            ->orLike('keterangan', 'Restok')
            ->orLike('keterangan', 'lainnya')
            ->groupEnd()
            ->first()['jumlah'];

        $labaKotor = $totalPenjualan - $totalHPP;
        $labaBersih = $labaKotor - $totalBiayaOperasional;
        $builder = $db->table('users');
        $builder->select('users.fullname');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->where('auth_groups_users.group_id', 3);
        $query = $builder->get();
        $pemilikData = $query->getRow();
        $pemilikName = $pemilikData ? $pemilikData->fullname : 'Nama Pemilik Tidak Ditemukan';

        // Menyiapkan data untuk dikirim ke view
        $data['pemilikName'] = $pemilikName;
        $data['listrik'] = $listrik;
        $data['air'] = $air;
        $data['beliDanRestok'] = $beliDanRestok;
        $data['gaji'] = $gaji;
        $data['tanggalMulai'] = $tanggalMulai;
        $data['tanggalAkhir'] = $tanggalAkhir;
        $data['totalPenjualan'] = $totalPenjualan;
        $data['totalHPP'] = $totalHPP;
        $data['totalBiayaOperasional'] = $totalBiayaOperasional;
        $data['labaKotor'] = $labaKotor;
        $data['labaBersih'] = $labaBersih;
        // dd($data);
        // Load view dan generate PDF
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = true;
        $mpdf->AliasNbPages();

        // Mengatur header dan footer
        $mpdf->SetFooter('Halaman {PAGENO} dari {nbpg}');

        $html = view('Admin/Laporan/Lap_labaRugi', $data);

        $mpdf->setAutoPageBreak(true);

        $options = [
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ],
        ];

        $mpdf->AddPageByArray(['orientation' => 'P'] + $options);

        $mpdf->WriteHtml($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('Laporan Laba Rugi.pdf', 'I');
    }

    // Fungsi untuk mendapatkan stok barang saat ini
    private function getStokSaatIni()
    {
        // Query untuk mendapatkan total stok barang saat ini
        $barangModel = new BarangModel();
        $totalStok = $barangModel
            ->selectSum('stok')
            ->where('stok >', 0)
            ->first();

        return $totalStok['stok'] ?? 0;
    }

    public function cetakArusKas()
    {
        $tanggalMulai = $this->request->getPost('tanggal_mulai');
        $tanggalAkhir = $this->request->getPost('tanggal_akhir');

        // Validasi input
        if (!$tanggalMulai || !$tanggalAkhir) {
            return redirect()->back()->with('error', 'Tanggal mulai dan akhir harus diisi.');
        }

        // Load models
        $db = \Config\Database::connect();
        $penjualanModel = new PenjualanBarangModel();
        $restokModel = new restokModel();
        $kasModel = new KasModel();
        $pengeluaranModel = new PengeluaranModel();
        $asetModel = new asetModel();
        $hutangModel = new hutangModel();
        $piutangModel = new piutangModel();
        $pembayaranPiutangModel = new pembayaranPiutangModel();
        $modalTokoModel = new modalTokoModel();

        $latest_kas = $kasModel->orderBy('id_kas', 'DESC')->first();
        $saldo_terakhir = $latest_kas ? $latest_kas['saldo_terakhir'] : 0;

        $totalPiutang = $piutangModel->getTotalPiutangByDateRange($tanggalMulai, $tanggalAkhir);
        $totalPenjualan = $penjualanModel->getTotalPenjualanByDateRange($tanggalMulai, $tanggalAkhir);
        $totalPemasukan = $kasModel->getTotalPemasukanByDateRange($tanggalMulai, $tanggalAkhir);
        $totalPengeluaran = $pengeluaranModel->getTotalPengeluaranByDateRange($tanggalMulai, $tanggalAkhir);
        $totalPembelianAset = $asetModel->getTotalPembelianAsetByDateRange();
        $totalModal = $modalTokoModel->getTotalModalByDateRange();
        $totalPenerimaanPinjaman = $hutangModel->getTotalPenerimaanPinjamanByDateRange($tanggalMulai, $tanggalAkhir);
        $totalPembayaranPiutang = $pembayaranPiutangModel->getTotalPembayaranPiutangByDateRange($tanggalMulai, $tanggalAkhir);

        // Perhitungan arus kas
        $totalKasMasuk = $this->db->table('kas_toko')
            ->select('SUM(jumlah_akhir - jumlah_awal) AS total_masuk', false)
            ->where('jenis_transaksi', 'penerimaan')
            ->get()
            ->getRow()->total_masuk;
        $totalKasKeluar = $this->db->table('kas_toko')
            ->select('SUM(jumlah_awal - jumlah_akhir) AS total_keluar', false)
            ->where('jenis_transaksi', 'pengeluaran')
            ->get()
            ->getRow()->total_keluar;

        $arusKasOperasional = $totalPenjualan + $totalPemasukan - $totalPengeluaran;
        $arusKasInvestasi = 0 - $totalPembelianAset;
        $arusKasPendanaan = $totalPenerimaanPinjaman - $totalPembayaranPiutang;
        $arusKasBersih = $arusKasOperasional + $arusKasInvestasi + $arusKasPendanaan;
        $total_keseluruhan = $totalPiutang + $totalPembelianAset + $saldo_terakhir;
        $latest_kas = $kasModel->orderBy('id_kas', 'DESC')->first();
        $saldo_terakhir = $latest_kas ? $latest_kas['saldo_terakhir'] : 0;
        $builder = $db->table('users');
        $builder->select('users.fullname');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->where('auth_groups_users.group_id', 3);
        $query = $builder->get();
        $pemilikData = $query->getRow();
        $pemilikName = $pemilikData ? $pemilikData->fullname : 'Nama Pemilik Tidak Ditemukan';

        // Menyiapkan data untuk ditampilkan dalam view
        $data = [
            'pemilikName' => $pemilikName,
            'totalKasMasuk' => $totalKasMasuk,
            'totalKasKeluar' => $totalKasKeluar,
            'totalPenjualan' => $totalPenjualan,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'totalAset' => $totalPembelianAset,
            'hutang' => $totalPenerimaanPinjaman,
            'totalPembayaranPiutang' => $totalPembayaranPiutang,
            'arusKasOperasional' => $arusKasOperasional,
            'arusKasInvestasi' => $arusKasInvestasi,
            'arusKasPendanaan' => $arusKasPendanaan,
            'arusKasBersih' => $arusKasBersih,
            'kas' => $saldo_terakhir, // Pastikan variabel ini ada di sini
            'tanggalMulai' => $tanggalMulai,
            'tanggalAkhir' => $tanggalAkhir,
            'totalPiutang' => $totalPiutang,
            'totalModalToko' => $totalModal,
            'total_keseluruhan' => $totalPiutang + $totalPembelianAset + $saldo_terakhir,
        ];
        // dd($data);

        // Menyiapkan data untuk ditampilkan
        // $data = [
        //     'totalPenjualan' => $pembayaranPiutangModel,
        //     'totalPemasukan' => $totalPemasukan,
        //     'totalRestok' => $totalRestok,
        //     'totalPengeluaran' => $totalPengeluaran,
        //     'totalPembelianAset' => $totalPembelianAset,
        //     'totalPenerimaanPinjaman' => $totalPenerimaanPinjaman,
        //     'totalPiutang' => $totalPiutang,
        //     'totalHutang' => $totalHutang,
        //     'totalPembayaranPiutang' => $totalPembayaranPiutang,
        //     'arusKasOperasional' => $arusKasOperasional,
        //     // 'arusKasInvestasi' => $arusKasInvestasi,
        //     'arusKasPendanaan' => $arusKasPendanaan,
        //     'arusKasBersih' => $arusKasBersih,
        // ];

        // Menampilkan hasil sementara untuk debug
        // dd($data);

        // Load view untuk cetak laporan

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = true;
        $mpdf->AliasNbPages();

        // Mengatur header dan footer
        $mpdf->SetFooter('Halaman {PAGENO} dari {nbpg}');

        $html = view('Admin/Laporan/Lap_aruskas', $data);

        $mpdf->setAutoPageBreak(true);

        $options = [
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ],
        ];

        $mpdf->AddPageByArray(['orientation' => 'L'] + $options);

        $mpdf->WriteHtml($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('Laporan Laba Rugi.pdf', 'I');
    }


    public function analisisArusKas()
    {
        $tanggalMulai = $this->request->getPost('tanggal_mulai');
        $tanggalAkhir = $this->request->getPost('tanggal_akhir');
        //   dd($tanggalMulai,$tanggalAkhir);
        // Validasi input
        if (!$tanggalMulai || !$tanggalAkhir) {
            return redirect()->back()->with('error', 'Tanggal mulai dan akhir harus diisi.');
        }

        $penjualanModel = new PenjualanBarangModel();
        $totalPenjualan = $penjualanModel
            ->selectSum('total_penjualan')
            ->where('tanggal_penjualan >=', $tanggalMulai)
            ->where('tanggal_penjualan <=', $tanggalAkhir)
            ->first()['total_penjualan'];

        // Query untuk mendapatkan total harga beli barang dari model BarangModel
        $barangModel = new BarangModel();
        $totalHargaBeli = $barangModel
            ->selectSum('harga_beli')
            ->first()['harga_beli'];

        // Query untuk mendapatkan total biaya operasional dari model PengeluaranModel
        $pengeluaranModel = new PengeluaranModel();
        $totalBiayaOperasional = $pengeluaranModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulai)
            ->where('tanggal <=', $tanggalAkhir)
            ->first()['jumlah'];

        // Perhitungan total arus kas
        $totalArusKas = $totalPenjualan - $totalHargaBeli - $totalBiayaOperasional;

        // Query untuk mendapatkan data penjualan tahun sebelumnya
        $tanggalMulaiTahunSebelumnya = date('Y-m-d', strtotime($tanggalMulai . ' -1 year'));
        $tanggalAkhirTahunSebelumnya = date('Y-m-d', strtotime($tanggalAkhir . ' -1 year'));
        $totalPenjualanTahunSebelumnya = $penjualanModel
            ->selectSum('total_penjualan')
            ->where('tanggal_penjualan >=', $tanggalMulaiTahunSebelumnya)
            ->where('tanggal_penjualan <=', $tanggalAkhirTahunSebelumnya)
            ->first()['total_penjualan'];

        // Query untuk mendapatkan total harga beli barang tahun sebelumnya
        $totalHargaBeliTahunSebelumnya = $barangModel
            ->selectSum('harga_beli')
            ->where('created_at >=', $tanggalMulaiTahunSebelumnya)
            ->where('created_at <=', $tanggalAkhirTahunSebelumnya)
            ->first()['harga_beli'];

        // Query untuk mendapatkan total biaya operasional tahun sebelumnya
        $totalBiayaOperasionalTahunSebelumnya = $pengeluaranModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulaiTahunSebelumnya)
            ->where('tanggal <=', $tanggalAkhirTahunSebelumnya)
            ->first()['jumlah'];

        // Perhitungan total aktivitas operasional
        $totalAktivitasOperasional = $totalPenjualan - $totalHargaBeli - $totalBiayaOperasional;
        $totalAktivitasOperasionalTahunSebelumnya = $totalPenjualanTahunSebelumnya - $totalHargaBeliTahunSebelumnya - $totalBiayaOperasionalTahunSebelumnya;

        // Query untuk mendapatkan total penerimaan penjualan
        $pemasukanModel = new PemasukanModel();
        $totalPenerimaanPenjualan = $pemasukanModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulai)
            ->where('tanggal <=', $tanggalAkhir)
            ->where('keterangan', 'Penjualan')
            ->first()['jumlah'];

        // Query untuk mendapatkan total penerimaan penjualan aset tetap
        $totalPenerimaanAsetTetap = $pemasukanModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulai)
            ->where('tanggal <=', $tanggalAkhir)
            ->where('keterangan', 'Penerimaan Penjualan Aset Tetap')
            ->first()['jumlah'];

        // Query untuk mendapatkan total penerimaan penjualan aset tetap tahun sebelumnya
        $totalPenerimaanAsetTetapTahunSebelumnya = $pemasukanModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulaiTahunSebelumnya)
            ->where('tanggal <=', $tanggalAkhirTahunSebelumnya)
            ->where('keterangan', 'Penerimaan Penjualan Aset Tetap')
            ->first()['jumlah'];

        // Query untuk mendapatkan total pembayaran pembelian aset tetap tahun sebelumnya
        $totalPembayaranAsetTetapTahunSebelumnya = $pengeluaranModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulaiTahunSebelumnya)
            ->where('tanggal <=', $tanggalAkhirTahunSebelumnya)
            ->where('keterangan', 'Pembayaran Pembelian Aset Tetap')
            ->first()['jumlah'];

        // Query untuk mendapatkan total pembayaran pembelian aset tetap
        $totalPembayaranAsetTetap = $pengeluaranModel
            ->selectSum('jumlah')
            ->where('tanggal >=', $tanggalMulai)
            ->where('tanggal <=', $tanggalAkhir)
            ->where('keterangan', 'Pembayaran Pembelian Aset Tetap')
            ->first()['jumlah'];

        $totalArusKasTahunSebelumnya = $totalPenjualanTahunSebelumnya - $totalHargaBeliTahunSebelumnya - $totalBiayaOperasionalTahunSebelumnya;

        // Inisialisasi nilai kasAwal dan kasAwalTahunSebelumnya dengan totalArusKasTahunSebelumnya
        $kasAwal = $kasAwalTahunSebelumnya = $totalArusKasTahunSebelumnya;

        // Perhitungan kasAkhir dan kasAkhirTahunSebelumnya
        $kasAkhir = $kasAwal + $totalArusKas;
        $kasAkhirTahunSebelumnya = $kasAwalTahunSebelumnya + $totalArusKasTahunSebelumnya;

        // Perhitungan total aktivitas investasi
        $totalAktivitasInvestasi = $totalPenerimaanAsetTetap - $totalPembayaranAsetTetap;

        // Perhitungan total aktivitas investasi tahun sebelumnya
        $totalAktivitasInvestasiTahunSebelumnya = $totalPenerimaanAsetTetapTahunSebelumnya - $totalPembayaranAsetTetapTahunSebelumnya;
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.fullname');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->where('auth_groups_users.group_id', 3);
        $query = $builder->get();
        $pemilikData = $query->getRow();
        $pemilikName = $pemilikData ? $pemilikData->fullname : 'Nama Pemilik Tidak Ditemukan';

        // Menyiapkan data untuk dikirim ke view
        $data['pemilikName'] = $pemilikName;

        $data['kasAwal'] = $kasAwal;
        $data['kasAkhir'] = $kasAkhir;
        $data['kasAwalTahunSebelumnya'] = $kasAwalTahunSebelumnya;
        $data['kasAkhirTahunSebelumnya'] = $kasAkhirTahunSebelumnya;

        $data['tanggalMulai'] = $tanggalMulai;
        $data['tanggalAkhir'] = $tanggalAkhir;
        $data['totalPenjualan'] = $totalPenjualan;
        $data['totalHargaBeli'] = $totalHargaBeli;
        $data['totalBiayaOperasional'] = $totalBiayaOperasional;
        $data['totalArusKas'] = $totalArusKas;
        $data['totalPenerimaanPenjualan'] = $totalPenerimaanPenjualan;
        $data['totalPenerimaanAsetTetap'] = $totalPenerimaanAsetTetap;
        $data['totalPembayaranAsetTetap'] = $totalPembayaranAsetTetap;
        $data['totalPenjualanTahunSebelumnya'] = $totalPenjualanTahunSebelumnya;
        $data['totalHargaBeliTahunSebelumnya'] = $totalHargaBeliTahunSebelumnya;
        $data['totalBiayaOperasionalTahunSebelumnya'] = $totalBiayaOperasionalTahunSebelumnya;
        $data['totalAktivitasOperasional'] = $totalAktivitasOperasional;
        $data['totalAktivitasInvestasi'] = $totalAktivitasInvestasi;
        $data['totalArusKasTahunSebelumnya'] = $totalArusKasTahunSebelumnya;
        $data['totalPembayaranAsetTetapTahunSebelumnya'] = $totalPembayaranAsetTetapTahunSebelumnya;
        $data['totalAktivitasOperasionalTahunSebelumnya'] = $totalAktivitasOperasionalTahunSebelumnya;
        $data['totalPenerimaanAsetTetapTahunSebelumnya'] = $totalPenerimaanAsetTetapTahunSebelumnya;
        $data['totalAktivitasInvestasiTahunSebelumnya'] = $totalAktivitasInvestasiTahunSebelumnya;

        // Load view dan generate PDF
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = true;
        $mpdf->AliasNbPages();

        // Mengatur header dan footer
        $mpdf->SetFooter('Halaman {PAGENO} dari {nbpg}');
        $html = view('Admin/Laporan/Lap_analisisArusKas', $data);

        $mpdf->setAutoPageBreak(true);

        $options = [
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ],
        ];

        $mpdf->AddPageByArray(['orientation' => 'L'] + $options);

        $mpdf->WriteHtml($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('Laporan Analisis Arus Kas.pdf', 'I');
    }

    // tambah user
    public function kelola_user()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        $groupModel = new GroupModel();
        $no = 1;

        foreach ($data['users'] as $row) {
            $dataRow['group'] = $groupModel->getGroupsForUser($row->id);
            $dataRow['row'] = $row;
            $dataRow['no'] = $no++;
            $data['row' . $row->id] = view('Admin/User/Row', $dataRow);
        }
        $data['groups'] = $groupModel->findAll();
        $data['title'] = 'Daftar Pengguna';
        return view('Admin/User/Index', $data);
    }

    public function tambah_user()
    {

        $data = [
            'title' => 'e-Posyandu - Tambah Users',
        ];
        return view('/Admin/User/Tambah', $data);
    }

    public function changeGroup()
    {
        $userId = $this->request->getVar('id');
        $groupId = $this->request->getVar('group');
        $groupModel = new GroupModel();
        $groupModel->removeUserFromAllGroups(intval($userId));
        $groupModel->addUserToGroup(intval($userId), intval($groupId));
        return redirect()->to(base_url('/Admin/kelola_user'));
    }

    public function changePassword()
    {
        $userId = $this->request->getVar('user_id');

        $password_baru = $this->request->getVar('password_baru');
        $userModel = new \App\Models\User();
        $user = $userModel->getUsers($userId);
        // $dataUser->update($userId, ['password_hash' => password_hash($password_baru, PASSWORD_DEFAULT)]);
        $userEntity = new User($user);
        $userEntity->password = $password_baru;
        $userModel->save($userEntity);
        return redirect()->to(base_url('Admin/kelola_user'));
    }

    public function activateUser($id, $active)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user) {
            $userModel->update($id, ['active' => $active]);
            return redirect()->back()->with('success', 'Status pengguna berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
    }


    public function restok()
    {
        $detailRestokModel = new DetailRestokModel();
        $restokModel = new RestokModel();

        // Mengisi data lainnya
        $data = [
            'title' => 'Restok - Hera',
            'dataRestok' => $restokModel->getRestok(),
        ];
        // dd($data);
        // Mengirimkan data ke view
        return view('Admin/Restok/Index', $data);
    }

    public function detailRestok($id)
    {
        $detailRestokModel = new DetailRestokModel();
        $restokModel = new RestokModel();

        // dd($id);
        $data = [
            'title' => 'Detail Restok - Hera',
            'dataDetailRestok' => $detailRestokModel->getDetailRestok($id),
            'detail' => $restokModel->getRestok($id),
        ];

        // dd($data);

        return view('Admin/Restok/Detail', $data);
    }

    public function tambahRestok()
    {
        $latest_kas = $this->KasModel->orderBy('id_kas', 'DESC')->first();

        // Mendapatkan saldo terakhir
        $saldo_terakhir = $latest_kas['saldo_terakhir'];
        $data = [
            'saldo_terakhir' => $saldo_terakhir,
            'validation' => $this->validation,
            'title' => 'Tambah Stok',
            'barangList' => $this->BarangModel
                ->select('barang.*, barang.nama_brg, satuan.nama_satuan, barang.merk,  barang.jenis_brg')

                ->join('satuan', 'satuan.satuan_id = barang.id_satuan')
                ->findAll(),
            'selectedBarang' => null,
            'pelangganList' => $this->PelangganModel->findAll(),
            'supplierList' => $this->supplierModel->findAll(),
        ];

        $kode_barang = $this->request->getPost('kode_barang');
        if ($kode_barang) {
            $selectedBarang = $this->BarangModel->find($kode_barang);
            if ($selectedBarang) {
                $data['selectedBarang'] = $selectedBarang;
            }
        }

        $query = $this->db->table('restok')
            ->select('restok.*, detail_restok.*, supplier.*')
            ->join('detail_restok', 'detail_restok.id_restok = restok.restok_id')
            ->join('supplier', 'supplier.id_supplier = restok.id_supplier')
            ->get();

        $data['restokData'] = $query->getResult();

        return view('Admin/Restok/TambahRestok', $data);
    }

    public function simpanRestok()
    {
        // Inisialisasi model
        $barangModel = new BarangModel();
        $RestokModel = new restokModel();
        $hutangModel = new hutangModel();
        $modalTokoModel = new modalTokoModel();
        $detailRestokModel = new detailRestokModel();
        $supplierModel = new supplierModel();
        $kasModel = new KasModel(); // Tambahkan inisialisasi untuk KasModel
        $PengeluaranModel = new PengeluaranModel();
        // Mendapatkan saldo terakhir
        $latest_kas = $kasModel->orderBy('id_kas', 'DESC')->first();
        $saldo_terakhir = $latest_kas['saldo_terakhir'];

        // Mendapatkan data dari request
        $kode_restok = 'RST-' . date('Ymdhis') . rand(100, 999);
        $id_supplier = $this->request->getPost('id_supplier');
        $hutang = 0;

        // Menghitung jumlah uang yang dibayarkan oleh pelanggan
        $jumlah_uang = filter_var($this->request->getPost('jumlah_uang'), FILTER_SANITIZE_NUMBER_INT);

        // Mengurangi jumlah uang yang dibayarkan dari saldo terakhir
        $newBalance = $saldo_terakhir - $jumlah_uang;

        // Menyimpan data restok
        $data_restok = [
            'restok_id' => $kode_restok,
            'id_supplier' => $id_supplier,
            'tanggal' =>  date('Y-m-d H:i:s'),
            'jumlah_pembayaran' => filter_var($this->request->getPost('jumlah_pembayaran'), FILTER_SANITIZE_NUMBER_INT),
            'jumlah_uang' => $jumlah_uang, // Simpan jumlah uang yang dibayarkan
            'kembalian' => filter_var($this->request->getPost('kembalian'), FILTER_SANITIZE_NUMBER_INT),
        ];
        $RestokModel->insert($data_restok);

        // Mengambil data barang dari request dan memprosesnya
        $data = $this->request->getPost();
        foreach ($data['kode_barang'] as $key => $value) {
            // Menyiapkan data detail restok
            $data_detail_restok = [
                'id_restok' => $kode_restok,
                'kode_barang' => $value,
                'harga_beli' => filter_var($data['harga'][$key], FILTER_SANITIZE_NUMBER_INT),
                'jumlah_restok' => $data['jumlah'][$key],
                'sub_total' => filter_var($data['sub_total'][$key], FILTER_SANITIZE_NUMBER_INT),
                'status_bayar' => $data['status_bayar'][$key],
            ];

            // Memasukkan data detail restok ke dalam database
            $detailRestokModel->insert($data_detail_restok);

            // Mendapatkan data barang dari database
            $barang = $barangModel->getBarang($value);

            // Mengupdate stok barang
            $data_barang = [
                'stok' => $barang['stok'] + $data['jumlah'][$key],
            ];
            $barangModel->update($value, $data_barang);

            // Memproses pembayaran hutang
            if ($data['status_bayar'][$key] == 'hutang') {
                $hutang += filter_var($data['sub_total'][$key], FILTER_SANITIZE_NUMBER_INT);
                $data_hutang = [
                    'keterangan' => 'Hutang Restok ' . $kode_restok . '(' . $barang['nama_brg'] . ')',
                    'jumlah' => $hutang,
                    'tanggal' =>  date('Y-m-d H:i:s'),
                ];
                $hutangModel->insert($data_hutang);
            }
        }

        // Menyimpan data ke dalam tabel kas
        $data_pengeluaran = [
            'tanggal' =>  date('Y-m-d H:i:s'),

            'keterangan' => 'Restok barang', // Keterangan transaksi
            'jumlah' => filter_var($this->request->getPost('jumlah_pembayaran'), FILTER_SANITIZE_NUMBER_INT), // Saldo sebelum restok

        ];

        // Simpan data ke dalam tabel kas
        $PengeluaranModel->insert($data_pengeluaran);

        $data_pengeluaran = [
            'tanggal' =>  date('Y-m-d H:i:s'),
            'jenis_transaksi' => 'pengeluaran', // Misalnya, restok barang
            'keterangan' => 'Restok barang', // Keterangan transaksi
            'jumlah_awal' => $saldo_terakhir, // Saldo sebelum restok
            'jumlah_akhir' => $jumlah_uang, // Pengurangan saldo karena pembayaran
            'saldo_terakhir' => $newBalance, // Saldo terbaru setelah restok
        ];

        // Simpan data ke dalam tabel kas
        $kasModel->insert($data_pengeluaran);

        // Mengurangi saldo terakhir di kas
        $kasModel->updateLastBalance($newBalance);

        // Redirect dan set pesan berhasil
        session()->setFlashdata('pesanBerhasil', 'Data restok berhasil ditambahkan');
        return redirect()->to('/admin/restok');
    }


    public function deleteRestok($id)
    {
        $restokModel = new RestokModel();
        $detailRestokModel = new DetailRestokModel();
        $barangModel = new BarangModel();
        $hutangModel = new HutangModel();

        $restok = $restokModel->where('restok_id', $id)->first();
        // dd($restok);
        if (!$restok) {
            session()->setFlashdata('pesanBerhasil', 'Data restok tidak ditemukan');
            return redirect()->to('/admin/restok');
        }

        $detailRestok = $detailRestokModel->where('id_restok', $id)->findAll();
        // dd($detailRestok);

        if ($detailRestok) {
            foreach ($detailRestok as $detail) {
                $barang = $barangModel->getBarang($detail['kode_barang']);
                // dd($barang);
                $data_barang = [
                    'stok' => $barang['stok'] - $detail['jumlah_restok'],
                ];
                $barangModel->update($detail['kode_barang'], $data_barang);

                if ($detail['status_bayar'] == 'hutang') {
                    $hutangModel->where('keterangan', 'Hutang Restok ' . $id . '(' . $barang['nama_brg'] . ')')->delete();
                }
            }
        }

        $restokModel->where('restok_id', $id)->delete();
        $detailRestokModel->where('id_restok', $id)->delete();

        session()->setFlashdata('message', 'Data restok berhasil dihapus');
        return redirect()->to('/admin/restok');
    }



    public function posyandu()
    {
        $data = [
            'title' => 'Data Posyandu',
            // 'posyandu' => $this->PosyanduModel->findAll(),
            'posyandu' => $this->PosyanduModel->getPosyanduWithKader(),  // Mengambil semua data posyandu
        ];
        // dd($data);
        return view('Admin/Posyandu/Index', $data); // Menampilkan view untuk data posyandu
    }

    public function tambahPosyandu()
    {
        $userModel = new UserModel(); // Pastikan model ini sesuai dengan nama model Anda
        $users = $userModel->findAll(); // Mengambil semua data user

        $data = [
            'title' => 'Tambah Posyandu',
            'validation' => $this->validation,
            'users' => $users, // Kirim data user ke view
        ];
        return view('Admin/Posyandu/Tambah', $data); // Menampilkan view untuk tambah data posyandu
    }

    public function savePosyandu()
    {
        // Validasi input
        if (!$this->validate([
            'nama_posyandu' => [
                'rules' => 'required|is_unique[posyandu.nama_posyandu]',
                'errors' => [
                    'required' => 'Nama posyandu harus diisi',
                    'is_unique' => 'Nama posyandu sudah ada',
                ],
            ],
            'kader_posyandu' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Kader harus dipilih',
                    'integer' => 'ID kader tidak valid',
                ],
            ],
        ])) {
            return redirect()->to('/admin/posyandu/tambah')->withInput();
        }

        // Ambil data dari form
        $data = [
            'nama_posyandu' => $this->request->getPost('nama_posyandu'),
            'alamat_posyandu' => $this->request->getPost('alamat_posyandu'),
            'kader_posyandu' => $this->request->getPost('kader_posyandu'), // Ambil ID kader yang dipilih
        ];

        // Simpan data ke model
        // dd($data);
        $this->PosyanduModel->insert($data);

        // Set flash message dan redirect
        session()->setFlashdata('pesan', 'Data posyandu berhasil ditambahkan');
        return redirect()->to('/admin/posyandu');
    }

    public function editPosyandu($id)
    {
        // Ambil data posyandu berdasarkan ID
        // $data['posyandu'] = $this->PosyanduModel->find($id);
        $userModel = new UserModel(); // Pastikan model ini sesuai dengan nama model Anda
        $users = $userModel->findAll();
        $data = [
            'title' => 'Edit Posyandu',
            'validation' => $this->validation,
            'posyandu' => $this->PosyanduModel->find($id),
            'users' => $users, // Kirim data user ke view
        ];
        // Pastikan data ditemukan, jika tidak, redirect atau tampilkan pesan error
        if (!$data['posyandu']) {
            session()->setFlashdata('error', 'Data posyandu tidak ditemukan');
            return redirect()->to('/admin/posyandu');
        }

        // Kirim data ke view
        return view('admin/posyandu/EditPosyandu', $data);
    }

    public function updateposyandu()
    {

        // Validasi input
        if (!$this->validate([
            'nama_posyandu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama posyandu harus diisi',
                ],
            ],
            'alamat_posyandu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat posyandu harus diisi',
                ],
            ],
            'kader_posyandu' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Kader harus dipilih',
                    'integer' => 'ID kader tidak valid',
                ],
            ],
        ])) {
            return redirect()->to('/admin/posyandu/edit/' . $this->request->getPost('id'))->withInput();
        }

        // Ambil data dari form
        $id = $this->request->getPost('id');
        $data = [
            'nama_posyandu' => $this->request->getPost('nama_posyandu'),
            'alamat_posyandu' => $this->request->getPost('alamat_posyandu'),
            'kader_posyandu' => $this->request->getPost('kader_posyandu'),
        ];

        // Update data posyandu berdasarkan ID
        $this->PosyanduModel->update($id, $data);

        // Set flash message dan redirect
        session()->setFlashdata('pesan', 'Data posyandu berhasil diubah');
        return redirect()->to('/admin/posyandu');
    }

    public function deletePosyandu($id)
    {
        $this->PosyanduModel->delete($id);
        session()->setFlashdata('pesan', 'Data posyandu berhasil dihapus');
        return redirect()->to('/admin/posyandu');
    }

    // data balita
    public function balita()
    {
        $data = [
            'title' => 'Data Balita',
            'balita' => $this->DataBalitaModel->getBalitaWithPosyandu(),
        ];
        return view('Admin/Balita/Index', $data);
    }

    public function tambahBalita()
    {
        $posyanduModel = new PosyanduModel(); // Model untuk mengambil data posyandu
        $posyandus = $posyanduModel->findAll(); // Mengambil semua data posyandu

        $data = [
            'title' => 'Tambah Balita',
            'validation' => $this->validation,
            'posyandus' => $posyandus, // Kirim data posyandu ke view
        ];
        return view('Admin/Balita/Tambah', $data); // Menampilkan view untuk tambah data balita
    }

    public function saveBalita()
    {
        // Validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama balita harus diisi',
                ],
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin harus dipilih',
                ],
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir harus diisi',
                ],
            ],
            'nama_ortu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama orang tua harus diisi',
                ],
            ],
            'posyandu_id' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Posyandu harus dipilih',
                    'integer' => 'ID Posyandu tidak valid',
                ],
            ],
        ])) {
            return redirect()->to('/admin/balita/tambah')->withInput();
        }

        // Ambil data dari form
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'nama_ortu' => $this->request->getPost('nama_ortu'),
            'posyandu_id' => $this->request->getPost('posyandu_id'), // Ambil ID posyandu yang dipilih
        ];

        // Simpan data ke model
        $this->DataBalitaModel->insert($data);

        // Set flash message dan redirect
        session()->setFlashdata('pesan', 'Data balita berhasil ditambahkan');
        return redirect()->to('/admin/balita');
    }

    public function editBalita($id)
    {
        $posyanduModel = new PosyanduModel(); // Model untuk mengambil data posyandu
        $posyandus = $posyanduModel->findAll();
        $balita = $this->DataBalitaModel->find($id);

        if (!$balita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // Ambil data balita berdasarkan ID
        $data = [
            'title' => 'Edit Balita',
            'validation' => $this->validation,
            'balita' => $balita,
            'posyandus' => $posyandus, // Kirim data posyandu ke view
        ];

        // Pastikan data ditemukan, jika tidak, redirect atau tampilkan pesan error
        if (!$data['balita']) {
            session()->setFlashdata('error', 'Data balita tidak ditemukan');
            return redirect()->to('/admin/balita');
        }

        // Kirim data ke view
        return view('admin/balita/Edit', $data);
    }

    public function updateBalita($id)
    {
        if (!$this->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'nama_ortu' => 'required',
            'posyandu_id' => 'required',
        ])) {
            // Redirect kembali dengan error jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Cek apakah balita dengan ID tersebut ada di database
        $balita = $this->DataBalitaModel->find($id);

        if (!$balita) {
            // Jika tidak ditemukan, tampilkan pesan error
            return redirect()->back()->with('error', 'Data balita tidak ditemukan.');
        }

        // Update data balita berdasarkan ID yang diberikan
        $this->DataBalitaModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'nama_ortu' => $this->request->getPost('nama_ortu'),
            'posyandu_id' => $this->request->getPost('posyandu_id'),
        ]);
        return redirect()->to('/admin/balita');
    }

    public function deleteBalita($id)
    {
        $this->DataBalitaModel->delete($id);
        session()->setFlashdata('pesan', 'Data balita berhasil dihapus');
        return redirect()->to('/admin/balita');
    }


    // jenis imunisasi
    public function jenis_imunisasi()
    {
        $data = [
            'title' => 'Daftar Jenis Imunisasi',
            'jenis_imunisasi' => $this->JenisImunisasiModel->findAll(),
        ];

        return view('admin/jenis_imunisasi/index', $data);
    }

    // Function Create (Form tambah jenis imunisasi)
    public function tambahJenisImun()
    {
        $data = [
            'title' => 'Tambah Jenis Imunisasi',
        ];

        return view('admin/jenis_imunisasi/tambah', $data);
    }

    // Function untuk menyimpan data imunisasi
    public function saveJenisImun()
    {
        if (!$this->validate([
            'usia_anak' => 'required|numeric',
            'jenis_imunisasi' => 'required|min_length[3]|max_length[255]',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->JenisImunisasiModel->save([
            'usia_anak' => $this->request->getPost('usia_anak'),
            'jenis_imunisasi' => $this->request->getPost('jenis_imunisasi'),
        ]);

        return redirect()->to('/Admin/jenis_imunisasi')->with('pesanBerhasil', 'Jenis imunisasi berhasil ditambahkan.');
    }

    // Function Edit (Form edit jenis imunisasi)
    public function editJenisImun($id)
    {
        // Mencari jenis imunisasi berdasarkan ID
        $jenisImunisasi = $this->JenisImunisasiModel->find($id);

        // Jika tidak ditemukan, lemparkan pengecualian
        if (!$jenisImunisasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jenis Imunisasi dengan ID ' . $id . ' tidak ditemukan.');
        }

        // Jika ditemukan, siapkan data untuk ditampilkan di view
        $data = [
            'title' => 'Edit Jenis Imunisasi',
            'jenis_imunisasi' => $jenisImunisasi,  // Menyimpan data jenis imunisasi
             'validation' => $this->validation,
        ];

        // Mengembalikan view edit dengan data yang sesuai
        return view('admin/jenis_imunisasi/edit', $data);
    }


    // Function untuk mengupdate data imunisasi
    public function updateJenisImun($id)
    {
        // Validasi input dari form
        if (!$this->validate([
            'usia_anak' => 'required',
            'jenis_imunisasi' => 'required|min_length[3]|max_length[255]',
        ])) {
            // Jika validasi gagal, redirect kembali dengan input dan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari request
        $data = [
            'usia_anak' => $this->request->getPost('usia_anak'),
            'jenis_imunisasi' => $this->request->getPost('jenis_imunisasi'),
        ];

        // Update data di database
        $this->JenisImunisasiModel->update($id, $data);

        // Redirect ke halaman list jenis imunisasi dengan pesan berhasil
        return redirect()->to('/Admin/jenis_imunisasi')->with('pesanBerhasil', 'Jenis imunisasi berhasil diupdate.');
    }



    // Function Delete (Menghapus jenis imunisasi)
    public function deleteJenisImun($id)
    {
        $this->JenisImunisasiModel->delete($id);
        return redirect()->to('/Admin/jenis_imunisasi')->with('pesanBerhasil', 'Jenis imunisasi berhasil dihapus.');
    }


    // daftar hadir
    public function daftar_hadir()
    {
        $data = [
            'title' => 'Data Daftar Hadir',
            'daftar_hadir' => $this->DaftarHadirModel->findAll(),
        ];
        return view('Admin/Daftar_hadir/Index', $data);
    }

    public function Jadwal()
    {
        $data = [
            'title' => 'Daftar Jadwal Imunisasi',
            'jadwal' => $this->JadwalimunisasiModel->findAll(),
        ];

        return view('admin/jadwal/index', $data);
    }
    public function tambahJadwalPosyandu()
    {
        $userModel = new UserModel(); // Pastikan model ini sesuai dengan nama model Anda
        $users = $userModel->findAll();
        $data = [

            'title' => 'Daftar Jadwal Imunisasi',
            'validation' => $this->validation,
            'users' => $users,
        ];
        return view('Admin/jadwal/tambah', $data);
    }

    // Proses tambah jadwal Posyandu
    public function simpanJadwalPosyandu()
    {
        if (!$this->validate([
            'nama_posyandu' => 'required',
            'alamat_posyandu' => 'required',
            'kader_posyandu' => 'required',
            'bidan' => 'required',
            'tanggal' => 'required|valid_date',
            'jam' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('pesanGagal', 'Input tidak valid, periksa kembali.');
        }

        $this->JadwalimunisasiModel->save([
            'nama_posyandu' => $this->request->getPost('nama_posyandu'),
            'alamat_posyandu' => $this->request->getPost('alamat_posyandu'),
            'kader_posyandu' => $this->request->getPost('kader_posyandu'),
            'bidan' => $this->request->getPost('bidan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam')
        ]);

        return redirect()->to(base_url('Admin/Jadwal'))->with('pesanBerhasil', 'Jadwal berhasil ditambahkan');
    }
}
