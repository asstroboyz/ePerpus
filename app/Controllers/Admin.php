<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\asetModel;
use App\Models\BarangModel;
use App\Models\BukuRusakModel;
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
use App\Models\DataKunjunganModel;
use App\Models\HistoriPeminjamanModel;
use App\Models\JadwalimunisasiModel;
use App\Models\JenisBukuModel;
use App\Models\PeminjamModel;
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
    protected $DataKunjunganModel;
    protected $Profil;
    protected $PeminjamModel;
    protected $JenisBukuModel;
    protected $BukuRusakModel;
    protected $HistoriPeminjamanModel;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();


        $this->Profil = new Profil();

        $this->DataKunjunganModel = new DataKunjunganModel();
        $this->PeminjamModel = new PeminjamModel();
        $this->JenisBukuModel = new JenisBukuModel();
        $this->BukuRusakModel = new BukuRusakModel();
        $this->HistoriPeminjamanModel = new HistoriPeminjamanModel();


        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }



    public function index()
    {

        $data = [
            'title' => 'e-Perpus - Home',

        ];

        return view('Admin/dashboard/Index', $data);
    }

    public function user_list()
    {
        $data['title'] = 'User List';
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        $data['users'] = $query->getResult();
        return view('Admin/User_list', $data);
    }

    public function detail($id = 0)
    {
        $data['title'] = ' - Detail Pengguna';
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
            'title' => 'Profil - ',
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

    // Kunjungan menu
    public function kunjungan()
    {
        $kunjungan = new DataKunjunganModel();
        $data = [
            'kunjungan' => $kunjungan->getDataPengunjung(),
            'title' => 'Data Kunjungan Perpustakaaan',
        ];
        return view('admin/data_kunjungan/index', $data);
    }

    public function tambahkunjungan()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();
        $kunjungan = new DataKunjunganModel();
        $data = [
            'kunjungan' => $kunjungan->findAll(),
            'title' => 'Tambah Data Kunjungan Perpustakaaan',
            'users' => $users,
        ];
        return view('admin/data_kunjungan/add', $data);
    }

    public function saveKunjungan()
    {
        // Aturan validasi
        $rules = [
            'id_user' => 'required',
        ];


        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Jika validasi berhasil, simpan data
        $this->DataKunjunganModel->save([
            'id_user' => $this->request->getPost('id_user'),
            'tanggal_kunjungan' => date('Y-m-d'),

        ]);

        // Redirect ke halaman kunjungan dengan pesan sukses
        return redirect()->to('/Admin/kunjungan')->with('pesanBerhasil', 'Kunjungan berhasil ditambahkan.');
    }

    public function editKunjungan($id_kunjungan)
    {
        $kunjungan = $this->DataKunjunganModel->find($id_kunjungan);
        // dd( $kunjungan );
        if (!$kunjungan) {

            session()->setFlashdata('error', 'Data kunjungan tidak ditemukan.');
            return redirect()->to('/Admin/kunjungan');
        }

        $data = [
            'title' => 'Edit Data Kunjungan',
            'kunjungan' => $kunjungan,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/data_kunjungan/edit', $data);
    }

    public function updateDataKunjungan($id)
    {

        $kunjungan = new DataKunjunganModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'keanggotaan' => $this->request->getVar('keanggotaan'),
        ];
        // dd( $data );
        $kunjungan->update($id, $data);
        session()->setFlashData('pesan_tambah', 'Data Siswa Peminjam Berhasil Diupdate');
        return redirect()->to('admin/kunjungan');
    }

    // Hapus

    public function hapusdatakunjungan($id)
    {
        $model = new DataKunjunganModel();
        $getData = $model->getDataKunjungan($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataKunjungan($id);
            session()->setFlashData('pesan_hapus', 'Data berhasil dihapus');
            return redirect()->to('admin/kunjungan');
        } else {
            session()->setFlashData('pesan_hapus', 'Data gagal dihapus');
            return redirect()->to('admin/kunjungan');
        }
    }

    // end Kunjungan

    // Data Siswa peminjam
    public function Peminjam()
    {
        $peminjam = new PeminjamModel();
        $data = [
            'peminjam' => $peminjam->getDataPeminjam(),
            'title' => 'Data Peminjam Buku Perpustakaaan',
        ];
        return view('admin/data_peminjam/index', $data);
    }

    public function formTambahPeminjam()
    {
        $peminjam = new PeminjamModel();
        $data = [
            'peminjam' => $peminjam->findAll(),
            'title' => 'Tambah Data Peminjam Perpustakaaan',
        ];
        return view('admin/data_peminjam/add', $data);
    }

    public function savePeminjam()
    {
        // Aturan validasi
        $rules = [
            'nis' => 'required',
            'nama' => 'required',
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Jika validasi berhasil, simpan data
        $this->PeminjamModel->save([
            'nis' => $this->request->getVar('nis'),  // Pastikan kolom sesuai dengan tabel
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp')
        ]);

        return redirect()->to('/admin/Peminjam')->with('pesanBerhasil', 'Peminjam berhasil ditambahkan.');
    }

    //edit

    public function editPeminjam($id)
    {
        $peminjam = $this->PeminjamModel->find($id);
        if (!$peminjam) {
            // Jika data tidak ditemukan, tampilkan pesan error atau redirect
            session()->setFlashdata('error', 'Data peminjam tidak ditemukan.');
            return redirect()->to('/admin/peminjam');
        }

        $data = [
            'title' => 'Edit Data Peminjam',
            'peminjam' => $peminjam,
            'validation' => \Config\Services::validation(),
        ];
        // dd( $data );
        return view('admin/data_peminjam/edit', $data);
    }

    public function updateDataPeminjam($id)
    {
        // Validate the input fields
        if (!$this->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
        ])) {
            // If validation fails, redirect back with input and validation errors
            return redirect()->back()->withInput()->with('validation', \Config\Services::validation());
        }

        // Collect data from the form
        $data = [
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
        ];

        // Update the data in the database
        $this->PeminjamModel->update($id, $data);

        // Set success flash message and redirect
        session()->setFlashData('pesan_tambah', 'Data Peminjam Berhasil Diupdate');
        return redirect()->to('/admin/peminjam');
    }

    // Hapus

    public function hapusdataPeminjam($id)
    {
        $model = new PeminjamModel();
        $getData = $model->getDataPeminjam($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataPeminjam($id);
            session()->setFlashData('pesan_hapus', 'Data berhasil dihapus');
            return redirect()->to('admin/peminjam');
        } else {
            session()->setFlashData('pesan_hapus', 'Data gagal dihapus');
            return redirect()->to('admin/peminjam');
        }
    }
    // data siswa peminjam end

    // Jenis Buku
    public function JenisBuku()
    {
        $buku = new JenisBukuModel();
        $data = [
            'buku' => $buku->getDataBuku(),
            'title' => 'Data Jenis Buku Perpustakaaan',
        ];

        return view('admin/jenis_buku/index', $data);
    }

    public function formTambahJenisBuku()
    {
        $peminjam = new JenisBukuModel();
        $data = [
            'peminjam' => $peminjam->findAll(),
            'title' => 'Tambah Data Jenis Buku Perpustakaaan',
        ];
        return view('admin/jenis_buku/add', $data);
    }

    public function saveJenisBuku()
    {
        $model = new JenisBukuModel();

        // Generate kode buku otomatis di dalam function saveJenisBuku
        $lastEntry = $model->orderBy('kode_buku', 'DESC')->first();
        $lastKodeBuku = $lastEntry ? (int)substr($lastEntry['kode_buku'], 2) : 0;

        // Generate kode baru dengan prefix 'BK' dan increment
        $newKodeBuku = 'BK' . str_pad($lastKodeBuku + 1, 4, '0', STR_PAD_LEFT);

        // Validasi form input ( tanpa kode_buku karena sudah otomatis di-generate )
        if (!$this->validate([
            'judul_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Buku wajib diisi'
                ]
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pengarang wajib diisi'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penerbit wajib diisi'
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric|exact_length[4]',
                'errors' => [
                    'required' => 'Tahun Terbit wajib diisi',
                    'numeric' => 'Tahun Terbit harus berupa angka',
                    'exact_length' => 'Tahun Terbit harus terdiri dari 4 angka'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            $error = $validation->getErrors();
            $session = session();
            $session->setFlashdata('pesan_error', $error);
            return redirect()->back()->withInput();
        }

        // Ambil judul buku
        $judulBuku = $this->request->getVar('judul_buku');

        // Mengambil karakter acak dari judul buku
        $kataDariJudul = '';
        $kataArray = str_split(strtoupper($judulBuku));
        // Ubah judul menjadi array karakter

        // Ambil 3 karakter acak dari array
        $randomKeys = array_rand($kataArray, min(3, count($kataArray)));
        // Ambil kunci acak
        foreach ($randomKeys as $key) {
            $kataDariJudul .= $kataArray[$key];
            // Gabungkan karakter acak menjadi string
        }

        // Persiapan data untuk disimpan, kode buku otomatis disertakan
        $data = [
            'kode_buku' => $newKodeBuku . '-' . $kataDariJudul . '-' . (int)date('Y'), // Gabungkan kode buku dengan karakter acak dari judul dan tahun
            'judul_buku' => $judulBuku,
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'tempat_terbit' => $this->request->getVar('tempat_terbit'),
            'jumlah_buku' => $this->request->getVar('jumlah_buku'),
            'isbn' => $this->request->getVar('isbn'),
        ];

        // Insert data ke database
        $model->insert($data);

        // Redirect setelah sukses menyimpan
        return redirect()->to('/admin/JenisBuku')->with('pesanBerhasil', 'Buku berhasil ditambahkan.');
    }

    public function editJenisBuku($kode_buku)
    {
        $model = new JenisBukuModel();

        // Ambil data buku berdasarkan kode_buku
        $dataBuku = $model->find($kode_buku);

        // Jika buku tidak ditemukan, redirect dengan pesan error
        if (!$dataBuku) {
            return redirect()->to('/admin/JenisBuku')->with('pesan_error', 'Buku tidak ditemukan.');
        }

        // Siapkan data untuk dikirim ke view
        $data = [
            'dataBuku' => $dataBuku,
            'title' => 'Jenis Buku',
            'kode_buku' => $kode_buku // Mengirim kode buku untuk form action
        ];
        // dd( $data );
        // Tampilkan view form edit dengan data
        return view('admin/jenis_buku/edit', $data);
    }

    public function updateDataBuku($kode_buku)
    {

        // dd( $kode_buku );
        // Validate the input fields
        if (!$this->validate([
            'judul_buku' => 'required',

        ])) {
            // If validation fails, redirect back with input and validation errors
            return redirect()->back()->withInput()->with('validation', \Config\Services::validation());
        }

        // Collect data from the form
        $data = [
            'judul_buku' => $this->request->getPost('judul_buku'),
            'pengarang' => $this->request->getPost('pengarang'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'tempat_terbit' => $this->request->getPost('tempat_terbit'),
            'jumlah_buku' => $this->request->getPost('jumlah_buku'),
            'isbn' => $this->request->getPost('isbn')
        ];
        // dd( $data );
        // Update the data in the database
        $this->JenisBukuModel->update($kode_buku, $data);

        // Set success flash message and redirect
        session()->setFlashData('pesan_tambah', 'Data Peminjam Berhasil Diupdate');
        return redirect()->to('/admin/JenisBuku');
    }

    public function deleteDataBuku($kode_buku)
    {
        // Cek jika kode_buku tidak kosong
        if (empty($kode_buku)) {
            // Tangani kesalahan jika diperlukan
            return redirect()->back()->with('error', 'Kode Buku tidak valid');
        }

        // Hapus data dari database menggunakan model
        $deleted = $this->JenisBukuModel->delete($kode_buku);

        // Cek apakah penghapusan berhasil
        if ($deleted) {
            session()->setFlashData('pesan_hapus', 'Data Buku Berhasil Dihapus');
        } else {
            session()->setFlashData('pesan_error', 'Gagal menghapus data Buku');
        }

        // Redirect ke halaman daftar buku
        return redirect()->to('/admin/JenisBuku');
    }

    public function hapusdataJenisBuku($id)
    {
        $model = new PeminjamModel();
        $getData = $model->getDataPeminjam($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataPeminjam($id);
            session()->setFlashData('pesan_hapus', 'Data berhasil dihapus');
            return redirect()->to('admin/peminjam');
        } else {
            session()->setFlashData('pesan_hapus', 'Data gagal dihapus');
            return redirect()->to('admin/JenisBuku');
        }
    }
    // Jenis Buku End


    // Buku Rusak
    public function databukurusak()
    {
        session();
        $model = new BukuRusakModel();
        $data = [
            'bukurusak' => $model->getDataBukuRusak(),
            'title' => 'Data Buku Rusak',
        ];

        return view('admin/buku_rusak/index', $data);
    }

    public function tambahbukuRusak()
    {
        session();
        $modelBuku = new JenisBukuModel();
        $data = [
            'buku' => $modelBuku->getDataBuku(),
            'title' => 'Form Tambah Data Buku Rusak',
        ];
        return view('admin/buku_rusak/add', $data);
    }

    public function saveBukurusak()
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

        $kodeBukuRusak = $this->request->getPost('kode_buku_rusak');
        $kodeBuku = $this->request->getPost('judul_buku') ?? '';
        $data = [
            'kode_buku_rusak' => strtoupper($kodeBukuRusak),
            'kode_buku' => strtoupper($kodeBukuRusak),
            'jumlah_buku_rusak' => $this->request->getPost('jumlah_buku')
        ];
        // dd( $data );
        $model = new BukuRusakModel();
        $model->insert($data);
        session()->setFlashData('pesan_tambah', 'Data Buku Rusak Berhasil Ditambah');
        return redirect()->to('admin/databukurusak');
    }

    public function editBukurusak($id)
    {
        $model = new BukuRusakModel();
        $jenisBukuModel = new JenisBukuModel();
        // Inisialisasi JenisBukuModel

        $data['bukurusak'] = $model->find($id);
        $data['buku'] = $jenisBukuModel->findAll();
        // Ambil semua data dari JenisBukuModel
        $data['title'] = 'Buku Rusak Edit';

        if (!$data['bukurusak']) {
            session()->setFlashData('pesan_error', 'Data Buku Rusak tidak ditemukan');
            return redirect()->to('admin/databukurusak');
        }
        // dd( $data );

        return view('admin/buku_rusak/edit', $data);
    }

    public function updateBukurusak($id)
    {
        if (!$this->validate([
            'kode_buku' => 'required',

        ])) {
            // If validation fails, redirect back with input and validation errors
            return redirect()->back()->withInput()->with('validation', \Config\Services::validation());
        }

        // Collect data from the form
        $data = [
            'kode_buku' => $this->request->getPost('kode_buku'),
            'jumlah_buku_rusak' => $this->request->getPost('jumlah_buku_rusak'),

        ];
        // dd( $data );
        // Update the data in the database
        $this->BukuRusakModel->update($id, $data);

        // Set success flash message and redirect
        session()->setFlashData('pesan_tambah', 'Data Peminjam Berhasil Diupdate');

        return redirect()->to('admin/databukurusak');
    }
    // end Buku Rusak

}
