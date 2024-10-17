<?php

namespace App\Controllers;

use App\Models\BukuRusakModel;
use App\Models\JenisBukuModel;
use App\Models\profil;
use App\Models\DataKunjunganModel;
use Myth\Auth\Entities\passwd;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;
use App\Models\PeminjamModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User extends BaseController
{
    protected $db;
    protected $builder;
    public function __construct()
    {

        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->PeminjamModel = new PeminjamModel();
        $this->DataKunjunganModel = new DataKunjunganModel();
        $this->JenisBukuModel = new JenisBukuModel();
        // $this->DaftarHadirModel = new DaftarHadirModel();
        // $this->PosyanduModel = new PosyanduModel();
        // $this->DataBalitaModel = new DataBalitaModel();
        // $this->DataBalitaDetailModel = new DataBalitaDetailModel();
        // $this->JenisImunisasiModel = new JenisImunisasiModel();
        $this->profil = new profil();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $userlogin = user()->id;


        $data = [

            'title' => 'Home',
        ];
        // dd($data);
        return view('user/dashboard/index', $data);
    }
    public function updatePassword($id)
    {
        $passwordLama = $this->request->getPost('passwordLama');
        $passwordbaru = $this->request->getPost('passwordBaru');
        $konfirm = $this->request->getPost('konfirm');
        if ($passwordbaru != $konfirm) {
            session()->setFlashdata('error-msg', 'Password Baru tidak sesuai');
            return redirect()->to(base_url('admin/tentang/' . $id));
        }

        $builder = $this->db->table('users');
        $this->builder->where('id', user()->id);
        $query = $this->builder->get()->getRow();
        $verify_pass = password_verify(base64_encode(hash('sha384', $passwordLama, true)), $query->password_hash);

        // dd($passwordbaru);
        if ($verify_pass) {
            $users = model(UserModel::class);
            $entity = new passwd();
            $entity->setPassword($passwordbaru);
            $hash = $entity->password_hash;
            $users->update($id, ['password_hash' => $hash]);
            session()->setFlashdata('msg', 'Password berhasil Diubah');
            return redirect()->to('/user/tentang/' . $id);
        } else {
            session()->setFlashdata('error-msg', 'Password Lama tidak sesuai');
            return redirect()->to(base_url('user/tentang/' . $id));
        }
    }

    public function tentang()
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

        return view('user/home/profil', $data);
    }

    public function profile($id)
    {
        $userlogin = user()->username;
        $builder = $this->db->table('users');
        $builder->select('username,email,created_at');
        $query = $builder->where('username', $userlogin)->get()->getRowArray();
        $data = [

            'user' => $query,
            'validation' => $this->validation,
            'title' => 'Update Profile',
        ];
        // dd($data['user']);

        return view('user/profil/ubah_profil', $data);
    }

    public function simpanProfile($id)
    {
        $userlogin = user()->username;
        $builder = $this->db->table('users');
        $builder->select('*');
        $query = $builder->where('username', $userlogin)->get()->getRowArray();

        $foto = $this->request->getFile('foto');
        if ($foto->getError() == 4) {
            $this->profil->update($id, [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
            ]);
        } else {

            $nama_foto = 'UserFoto_' . $this->request->getPost('username') . '.' . $foto->guessExtension();
            if (!(empty($query['foto']))) {
                unlink('uploads/profile/' . $query['foto']);
            }
            $foto->move('uploads/profile', $nama_foto);

            $this->profil->update($id, [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'foto' => $nama_foto,
            ]);
        }
        session()->setFlashdata('msg', 'Profil Pengaduan  berhasil Diubah');
        return redirect()->to('/user');
    }

    public function kelola_user()
    {
        $userModel = new UserModel();
        $groupModel = new GroupModel();
        $posyanduId = user()->posyandu_id;
        $data['posyanduId'] = $posyanduId;
        // dd($posyanduId);
        $no = 1;
        $currentUser = user();

        $currentUser = user();
        $userGroups = $groupModel->getGroupsForUser($currentUser->id);

        // Mengumpulkan semua 'name' ke dalam array
        $groupNames = array_map(function ($group) {
            return $group['name'];
        }, $userGroups);

        // Mengonversi array menjadi string
        $groupNamesString = implode(',', $groupNames);

        // Menampilkan hasil
        // dd($groupNames);
        // Ambil data pengguna yang sesuai dengan posyandu_id pengguna yang login
        $data['users'] = $userModel->select('users.*, posyandu.nama_posyandu as posyandu_nama')
            ->join('posyandu', 'posyandu.id = users.posyandu_id', 'left')
            ->where('users.posyandu_id', $posyanduId) // Filter berdasarkan posyandu_id yang login
            ->orderBy('users.posyandu_id', 'ASC')
            ->findAll();

        // Iterasi data users untuk menambahkan data group
        foreach ($data['users'] as $row) {
            $dataRow['group'] = $groupModel->getGroupsForUser($row->id);
            $dataRow['row'] = $row;
            $dataRow['no'] = $no++;
            $data['row' . $row->id] = view('User/User/Row', $dataRow);
        }

        // Ambil semua group yang tersedia
        $data['groups'] = $groupModel->findAll();
        $data['groupNamesString'] = $groupNamesString;
        $data['title'] = 'Daftar Pengguna';
        // Tampilkan view dengan data yang sudah disusun
        return view('User/User/Index', $data);
    }


    // Kunjungan
    public function kunjungan()
    {
        $kunjungan = new DataKunjunganModel();
        $data = [
            'kunjungan' => $kunjungan->getDataKunjungan(),
            'title' => 'Data Kunjungan Perpustakaaan',
        ];
        return view('user/data_kunjungan/index', $data);
    }

    public function tambahkunjungan()
    {
        $kunjungan = new DataKunjunganModel();
        $data = [
            'kunjungan' => $kunjungan->findAll(),
            'title' => 'Tambah Data Kunjungan Perpustakaaan',
        ];
        return view('user/data_kunjungan/add', $data);
    }

    public function saveKunjungan()
    {
        // Aturan validasi
        $rules = [
            'nama' => 'required',
            'keanggotaan' => 'required',
        ];


        if (!$this->validate($rules)) {

            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Jika validasi berhasil, simpan data
        $this->DataKunjunganModel->save([
            'nama' => $this->request->getPost('nama'),
            'keanggotaan' => $this->request->getPost('keanggotaan'),
        ]);

        return redirect()->to('/User/kunjungan')->with('pesanBerhasil', 'Kunjungan berhasil ditambahkan.');
    }

    public function editKunjungan($id_kunjungan)
    {
        $kunjungan = $this->DataKunjunganModel->find($id_kunjungan);
        // dd($kunjungan);
        if (!$kunjungan) {
            // Jika data tidak ditemukan, tampilkan pesan error atau redirect
            session()->setFlashdata('error', 'Data kunjungan tidak ditemukan.');
            return redirect()->to('/user/kunjungan');
        }

        $data = [
            'title' => 'Edit Data Kunjungan',
            'kunjungan' => $kunjungan,
            'validation' => \Config\Services::validation(),
        ];

        return view('user/data_kunjungan/edit', $data);
    }

    public function updateDataKunjungan($id)
    {

        $kunjungan = new DataKunjunganModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'keanggotaan' => $this->request->getVar('keanggotaan'),
        ];
        // dd($data);
        $kunjungan->update($id, $data);
        session()->setFlashData('pesan_tambah', "Data Siswa Peminjam Berhasil Diupdate");
        return redirect()->to('user/kunjungan');
    }

    // Hapus
    public function hapusdatakunjungan($id)
    {
        $model = new DataKunjunganModel();
        $getData = $model->getDataKunjungan($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataKunjungan($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('user/kunjungan');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('user/kunjungan');
        }
    }

    // end Kunjungan

    // data Peminjam
    public function Peminjam()
    {
        $peminjam = new PeminjamModel();
        $data = [
            'peminjam' => $peminjam->getDataPeminjam(),
            'title' => 'Data Peminjam Buku Perpustakaaan',
        ];
        return view('user/data_peminjam/index', $data);
    }

    public function formTambahPeminjam()
    {
        $peminjam = new PeminjamModel();
        $data = [
            'peminjam' => $peminjam->findAll(),
            'title' => 'Tambah Data Peminjam Perpustakaaan',
        ];
        return view('user/data_peminjam/add', $data);
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

        return redirect()->to('/User/Peminjam')->with('pesanBerhasil', 'Peminjam berhasil ditambahkan.');
    }

    //edit
    public function editPeminjam($id)
    {
        $peminjam = $this->PeminjamModel->find($id);
        if (!$peminjam) {
            // Jika data tidak ditemukan, tampilkan pesan error atau redirect
            session()->setFlashdata('error', 'Data peminjam tidak ditemukan.');
            return redirect()->to('/user/peminjam');
        }

        $data = [
            'title' => 'Edit Data Peminjam',
            'peminjam' => $peminjam,
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('user/data_peminjam/edit', $data);
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
        session()->setFlashData('pesan_tambah', "Data Peminjam Berhasil Diupdate");
        return redirect()->to('/user/peminjam');
    }

    // Hapus
    public function hapusdataPeminjam($id)
    {
        $model = new PeminjamModel();
        $getData = $model->getDataPeminjam($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataPeminjam($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('user/peminjam');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('user/peminjam');
        }
    }
    // End data peminjam


    // Jenis Buku
    public function JenisBuku()
    {
        $buku = new JenisBukuModel();
        $data = [
            'buku' => $buku->getDataBuku(),
            'title' => 'Data Jenis Buku Perpustakaaan',
        ];

        return view('user/jenis_buku/index', $data);
    }

    public function formTambahJenisBuku()
    {
        $peminjam = new JenisBukuModel();
        $data = [
            'peminjam' => $peminjam->findAll(),
            'title' => 'Tambah Data Jenis Buku Perpustakaaan',
        ];
        return view('user/jenis_buku/add', $data);
    }

    public function saveJenisBuku()
    {
        // Validasi form input
        if (!$this->validate([
            'kode_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Buku Sudah Ada, Silahkan periksa lagi kode buku yang anda masukkan'
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
            'judul_buku' => $this->request->getVar('judul_buku'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'tempat_terbit' => $this->request->getVar('tempat_terbit'),
            'jumlah_buku' => $this->request->getVar('jumlah_buku'),
            'isbn' => $this->request->getVar('isbn'),
        ];
        // dd($data);
        $model->insert($data);
        return redirect()->to('/User/JenisBuku')->with('pesanBerhasil', 'Buku berhasil ditambahkan.');
    }


    //edit
    public function editJenisBuku($id)
    {
        $peminjam = $this->PeminjamModel->find($id);
        if (!$peminjam) {
            // Jika data tidak ditemukan, tampilkan pesan error atau redirect
            session()->setFlashdata('error', 'Data peminjam tidak ditemukan.');
            return redirect()->to('/user/JenisBuku');
        }

        $data = [
            'title' => 'Edit Data Peminjam',
            'peminjam' => $peminjam,
            'validation' => \Config\Services::validation(),
        ];

        return view('user/data_peminjam/edit', $data);
    }

    public function updateDataPeminjam1($id)
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
        session()->setFlashData('pesan_tambah', "Data Peminjam Berhasil Diupdate");
        return redirect()->to('/user/JenisBuku');
    }

    // Hapus
    public function hapusdataJenisBuku($id)
    {
        $model = new PeminjamModel();
        $getData = $model->getDataPeminjam($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataPeminjam($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('user/peminjam');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('user/JenisBuku');
        }
    }
    // Jenis Buku End


    // BUku RUsak
    public function databukurusak() {
        session();
        $model = new BukuRusakModel();
        $data = [
            'bukurusak' => $model->getDataBukuRusak(),
            'title' => 'Data Buku Rusak',
        ];

        return view('user/buku_rusak/index', $data);
    }

    public function tambahbukuRusak (){
        session();
        $modelBuku = new JenisBukuModel();
        $data = [
            'buku' => $modelBuku->getDataBuku(),
            'title' => 'Form Tambah Data Buku Rusak',
        ];
        return view('user/buku_rusak/add', $data);
    }
    
    public function saveBukurusak() {
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
            'kode_buku' =>strtoupper($kodeBukuRusak),
            'jumlah_buku_rusak' => $this->request->getPost('jumlah_buku')
        ];
        // dd($data);
        $model = new BukuRusakModel();
        $model->insert($data);
        session()->setFlashData('pesan_tambah', "Data Buku Rusak Berhasil Ditambah");
        return redirect()->to('user/databukurusak');
    }
    
    
// End Buku Rusak

}
