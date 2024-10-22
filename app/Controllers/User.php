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
use App\Models\HistoriPeminjamanModel;
use App\Models\PeminjamanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User extends BaseController
{
    protected $db;
    protected $builder;
    protected $HistoriPeminjamanModel;
    protected $PeminjamanModel;
    protected $PeminjamModel;

    public function __construct()
    {

        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->PeminjamModel = new PeminjamModel();
        $this->DataKunjunganModel = new DataKunjunganModel();
        $this->JenisBukuModel = new JenisBukuModel();
        $this->BukuRusakModel = new BukuRusakModel();
        $this->PeminjamanModel = new PeminjamanModel();
        $this->profil = new profil();
        $this->HistoriPeminjamanModel = new HistoriPeminjamanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $userlogin = user()->id;

        $data = [

            'title' => 'Home',
        ];
        // dd( $data );
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

        // dd( $passwordbaru );
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
        $role == '1' ? $role_echo = 'Admin' : $role_echo = 'Pegawai';
        // $data[ 'title' ] = 'User Profile ';
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

        // $data = $this->db->table( 'permintaan_barang' );
        // $query1 = $data->where( 'id_user', $userid )->get()->getResult();
        $builder = $this->db->table('users');
        $builder->select('id,username,fullname,email,created_at,foto');
        $builder->where('username', $userlogin);
        $query = $builder->get();
        // $semua = count( $query1 );
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
        // dd( $data[ 'user' ] );

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

        // dd( $posyanduId );
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
        // dd( $groupNames );
        // Ambil data pengguna yang sesuai dengan posyandu_id pengguna yang login
        $data['users'] = $userModel->select('users.*,')
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
            'kunjungan' => $kunjungan->getDataPengunjung(),
            'title' => 'Data Kunjungan Perpustakaaan',
        ];
        return view('user/data_kunjungan/index', $data);
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
        return view('user/data_kunjungan/add', $data);
    }

    public function saveKunjungan()
    {
        // Aturan validasi
        $rules = [
            'id_user' => 'required',
            // 'username' => 'required',
            // 'fullname' => 'required',
            // 'nis' => 'required',
            // 'kelas' => 'required',
            // 'alamat' => 'required',
            // 'no_hp' => 'required'
        ];

        // Jika validasi gagal
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Jika validasi berhasil, simpan data
        $this->DataKunjunganModel->save([
            'id_user' => $this->request->getPost('id_user'),
            'tanggal_kunjungan' => date('Y-m-d'),
            // 'fullname' => $this->request->getPost('fullname'),
            // 'nis' => $this->request->getPost('nis'),
            // 'kelas' => $this->request->getPost('kelas'),
            // 'alamat' => $this->request->getPost('alamat'),
            // 'no_hp' => $this->request->getPost('no_hp')
        ]);

        // Redirect ke halaman kunjungan dengan pesan sukses
        return redirect()->to('/User/kunjungan')->with('pesanBerhasil', 'Kunjungan berhasil ditambahkan.');
    }

    public function editKunjungan($id_kunjungan)
    {
        $kunjungan = $this->DataKunjunganModel->find($id_kunjungan);
        // dd( $kunjungan );
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
        // dd( $data );
        $kunjungan->update($id, $data);
        session()->setFlashData('pesan_tambah', 'Data Siswa Peminjam Berhasil Diupdate');
        return redirect()->to('user/kunjungan');
    }

    // Hapus

    public function hapusdatakunjungan($id)
    {
        $model = new DataKunjunganModel();
        $getData = $model->getDataKunjungan($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataKunjungan($id);
            session()->setFlashData('pesan_hapus', 'Data berhasil dihapus');
            return redirect()->to('user/kunjungan');
        } else {
            session()->setFlashData('pesan_hapus', 'Data gagal dihapus');
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
        // dd( $data );
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
        session()->setFlashData('pesan_tambah', 'Data Peminjam Berhasil Diupdate');
        return redirect()->to('/user/peminjam');
    }

    // Hapus

    public function hapusdataPeminjam($id)
    {
        $model = new PeminjamModel();
        $getData = $model->getDataPeminjam($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataPeminjam($id);
            session()->setFlashData('pesan_hapus', 'Data berhasil dihapus');
            return redirect()->to('user/peminjam');
        } else {
            session()->setFlashData('pesan_hapus', 'Data gagal dihapus');
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

    // public function saveJenisBuku()
    // {
    //     // Validasi form input
    //     if ( !$this->validate( [
    //         'kode_buku' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Kode Buku Sudah Ada, Silahkan periksa lagi kode buku yang anda masukkan'
    // ]
    // ]
    // ] ) ) {
    //         $validation = \Config\Services::validation();
    //         $error = $validation->getError( 'kode_buku' );
    //         $session = session();
    //         $session->setFlashdata( 'pesan_error', $error );
    //         return redirect()->back()->withInput();
    //     }

    //     $model = new JenisBukuModel();
    //     $data = [
    //         'kode_buku' => strtoupper( $this->request->getVar( 'kode_buku' ) ),
    //         'judul_buku' => $this->request->getVar( 'judul_buku' ),
    //         'pengarang' => $this->request->getVar( 'pengarang' ),
    //         'penerbit' => $this->request->getVar( 'penerbit' ),
    //         'tahun_terbit' => $this->request->getVar( 'tahun_terbit' ),
    //         'tempat_terbit' => $this->request->getVar( 'tempat_terbit' ),
    //         'jumlah_buku' => $this->request->getVar( 'jumlah_buku' ),
    //         'isbn' => $this->request->getVar( 'isbn' ),
    // ];
    //     // dd( $data );
    //     $model->insert( $data );
    //     return redirect()->to( '/User/JenisBuku' )->with( 'pesanBerhasil', 'Buku berhasil ditambahkan.' );
    // }

    // public function saveJenisBuku()
    // {
    //     $model = new JenisBukuModel();

    //     // Generate kode buku otomatis di dalam function saveJenisBuku
    //     // Mendapatkan jumlah total buku untuk dijadikan sebagai penanda increment
    //     $lastEntry = $model->orderBy( 'kode_buku', 'DESC' )->first();
    //     $lastKodeBuku = $lastEntry ? ( int )substr( $lastEntry[ 'kode_buku' ], 2 ) : 0;

    //     // Generate kode baru dengan prefix 'BK' dan increment
    //     $newKodeBuku = 'BK' . str_pad( $lastKodeBuku + 1, 4, '0', STR_PAD_LEFT );

    //     // Validasi form input ( tanpa kode_buku karena sudah otomatis di-generate )
    //     if ( !$this->validate( [
    //         'judul_buku' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Judul Buku wajib diisi'
    // ]
    // ],
    //         'pengarang' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Pengarang wajib diisi'
    // ]
    // ],
    //         'penerbit' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Penerbit wajib diisi'
    // ]
    // ],
    //         'tahun_terbit' => [
    //             'rules' => 'required|numeric|exact_length[4]',
    //             'errors' => [
    //                 'required' => 'Tahun Terbit wajib diisi',
    //                 'numeric' => 'Tahun Terbit harus berupa angka',
    //                 'exact_length' => 'Tahun Terbit harus terdiri dari 4 angka'
    // ]
    // ],
    //         // Validasi field lainnya seperti pengarang, penerbit, dll
    // ] ) ) {
    //         $validation = \Config\Services::validation();
    //         $error = $validation->getErrors();
    //         $session = session();
    //         $session->setFlashdata( 'pesan_error', $error );
    //         return redirect()->back()->withInput();
    //     }

    //     // Persiapan data untuk disimpan, kode buku otomatis disertakan
    //     $data = [
    //         'kode_buku' => $newKodeBuku, // Kode buku otomatis
    //         'judul_buku' => $this->request->getVar( 'judul_buku' ),
    //         'pengarang' => $this->request->getVar( 'pengarang' ),
    //         'penerbit' => $this->request->getVar( 'penerbit' ),
    //         'tahun_terbit' => $this->request->getVar( 'tahun_terbit' ),
    //         'tempat_terbit' => $this->request->getVar( 'tempat_terbit' ),
    //         'jumlah_buku' => $this->request->getVar( 'jumlah_buku' ),
    //         'isbn' => $this->request->getVar( 'isbn' ),
    // ];

    //     // Insert data ke database
    //     $model->insert( $data );

    //     // Redirect setelah sukses menyimpan
    //     return redirect()->to( '/User/JenisBuku' )->with( 'pesanBerhasil', 'Buku berhasil ditambahkan.' );
    // }

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
        return redirect()->to('/User/JenisBuku')->with('pesanBerhasil', 'Buku berhasil ditambahkan.');
    }

    //edit

    public function editJenisBuku($kode_buku)
    {
        $model = new JenisBukuModel();

        // Ambil data buku berdasarkan kode_buku
        $dataBuku = $model->find($kode_buku);

        // Jika buku tidak ditemukan, redirect dengan pesan error
        if (!$dataBuku) {
            return redirect()->to('/User/JenisBuku')->with('pesan_error', 'Buku tidak ditemukan.');
        }

        // Siapkan data untuk dikirim ke view
        $data = [
            'dataBuku' => $dataBuku,
            'title' => 'Jenis Buku',
            'kode_buku' => $kode_buku // Mengirim kode buku untuk form action
        ];
        // dd( $data );
        // Tampilkan view form edit dengan data
        return view('user/jenis_buku/edit', $data);
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
        return redirect()->to('/user/JenisBuku');
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
        return redirect()->to('/user/JenisBuku');
    }

    // Hapus
    public function hapusdataJenisBuku($id)
    {
        $model = new PeminjamModel();
        $getData = $model->getDataPeminjam($id)->getRow();
        if (isset($getData)) {
            $model->hapusDataPeminjam($id);
            session()->setFlashData('pesan_hapus', 'Data berhasil dihapus');
            return redirect()->to('user/peminjam');
        } else {
            session()->setFlashData('pesan_hapus', 'Data gagal dihapus');
            return redirect()->to('user/JenisBuku');
        }
    }
    // Jenis Buku End
    // BUku RUsak

    public function databukurusak()
    {
        session();
        $model = new BukuRusakModel();
        $data = [
            'bukurusak' => $model->getDataBukuRusak(),
            'title' => 'Data Buku Rusak',
        ];

        return view('user/buku_rusak/index', $data);
    }

    public function tambahbukuRusak()
    {
        session();
        $modelBuku = new JenisBukuModel();
        $data = [
            'buku' => $modelBuku->getDataBuku(),
            'title' => 'Form Tambah Data Buku Rusak',
        ];
        return view('user/buku_rusak/add', $data);
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
        return redirect()->to('user/databukurusak');
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
            return redirect()->to('user/databukurusak');
        }
        // dd( $data );

        return view('user/buku_rusak/edit', $data);
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

        return redirect()->to('user/databukurusak');
    }

    // End Buku Rusak

    //peminjaman
    public function peminjamanBuku()
    {
        $data['title'] = 'Peminjaman';
        session();
        $data['peminjaman'] = $this->PeminjamanModel
    ->select('peminjaman.*, jenis_buku.judul_buku, jenis_buku.jumlah_buku, users.*, peminjaman.status, users.kelas')
    ->join('jenis_buku', 'peminjaman.kode_buku = jenis_buku.kode_buku', 'left')
    ->join('users', 'peminjaman.id_siswa_peminjaman = users.id', 'left')
    ->findAll();

// Debugging: Tampilkan hasil peminjaman
// dd($data['peminjaman']);


        return view('user/peminjaman/index', $data);
    }

    public function createPeminjaman()
    {
        $userModel = new \Myth\Auth\Models\UserModel(); // Model untuk pengguna/kader
        $users = $userModel->findAll();
        $data = [
            'buku' => $this->JenisBukuModel->findAll(),
            'title' => 'Form Tambah Data Buku Rusak',
            'siswa' => $users,
        ];
        return view('user/peminjaman/add', $data);
    }

    public function savePeminjaman()
    {
        // Validasi input
        $this->validate([
            'nomor' => 'required',
            'buku' => 'required',
            'siswa' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_pengembalian' => 'required',
            'jumlah' => 'required',
            'kondisi_buku' => 'required',
        ]);

        // Mengambil data dari input
        $kodeBuku = $this->request->getPost('buku');
        $jumlahPinjam = (int) $this->request->getPost('jumlah');

        // Mengambil informasi buku untuk memastikan ada cukup stok
        $buku = $this->JenisBukuModel->find($kodeBuku);

        // Mengecek apakah cukup stok untuk peminjaman
        if ($buku['jumlah_buku'] < $jumlahPinjam) {
            return redirect()->back()->with('pesan_pinjam', 'Stok buku tidak cukup')->withInput();
        }

        // Mengurangi jumlah buku
        $this->JenisBukuModel->where('kode_buku', $kodeBuku)
            ->set('jumlah_buku', "jumlah_buku - $jumlahPinjam", false)
            ->update();

        // Membuat kode pinjam acak dengan awalan "KP"
        $kodePinjam = 'KP' . strtoupper(bin2hex(random_bytes(4))); // Menghasilkan string 6 karakter acak

        // Menyimpan data peminjaman
        $dataPeminjaman = [
            'kode_pinjam' => $kodePinjam, // Tambahkan kode pinjam yang acak
            'nomor' => $this->request->getPost('nomor'),
            'id_siswa_peminjaman' => $this->request->getPost('siswa'),
            'kode_buku' => $kodeBuku,
            'tanggal_pinjam' => $this->request->getPost('tanggal_pinjam'),
            'tanggal_pengembalian' => $this->request->getPost('tanggal_pengembalian'),
            'status' => 'Belum Kembali',
            'jumlah_pinjam' => $jumlahPinjam,
            'kondisi_buku' => $this->request->getPost('kondisi_buku'),
            'id_user' => user()->id, // asumsikan ada session user_id
        ];

        // Menyimpan data peminjaman ke database
        $this->PeminjamanModel->insert($dataPeminjaman);

        // Mengambil kembali kode_pinjam yang baru saja disimpan
        $kodePinjamTerbaru = $this->PeminjamanModel->insertID(); // Atau ambil dari $dataPeminjaman['kode_pinjam'] jika sudah ada



        // Menyimpan histori peminjaman
        $keterangan = 'Peminjaman Buku - Jumlah: ' . $jumlahPinjam;

        $dataHistori = [
            'kode_pinjam' => $kodePinjam,
            'tanggal_status' => date('Y-m-d'),
            'keterangan' => $keterangan,
        ];

        // Simpan histori peminjaman
        $this->HistoriPeminjamanModel->insert($dataHistori);

        return redirect()->to('/user/peminjamanBuku')->with('success', 'Buku berhasil dipinjam');
    }

    public function ubahstatus($kodePinjam)
    {
        // Validasi input
        $this->validate([
            'status' => 'required|in_list[Kembali,Belum Kembali]',
        ]);

        // Mengambil status dari input
        $statusBaru = "Kembali";
        // dd('Status Baru:', $statusBaru); // Debugging untuk status baru

        // Mengambil peminjaman berdasarkan kode pinjam
        $peminjaman = $this->PeminjamanModel->where('kode_pinjam', $kodePinjam)->first();
        // dd('Peminjaman Ditemukan:', $peminjaman); // Debugging untuk data peminjaman

        // Mengecek apakah peminjaman ada
        if (!$peminjaman) {
            return redirect()->back()->with('pesan_kembali', 'Data peminjaman tidak ditemukan')->withInput();
        }

        // Update status peminjaman
        $this->PeminjamanModel->update($peminjaman['kode_pinjam'], ['status' => $statusBaru]);
        // dd('Status Diupdate'); // Debugging setelah update status

        // Jika status baru adalah "Kembali", kembalikan stok buku dan simpan histori
        if ($statusBaru === 'Kembali') {
            // Mengembalikan jumlah buku ke stok
            $this->JenisBukuModel->where('kode_buku', $peminjaman['kode_buku'])
                ->set('jumlah_buku', "jumlah_buku + {$peminjaman['jumlah_pinjam']}", false)
                ->update();
            // dd('Stok Buku Kembali'); // Debugging setelah mengembalikan stok buku

            // Menyimpan histori pengembalian
            $keterangan = 'Pengembalian Buku - Jumlah: ' . $peminjaman['jumlah_pinjam'];

            $dataHistori = [
                'kode_pinjam' => $kodePinjam,
                'tanggal_status' => date('Y-m-d'),
                'keterangan' => $keterangan,
            ];

            // Simpan histori pengembalian
            $this->HistoriPeminjamanModel->insert($dataHistori);
            // dd('Histori Pengembalian Disimpan'); // Debugging setelah menyimpan histori
        }

        return redirect()->to('/user/peminjamanBuku')->with('success', 'Status peminjaman berhasil diubah');
    }
}
