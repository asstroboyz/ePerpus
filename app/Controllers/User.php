<?php

namespace App\Controllers;

use App\Models\Pengaduan;
use App\Models\bukti;
use App\Models\profil;
use App\Models\DataBalitaModel;
use App\Models\PosyanduModel;
use App\Models\DataBalitaDetailModel;
use App\Models\JadwalimunisasiModel;
use App\Models\JenisImunisasiModel;
use CodeIgniter\Database\Query;
use Myth\Auth\Entities\passwd;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    protected $db;
    protected $builder;
    public function __construct()
    {

        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->JadwalimunisasiModel = new JadwalimunisasiModel();
        // $this->bukti = new bukti();
        $this->PosyanduModel = new PosyanduModel();
        $this->DataBalitaModel = new DataBalitaModel();
        $this->DataBalitaDetailModel = new DataBalitaDetailModel();
        $this->JenisImunisasiModel = new JenisImunisasiModel();
        $this->profil = new profil();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {

        $userlogin = user()->id;

        // $data = $this->db->table('pengaduan');
        // // $builder->select('id,username,email,created_at,foto');

        // $query1 = $data->where('id_user', $userlogin)->get()->getResult();
        // $query2 = $data->where('id_user', $userlogin)->where('status', 'diproses')->get()->getResult();
        // $query3 = $data->where('id_user', $userlogin)->where('status', 'selesai')->get()->getResult();
        // // $query = $builder->get();
        // // $query1 = $builder->where('status', 'diproses')->get()->getResult();
        // $semua = count($query1);



        $data = [
            // 'semua' => $semua,
            // 'proses' => count($query2),
            // 'selesai' => count($query3),
            'title' => 'Home'
        ];
        // dd($data);
        return view('User/home/index', $data);
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
            $hash  = $entity->password_hash;
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

        $userlogin = user()->username;
        $userid = user()->id;
        $role = $this->db->table('auth_groups_users')->where('user_id', $userid)->get()->getRow();
        $role == '1' ? $role_echo = 'Admin' : $role_echo = 'User';



        $data = $this->db->table('pengaduan');
        $query1 = $data->where('id_user', $userid)->get()->getResult();
        $builder = $this->db->table('users');
        $builder->select('id,username,email,created_at,foto');
        $builder->where('username', $userlogin);
        $query = $builder->get();
        $semua = count($query1);
        $data = [
            'semua' => $semua,
            'user' => $query->getRow(),
            'title' => 'Home',
            'role' => $role_echo


        ];
        return view('user/profil/index', $data);
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
            'title' => 'Update Profile'
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
                'foto' => $nama_foto
            ]);
        }
        session()->setFlashdata('msg', 'Profil Pengaduan  berhasil Diubah');
        return redirect()->to('/user');
    }


    public function pengguna()
    {
        return view('user/pengguna');
    }

    public function posyandu()
    {
        $data = [
            'title' => 'Data Posyandu',
            // 'posyandu' => $this->PosyanduModel->findAll(),
            'posyandu' => $this->PosyanduModel->getPosyanduWithKader(),  // Mengambil semua data posyandu
        ];
        // dd($data);
        return view('user/Posyandu/Index', $data); // Menampilkan view untuk data posyandu
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
        return view('user/Posyandu/Tambah', $data); // Menampilkan view untuk tambah data posyandu
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
            return redirect()->to('/user/posyandu/tambah')->withInput();
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
        return redirect()->to('/user/posyandu');
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
            return redirect()->to('/user/posyandu');
        }

        // Kirim data ke view
        return view('user/posyandu/EditPosyandu', $data);
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
            return redirect()->to('/user/posyandu/edit/' . $this->request->getPost('id'))->withInput();
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
        return redirect()->to('/user/posyandu');
    }

    public function deletePosyandu($id)
    {
        $this->PosyanduModel->delete($id);
        session()->setFlashdata('pesan', 'Data posyandu berhasil dihapus');
        return redirect()->to('/user/posyandu');
    }
    public function balita()
    {
        $userPosyanduId = user()->posyandu_id;

        $data = [
            'title' => 'Data Balita',
            'balita' => $this->DataBalitaModel->getBalitaWithIdPos($userPosyanduId),
        ];
        $data['pengecekan'] = $this->DataBalitaDetailModel->getPengecekan();


        // Debugging
        // dd($data['balita']);
        return view('user/Balita/Index', $data);
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
        return view('user/Balita/Tambah', $data); // Menampilkan view untuk tambah data balita
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
                'rules' => 'required|valid_date', // Pastikan valid_date diatur dengan benar di konfigurasi validasi
                'errors' => [
                    'required' => 'Tanggal lahir harus diisi',
                    'valid_date' => 'Format tanggal lahir tidak valid',
                ],
            ],
            'nama_ortu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama orang tua harus diisi',
                ],
            ],
            'bbl' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Berat Badan Lahir harus diisi',
                    'integer' => 'Berat Badan Lahir harus berupa angka',
                ],
            ],
            'pbl' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Panjang Badan Lahir harus diisi',
                    'integer' => 'Panjang Badan Lahir harus berupa angka',
                ],
            ],
            'nik_balita' => [
                'rules' => 'required|numeric|exact_length[16]',
                'errors' => [
                    'required' => 'NIK Balita harus diisi',
                    'numeric' => 'NIK Balita harus berupa angka',
                    'exact_length' => 'NIK Balita harus berisi 16 digit angka',
                ],
            ],
            'nik_ortu' => [
                'rules' => 'required|numeric|exact_length[16]',
                'errors' => [
                    'required' => 'NIK Orang Tua harus diisi',
                    'numeric' => 'NIK Orang Tua harus berupa angka',
                    'exact_length' => 'NIK Orang Tua harus berisi 16 digit angka',
                ],
            ],
            'no_kk' => [
                'rules' => 'required|numeric|exact_length[16]',
                'errors' => [
                    'required' => 'Nomor Kartu Keluarga harus diisi',
                    'numeric' => 'Nomor Kartu Keluarga harus berupa angka',
                    'exact_length' => 'Nomor Kartu Keluarga harus berisi 16 digit angka',
                ],
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                ],
            ],
            'umur' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Umur harus diisi',
                    'integer' => 'Umur harus berupa angka',
                ],
            ],
            'bb_awal' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Berat Badan Awal harus diisi',
                    'integer' => 'Berat Badan Awal harus berupa angka',
                ],
            ],
            'tb_awal' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Tinggi Badan Awal harus diisi',
                    'integer' => 'Tinggi Badan Awal harus berupa angka',
                ],
            ],
            'lk_awal' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Lingkar Kepala Awal harus diisi',
                    'integer' => 'Lingkar Kepala Awal harus berupa angka',
                ],
            ],
            // Tambahkan validasi lain sesuai kebutuhan
        ])) {
            // Jika validasi gagal, redirect kembali dengan input yang sudah ada
            return redirect()->to('/user/tambahBalita')->withInput()->with('errors', $this->validator->getErrors());
        }


        // Ambil data dari form
        $data = [
            'nama' => $this->request->getPost('nama'), //
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'), //
            'tgl_lahir' => $this->request->getPost('tgl_lahir'), //
            'nama_ortu' => $this->request->getPost('nama_ortu'), //
            'posyandu_id' => user()->posyandu_id,
            'anak_ke' => $this->request->getPost('anak_ke'), //
            'bbl' => $this->request->getPost('bbl'),
            'pbl' => $this->request->getPost('pbl'),
            'nik_balita' => $this->request->getPost('nik_balita'), //
            'no_kk' => $this->request->getPost('no_kk'), //
            'nik_ortu' => $this->request->getPost('nik_ortu'), //
            'alamat' => $this->request->getPost('alamat'), //
            'umur' => $this->request->getPost('umur'), //
            'bb_awal' => $this->request->getPost('bb_awal'), //
            'tb_awal' => $this->request->getPost('tb_awal'), //
            'lk_awal' => $this->request->getPost('lk_awal'), //
            'bbl' => $this->request->getPost('bbl'), //
            'pbl' => $this->request->getPost('pbl'), //
            'tgl_pemeriksaan_awal' => date('Y-m-d'),

        ];
        //  dd($data);
        // Simpan data ke model
        $this->DataBalitaModel->insert($data);

        $balita_id = $this->DataBalitaModel->insertID();

        // Ambil data pemeriksaan awal
        $dataDetail = [
            'bb_awal' => $this->request->getPost('bb_awal'),
            'tb_awal' => $this->request->getPost('tb_awal'),
            'lk_awal' => $this->request->getPost('lk_awal'),
            'tgl_pemeriksaan' =>date('Y-m-d'),
            'balita_id' => $balita_id,
        ];

        $this->DataBalitaDetailModel->insert($dataDetail);
        // Set flash message dan redirect
        session()->setFlashdata('pesan', 'Data balita berhasil ditambahkan');
        return redirect()->to('/user/balita');
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

        return view('user/balita/Edit', $data);
    }

    public function updateBalita($id)
    {
        if (!$this->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|valid_date',
            'nama_ortu' => 'required',
            'bbl' => 'required|integer',
            'pbl' => 'required|integer',
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
            'nama' => $this->request->getPost('nama'), //
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'), //
            'tgl_lahir' => $this->request->getPost('tgl_lahir'), //
            'nama_ortu' => $this->request->getPost('nama_ortu'), //
            'posyandu_id' => user()->posyandu_id,
            'anak_ke' => $this->request->getPost('anak_ke'), //
            'bbl' => $this->request->getPost('bbl'),
            'pbl' => $this->request->getPost('pbl'),
            'nik_balita' => $this->request->getPost('nik_balita'), //
            'no_kk' => $this->request->getPost('no_kk'), //
            'nik_ortu' => $this->request->getPost('nik_ortu'), //
            'rt' => $this->request->getPost('rt'), //
            'rw' => $this->request->getPost('rw'), //
            'umur' => $this->request->getPost('umur'), //
            'bb_awal' => $this->request->getPost('bb_awal'), //
            'tb_awal' => $this->request->getPost('tb_awal'), //
            'lk_awal' => $this->request->getPost('lk_awal'), //
            'bbl' => $this->request->getPost('bbl'), //
            'pbl' => $this->request->getPost('pbl'), //
        ]);

        return redirect()->to('/user/balita');
    }
    public function deleteBalita($id)
    {
        $this->DataBalitaModel->delete($id);
        session()->setFlashdata('pesan', 'Data balita berhasil dihapus');
        return redirect()->to('/user/balita');
    }

    public function detail_balita($id)
    {
        $data['title'] = 'Detail Data Balita'; // Pindahkan ini ke atas agar tidak terjadi override
        $this->builder = $this->db->table('data_balita'); // Gunakan $this->builder untuk mengakses builder

        $this->builder->select('data_balita.*, posyandu.*,');
        $this->builder->join('posyandu', 'posyandu.id = data_balita.posyandu_id');
        $this->builder->where('data_balita.id', $id);
        $query = $this->builder->get();
        $data['data_balita'] = $query->getRow();
        // dd($data);
        if (empty($data['data_balita'])) {
            return redirect()->to('/user/balita');
        }

        return view('User/Balita/Detail_balita', $data);
    }

    public function jenis_imunisasi()
    {
        $data = [
            'title' => 'Daftar Jenis Imunisasi',
            'jenis_imunisasi' => $this->JenisImunisasiModel->findAll(),
        ];

        return view('user/jenis_imunisasi/index', $data);
    }
    public function Jadwal()
    {
        $userModel = new \Myth\Auth\Models\UserModel();
        $users = $userModel->findAll();

        $jadwalModel = new JadwalimunisasiModel();
        $posyanduModel = new PosyanduModel();

        $userlogin = user()->posyandu_id;


        $data['jadwal'] = $jadwalModel
            ->select('jadwal_imunisasi.*, posyandu.nama_posyandu, posyandu.alamat_posyandu, users.username')
            ->join('posyandu', 'posyandu.id = jadwal_imunisasi.posyandu_id')
            ->join('users', 'users.id = posyandu.kader_posyandu')
            ->where('jadwal_imunisasi.posyandu_id', $userlogin)
            ->findAll();

        $data['title'] = 'Daftar Jadwal Imunisasi';
        return view('user/jadwal/index', $data);
    }

    public function tambahJadwalPosyandu()
    {
        // Ambil user yang sedang login
        $user = user(); // Mengambil data user yang sedang login
        $posyanduId = $user->posyandu_id; // Ambil posyandu_id dari user yang login

        // Ambil data posyandu berdasarkan posyandu_id user yang login
        $posyanduModel = new PosyanduModel();
        $selectedPosyandu = $posyanduModel->find($posyanduId);

        // Ambil data kader terkait dengan posyandu yang sedang login
        $userModel = new UserModel();
        $kaderPosyandu = $userModel->find($selectedPosyandu['kader_posyandu']);

        // Mengirim data ke view
        $data = [
            'title' => 'Tambah Jadwal Posyandu',
            'validation' => \Config\Services::validation(),
            'selectedPosyandu' => $selectedPosyandu, // Data posyandu yang sesuai dengan user login
            'kaderPosyandu' => $kaderPosyandu, // Data kader (username, dsb.)
        ];

        return view('user/jadwal/tambah', $data);
    }

    // Proses tambah jadwal Posyandu
    public function simpanJadwalPosyandu()
    {
        // Validasi data input
        if (!$this->validate([
            // 'posyandu_id' => 'required', 
            'kader_posyandu' => 'required',
            'tanggal' => 'required|valid_date',
            'jam' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('pesanGagal', 'Input tidak valid, periksa kembali.');
        }
    
        // Persiapkan data yang akan disimpan
        $data = [
            'posyandu_id' => $this->request->getPost('posyandu_id'),
            'kader_posyandu' => $this->request->getPost('kader_posyandu'), // Asumsi ini adalah ID kader
            'tanggal' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam')
        ];
    
        // Lakukan dd sebelum save untuk debug
        // dd($data); // Ini akan menampilkan data dan menghentikan eksekusi script
    
        // Simpan data ke dalam database
        $this->JadwalimunisasiModel->save($data);
    
        // Redirect setelah data berhasil disimpan
        return redirect()->to(base_url('user/jadwal'))->with('pesanBerhasil', 'Jadwal berhasil ditambahkan');
    }
    
    public function print()
    {
        $data = [
            'pengaduan' => $this->pengaduan->getAll(),
            'title' => 'Cetak Data'
        ];

        $dompdf = new \Dompdf\Dompdf();
        $options = new \Dompdf\Options();
        $options->setIsRemoteEnabled(true);
        $dompdf->setOptions($options);
        $dompdf->output();
        $dompdf->loadHtml(view('user/pengaduan/print', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        ini_set('max_execution_time', 0);
        $dompdf->stream('Data.pdf', array("Attachment" => false));
    }
    public function ekspor($id)
    {
        // $aduan = $this->pengaduan->where(['id' => $id])->first();
        // $id = $id;
        // $data['detail']   = $aduan;
        $data['title']   = 'cetak';
        $data['detail'] = $this->pengaduan->where(['id' => $id])->first();



        //Cetak dengan dompdf
        $dompdf = new \Dompdf\Dompdf();
        ini_set('max_execution_time', 0);
        $options = new \Dompdf\Options();
        $options->setIsRemoteEnabled(true);

        $dompdf->setOptions($options);
        $dompdf->output();
        $dompdf->loadHtml(view('user/pengaduan/cetak', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Detail Pengaduan.pdf', array("Attachment" => false));
    }
}
