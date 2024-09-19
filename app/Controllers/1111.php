<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelSiswa;
use App\Models\ModelGuru;

class Admin extends BaseController
{
    public function __Construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelGuru = new ModelGuru();
    }

    public function index()
    {

        $builder = $this->db->table('jurusan');
        $query   = $builder->get();
        $jurusan = count($query->getResult());

        $builder = $this->db->table('siswa');
        $query1   = $builder->get();
        $siswa = count($query1->getResult());

        $builder = $this->db->table('kelas');
        $query2   = $builder->get();
        $kelas = count($query2->getResult());

        $builder = $this->db->table('guru');
        $query3   = $builder->get();
        $guru = count($query3->getResult());
        $data = [
            'title' => 'home',
            'jurusan' => $jurusan,
            'siswa' => $siswa,
            'kelas' => $kelas,
            'guru' => $guru,



        ];



        return view('admin/home', $data);
    }

    public function soal()
    {
        $builder = $this->db->table('soal');
        $builder->join('guru', 'guru.id=soal.guru');
        $builder->join('mapel', 'mapel.id=soal.mapel');
        $builder->join('kelas', 'kelas.id_kelas=soal.kelas');
        $builder->select('mapel.nama_mapel,guru.nama,kelas.nama_kelas,soal.id_soal,soal.soal');
        $query = $builder->get()->getResult();

        $data = [
            'title' => 'bank soal',
            'soal' => $query
        ];
        return view('admin/soal/index', $data);
    }
    public function ulangan()
    {
        $builder = $this->db->table('ulangan');
        $builder->join('guru', 'guru.id=ulangan.id_guru');
        $builder->join('mapel', 'mapel.id=ulangan.id_mapel');
        $builder->join('kelas', 'kelas.id_kelas=ulangan.id_kelas');
        $builder->select('ulangan.*,mapel.*,guru.nama,guru.id,kelas.nama_kelas,kelas.id_kelas');
        $query = $builder->get()->getResult();

        $data = [
            'title' => 'Daftar Ulangan',
            'ulangan' => $query
        ];
        return view('admin/ulangan/index', $data);
    }
    public function tambahSoal()
    { 
        $builder = $this->db->table('mapel')->get()->getResult();
        $builder1 = $this->db->table('kelas')->get()->getResult();
        $builder2 = $this->db->table('guru')->get()->getResult();
        $data = [
            'title' => 'Tambah Soal',
            'mapel' => $builder,
            'guru' => $builder2,
            'kelas' => $builder1,

        ];


        return view('admin/soal/tambah', $data);
    }
    public function salinSoal($id = null)
    {
        $data['title'] = "Salin soal";
        if ($id != null) {
            $query = $this->db->table('soal')->getWhere(['id_soal' => $id]);
            $data1['soal'] = $query->getRow();
            // dd($data1);
            $data = [
                'soal' => $data1['soal']->soal,
                'mapel' => $data1['soal']->mapel,
                'kelas' => $data1['soal']->kelas,
                'guru' => $data1['soal']->guru,
                'opsi_a' => $data1['soal']->opsi_a,
                'opsi_b' => $data1['soal']->opsi_b,
                'opsi_c' => $data1['soal']->opsi_c,
                'opsi_d' => $data1['soal']->opsi_d,
                'opsi_e' => $data1['soal']->opsi_e,
                'jawaban' => $data1['soal']->jawaban,
                
                ];
                // dd($data);
            $this->db->table('soal')->insert($data);
            if ($query->resultID->num_rows > 0) {
              
                return redirect()->to(base_url('/admin/soal'))->with('success', 'Data Berhasil Disalin!');
            } else {
                return redirect()->to(base_url('/admin/soal'))->with('eror', 'Data Tidak Ditemukan!');
            }
        } else {
            return redirect()->to(base_url('/admin/mapel'))->with('eror', 'Data Tidak Ditemukan!');
        }
    }
    public function tambahUlangan()
    {
        $builder = $this->db->table('mapel')->get()->getResult();
        $builder1 = $this->db->table('kelas')->get()->getResult();
        $builder2 = $this->db->table('guru')->get()->getResult();
        $data = [
            'title' => 'Tambah Ulangan',
            'mapel' => $builder,
            'guru' => $builder2,
            'kelas' => $builder1,

        ];


        return view('admin/ulangan/tambah', $data);
    }
    

    public function simpanUlangan()
    {
        $data = [
            
            'id_mapel' => $this->request->getVar('mapel'),
            'id_kelas' => $this->request->getVar('kelas'),
            'id_guru' => $this->request->getVar('guru'),
            'waktu' => $this->request->getVar('waktu'),
            'tanggal' => $this->request->getVar('tanggal'),
            
            
            ];
        $this->db->table('ulangan')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/ulangan'))->with('success', 'Data Berhasil Disimpan!');
        }
    }
    public function simpanSoal()
    {
        $data = [
            'soal' => $this->request->getVar('soal'),
            'mapel' => $this->request->getVar('mapel'),
            'kelas' => $this->request->getVar('kelas'),
            'guru' => $this->request->getVar('guru'),
            'opsi_a' => $this->request->getVar('a'),
            'opsi_b' => $this->request->getVar('b'),
            'opsi_c' => $this->request->getVar('c'),
            'opsi_d' => $this->request->getVar('d'),
            'opsi_e' => $this->request->getVar('e'),
            'jawaban' => $this->request->getVar('jawaban'),
            
            ];
        $this->db->table('soal')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/soal'))->with('success', 'Data Berhasil Disimpan!');
        }
    }
    
    public function simpanGuru()
    {
        $valid = $this->validate([
            'username' => [

                'rules' => 'is_unique[user.username]',
                'errors' => [
                    'required', 'username harus diisi'
                ]

            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required', 'password harus diisi'
                ]

                ],
            // 'foto' => [
            //     'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Ukuran Gambar Terlalu Besar',
            //         'is_image' => 'yang anda pilih bukan gambar',
            //         'mime_in' => 'yang anda pilih bukan gambar'
            //     ]
            // ]

        ]);
        if ($valid) {
            $data = [
                'username' => $this->request->getPost('nik'),
                'password' => password_hash($this->request->getPost('nik'), PASSWORD_DEFAULT),
                'role_id' => 3
            ];
            $this->ModelAuth->save($data);
            $id_guru = $this->db->table('user')->where([
                'username' => $this->request->getVar('nik')
            ])->get()->getRowArray();
            // dd($id_siswa);
            // $foto = $this->request->getFile('foto');
            // if ($foto->getError() == 4) {
                $namaFoto = ('jenis_kelamin') == '1' ? 'default-p.png' : 'default-l.png';
            // } else {
            //     $foto->move('img/guru');
            //     $namaFoto = $foto->getName();
            // }
            $dataGuru = [
                'user_id' => $id_guru['id'],
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),

                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'agama' => $this->request->getPost('agama'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),

                'foto' => $namaFoto,

            ];
            $this->ModelGuru->save($dataGuru);

            session()->setFlashdata('success', 'register berhasil');
            return redirect()->to(base_url('Admin/guru/'));
        } else {

            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Admin/registerGuru'))->withInput('validation', $validation);
        }
    }

    public function registerGuru()
    {
        $builder = $this->db->table('guru-mapel')->join('mapel', 'guru-mapel.id_mapel = mapel.id');
        $query = $builder->get();
        $data = [
            'title' => 'register guru',
            'validation' => \Config\Services::validation(),
            'guru-mapel' => $query->getresult()
        ];
        return view('admin/guru/tambah', $data);
    }

    public function hapusGuru($id)
    {
       
        $this->db->table('guru')->where(['user_id' => $id])->delete();

        $this->db->table('user')->where(['id' => $id])->delete();
        return redirect()->to(base_url('/admin/guru'))->with('success', 'Data Berhasil Dihapus!');
    }

    public function registerSiswa()
    {
        $builder = $this->db->table('kelas')->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        $query   = $builder->get();
        $data = [
            'title' => 'register siswa',
            'validation' => \Config\Services::validation(),
            'kelas' => $query->getresult()
        ];
        return view('admin/siswa/tambah', $data);
    }
    public function simpanSiswa()
    {
        $valid = $this->validate([
            'username' => [

                'rules' => 'is_unique[user.username]',
                'errors' => [
                    'required', 'username harus diisi'
                ]

            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required', 'password harus diisi'
                ]

            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]

        ]);
        if ($valid) {
            $data = [
                'username' => $this->request->getPost('nisn'),
                'password' => password_hash($this->request->getPost('nisn'), PASSWORD_DEFAULT),
                'role_id' => 2
            ];
            $this->ModelAuth->save($data);
            $id_siswa = $this->db->table('user')->where([
                'username' => $this->request->getVar('nisn')
            ])->get()->getRowArray();
            $id_kelas = $this->db->table('kelas')->where([
                'id_kelas' => $this->request->getVar('kelas')
            ])->get()->getRowArray();
            // $foto = $this->request->getPost('jenis_kelamin') == '1' ? 'default-l.png' : 'default-p.png';
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $namaFoto = ('jenis_kelamin') == '1' ? 'default-p.png' : 'default-l.png';
            } else {
                $foto->move('img/siswa');
                $namaFoto = $foto->getName();
            }
            // dd($id_siswa);
            //    dd($id_kelas['id_kelas']);
            $dataSiswa = [
                'user_id' => $id_siswa['id'],

                'nisn' => $this->request->getPost('nisn'),
                'nama' => $this->request->getPost('nama'),
                'id_kelas' => $this->request->getVar('kelas'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),

                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'agama' => $this->request->getPost('agama'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'nama_orangtua' => $this->request->getPost('nama_orangtua'),
                'pekerjaan_orangtua' => $this->request->getPost('pekerjaan_orangtua'),
                'foto' => $namaFoto,


            ];
            // dd($dataSiswa);
            $this->ModelSiswa->save($dataSiswa);

            session()->setFlashdata('success', 'register berhasil');
            return redirect()->to(base_url('Admin/siswa/'));
        } else {

            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Admin/registerSiswa'))->withInput('validation', $validation);
        }
    }

    public function hapusSiswa($id)
    {
        // $hapus = $this->ModelSiswa->find($id);
        // if ($hapus['foto'] != 'default-p.png' : 'default-l.png') {
        //     unlink('img/siswa' . $hapus['foto']);
        // }
        $this->db->table('siswa')->where(['user_id' => $id])->delete();
        $this->db->table('user')->where(['id' => $id])->delete();
        return redirect()->to(base_url('/admin/siswa'))->with('success', 'Data Berhasil Dihapus!');
    }
    //guru

    public function guru()
    {
        $data['title'] = 'Data Guru';
        $builder = $this->db->table('guru');
        $builder->join('user', 'guru.user_id=user.id');
        $builder->select('guru.id, guru.nama, user.username,guru.user_id');
        $query = $builder->get();
        $data['guru'] = $query->getResult();
        return view('admin/guru/index', $data);
    }
    public function siswa()
    {
        $data['title'] = 'Data Siswa';
        $builder = $this->db->table('siswa');

        // $builder->from('siswa,user,kelas');
        $builder->join('user', 'siswa.user_id=user.id');
        $builder->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
        $builder->select('siswa.id, siswa.nama, user.username,kelas.nama_kelas,siswa.no_hp,siswa.user_id');
        $query   = $builder->get();
        $data['siswa'] = $query->getResult();
        // dd($data['siswa']);

        return view('admin/siswa/index', $data);
    }

    public function mapel()
    {
        $data['title'] = 'Data Mapel';

        $builder = $this->db->table('mapel');
        $query   = $builder->get();
        $data['mapel'] = $query->getResult();
        return view('admin/mapel/index', $data);
    }
    public function tambahMapel()
    {
        $data = [
            'title' => 'Tambah Data Mapel',
            'validation' => \Config\Services::validation()

        ];

        return view('admin/mapel/tambah', $data);
    }

    public function simpanMapel()
    {
        if (!$this->validate([

            'nama_mapel' => ['rules' => 'required|is_unique[mapel.nama_mapel]', 'errors' => ['is_unique' => 'data Mapel Sudah Ada!!', 'required' => 'NISN wajib diisi!!']]


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/tambahMapel')->with('is_unique', 'Data Mapel Sudah Ada!!!')->withInput();
        }
        $data = [
            'nama_mapel' => ucwords($this->request->getVar('nama_mapel'))

        ];
        $this->db->table('mapel')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/mapel'))->with('success', 'Data Berhasil Disimpan!');
        }
        return view('admin/mapel/tambah', $data);
    }

    public function editMapel($id = null)
    {
        $data['title'] = "Edit Mata Pelajaran";
        if ($id != null) {
            $query = $this->db->table('mapel')->getWhere(['id' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['mapel'] = $query->getRow();
                return view('admin/mapel/edit', $data);
            } else {
                return redirect()->to(base_url('/admin/mapel'))->with('eror', 'Data Tidak Ditemukan!');
            }
        } else {
            return redirect()->to(base_url('/admin/mapel'))->with('eror', 'Data Tidak Ditemukan!');
        }
    }

    public function updateMapel($id)
    {
        $data = $this->request->getPost();
        if (!$this->validate([

            'nama_mapel' => ['rules' => 'required|is_unique[mapel.nama_mapel]', 'errors' => ['is_unique' => 'data Mapel Sudah Ada!!', 'required' => 'NISN wajib diisi!!']]


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/editMapel/' . $id)->with('is_unique', 'Data Mapel Sudah Ada!!!')->withInput();
        }
        $data = [
            'nama_mapel' => ucwords($this->request->getVar('nama_mapel'))

        ];
        unset($data['_method']);
        $this->db->table('mapel')->where(['id' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/mapel'))->with('success', 'Data Berhasil Diubah!');
        }
        // return view('admin/mapel/tambah',$data);

    }
    public function hapusMapel($id)
    {
        $this->db->table('mapel')->where(['id' => $id])->delete();
        return redirect()->to(base_url('/admin/mapel'))->with('success', 'Data Berhasil Dihapus!');
    }

    // jurusan
    public function jurusan()
    {
        $data['title'] = 'Data Jurusan';

        $builder = $this->db->table('jurusan');
        $query   = $builder->get();
        $data['jurusan'] = $query->getResult();
        return view('admin/jurusan/index', $data);
    }

    public function tambahJurusan()
    {
        $data = [
            'title' => 'Tambah Data Jurusan',
            'validation' => \Config\Services::validation()

        ];

        return view('admin/jurusan/tambah', $data);
    }
    public function simpanJurusan()
    {
        $validate = $this->validate([

            'keterangan' => [
                'rules' => 'required|is_unique[jurusan.keterangan]',
                'errors' => [
                    'is_unique' => 'Keterangan Tidak Boleh Sama!!'
                ]
            ],
            'nama_jurusan' => ['rules' => 'required|is_unique[jurusan.nama_jurusan]', 'errors' => ['is_unique' => 'Kode Jurusan Tidak Boleh Sama!!']]
        ]);
        if (!$validate) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/tambahJurusan')->withInput('validation', $validation);;
        }
        $data = [
            'nama_jurusan' => strtoupper($this->request->getVar('nama_jurusan')),
            'keterangan' => ucwords($this->request->getVar('keterangan')),
        ];
        $this->db->table('jurusan')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/jurusan'))->with('success', 'Data Berhasil Disimpan!');
        }
        return view('admin/jurusan/tambah', $data);
    }

    public function editJurusan($id = null)
    {
        $data = [
            'title' => 'Edit Data Jurusan',
            'validation' => \Config\Services::validation()

        ];
        if ($id != null) {
            $query = $this->db->table('jurusan')->getWhere(['id_jurusan' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['jurusan'] = $query->getRow();
                return view('admin/jurusan/edit', $data);
            } else {
                return redirect()->to(base_url('/admin/jurusan'))->with('eror', 'Data Tidak Ditemukan!');
            }
        } else {
            return redirect()->to(base_url('/admin/jurusan'))->with('eror', 'Data Tidak Ditemukan!');
        }
    }

    public function updateJurusan($id)
    {
        $validate = $this->validate([

            'keterangan' => [
                'rules' => 'required|is_unique[jurusan.keterangan]',
                'errors' => [
                    'is_unique' => 'Keterangan Tidak Boleh Sama!!'
                ]
            ],
            'nama_jurusan' => ['rules' => 'required|is_unique[jurusan.nama_jurusan]', 'errors' => ['is_unique' => 'Kode Jurusan Tidak Boleh Sama!!']]
        ]);
        if (!$validate) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/editJurusan/' . $id)->withInput('validation', $validation);;
        }
        $data = [
            'nama_jurusan' => strtoupper($this->request->getVar('nama_jurusan')),
            'keterangan' => ucwords($this->request->getVar('keterangan')),
        ];
        unset($data['_method']);
        $this->db->table('jurusan')->where(['id_jurusan' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/jurusan'))->with('success', 'Data Berhasil Diubah!');
        }
        return view('admin/jurusan/tambah', $data);
    }

    public function hapusJurusan($id)
    {
        $this->db->table('jurusan')->where(['id_jurusan' => $id])->delete();
        return redirect()->to(base_url('/admin/jurusan'))->with('success', 'Data Berhasil Dihapus!');
    }

    public function kelas()
    {
        $data['title'] = 'Data Kelas';

        $builder = $this->db->table('kelas');
        $query   = $builder->get();
        $data['kelas'] = $query->getResult();
        return view('admin/kelas/index', $data);
    }

    public function tambahKelas()
    {
        $builder = $this->db->table('jurusan');
        $query   = $builder->get();


        $data = [
            'title' => 'Tambah Data Kelas',
            'validation' => \Config\Services::validation(),
            'jurusan' => $query->getResult()

        ];

        return view('admin/kelas/tambah', $data);
    }
    public function simpanKelas()
    {
        // $validate=$this->validate([

        //     'nama_kelas' => [
        //         'rules' => 'required|is_unique[kelas.nama_kelas]', 
        //         'errors' => [
        //             'is_unique' => 'Kelas sudah ada'
        //             ]
        //         ],

        // ]); 
        // if (!$validate) {
        //       $validation = \Config\Services::validation();
        //     return redirect()->to('/admin/tambahKelas')->with('is_unique', 'Kelas Sudah Ada')->withInput('validation',$validation);;
        // }
        $nama_jurusan = $this->db->table('jurusan')->where([
            'id_jurusan' => $this->request->getVar('jurusan_id')
        ])->get()->getRowArray();;
        // dd($nama_jurusan);
        $data = [
            'tingkatan' => $this->request->getVar('tingkatan'),
            'rombel' => $this->request->getVar('rombel'),
            'jurusan_id' => $this->request->getVar('jurusan_id'),
            'nama_kelas' => strtoupper($this->request->getVar('tingkatan') . $nama_jurusan['nama_jurusan'] . $this->request->getVar('rombel')),
        ];
        $this->db->table('kelas')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/kelas'))->with('success', 'Data Berhasil Disimpan!');
        }
        return view('admin/kelas/tambah', $data);
    }
    public function hapusKelas($id)
    {
        $this->db->table('kelas')->where(['id_kelas' => $id])->delete();
        return redirect()->to(base_url('/admin/kelas'))->with('success', 'Data Berhasil Dihapus!');
    }


    public function editKelas($id = null)
    {
        $builder = $this->db->table('jurusan');
        $query   = $builder->get();

        $data = [
            'title' => 'Edit Data kelas',
            'validation' => \Config\Services::validation(),
            'jurusan' => $query->getResult()


        ];
        if ($id != null) {
            $query = $this->db->table('kelas')->getWhere(['id_kelas' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['kelas'] = $query->getRow();
                return view('admin/kelas/edit', $data);
            } else {
                return redirect()->to(base_url('/admin/kelas'))->with('eror', 'Data Tidak Ditemukan!');
            }
        } else {
            return redirect()->to(base_url('/admin/kelas'))->with('eror', 'Data Tidak Ditemukan!');
        }
    }

    public function updateKelas($id)
    {
        $validate = $this->validate([

            'nama_kelas' => [
                'rules' => 'required|is_unique[kelas.nama_kelas]',
                'errors' => [
                    'is_unique' => 'Kelas sudah ada'
                ]
            ],

        ]);
        if (!$validate) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/editkelas/' . $id)->with('is_unique', 'Kelas Sudah Ada')->withInput('validation', $validation);;
        }
        $nama_jurusan = $this->db->table('jurusan')->where([
            'id_jurusan' => $this->request->getVar('jurusan_id')
        ])->get()->getRowArray();;
        // dd($nama_jurusan);
        $data = [
            'tingkatan' => $this->request->getVar('tingkatan'),
            'rombel' => $this->request->getVar('rombel'),
            'jurusan_id' => $this->request->getVar('jurusan_id'),
            'nama_kelas' => strtoupper($this->request->getVar('tingkatan') . $nama_jurusan['nama_jurusan'] . $this->request->getVar('rombel')),
        ];
        unset($data['_method']);
        $this->db->table('kelas')->where(['id_kelas' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/kelas'))->with('success', 'Data Berhasil Diubah!');
        }
        return view('admin/kelas/tambah', $data);
    }

    public function editsiswa($id = null)
    {
        $builder = $this->db->table('kelas')->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        $query   = $builder->get();



        if ($id != null) {
            $query1 = $this->db->table('siswa')->join('user', 'user.id=siswa.user_id')->getWhere(['siswa.id' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Edit siswa',
                    'validation' => \Config\Services::validation(),
                    'kelas' => $query->getresult(),
                    'siswa' => $query1->getRow(),
                    'id' => $this->db->table('siswa')->getWhere(['siswa.id' => $id])->getRow()
                ];
                return view('admin/siswa/edit', $data);
            } else {
                return redirect()->to(base_url('/admin/siswa'))->with('eror', 'Data Tidak Ditemukan!');
            }
        } else {
            return redirect()->to(base_url('/admin/siswa'))->with('eror', 'Data Tidak Ditemukan!');
        }
    }

    public function updateSiswa($id = 0)
    {
        $data = $this->request->getPost();
        // if (!$this->validate([

        //     // 'nama' => ['rules' => 'required|is_unique[siswa.nama]', 'errors' => ['is_unique' => 'data Siswa Sudah Ada!!', 'required' => 'NISN wajib diisi!!']],
        //     // 'foto' => [
        //     //     'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        //     //     'errors' => [
        //     //         'max_size' => 'Ukuran Gambar Terlalu Besar',
        //     //         'is_image' => 'yang anda pilih bukan gambar',
        //     //         'mime_in' => 'yang anda pilih bukan gambar'
        //     //     ]
        //     // ]


        // ])) {
        //     $validation = \Config\Services::validation();
        //     return redirect()->to('/admin/editSiswa/' . $id)->with('is_unique', 'Data Siswa Sudah Ada!!!')->withInput();
        // }

        // $foto = $this->request->getFile('foto');
        // if ($foto->getError() == 4) {
            $namaFoto = ('jenis_kelamin') == '1' ? 'default-p.png' : 'default-l.png';
        // } else {
        //     $foto->move('img/siswa');
        //     $namaFoto = $foto->getName();
        // }
        // if ($foto->getError() == 4) {
        //     $datasiswa = [
        //         'nama' => $this->request->getPost('nama'),
        //         'id_kelas' => $this->request->getVar('kelas'),
        //         'tempat_lahir' => $this->request->getPost('tempat_lahir'),
        //         'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),

        //         'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        //         'agama' => $this->request->getPost('agama'),
        //         'no_hp' => $this->request->getPost('no_hp'),
        //         'alamat' => $this->request->getPost('alamat'),
        //         'nama_orangtua' => $this->request->getPost('nama_orangtua'),
        //         'pekerjaan_orangtua' => $this->request->getPost('pekerjaan_orangtua'),
        //     ];
        // } else {
            $datasiswa = [
                'nama' => $this->request->getPost('nama'),
                'id_kelas' => $this->request->getVar('kelas'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),

                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'agama' => $this->request->getPost('agama'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'nama_orangtua' => $this->request->getPost('nama_orangtua'),
                'pekerjaan_orangtua' => $this->request->getPost('pekerjaan_orangtua'),
                'foto' => $namaFoto,
            ];
        // }
        // $dataSiswa = [



        //     'nama' => $this->request->getPost('nama'),
        //     'id_kelas' => $this->request->getVar('kelas'),
        //     'tempat_lahir' => $this->request->getPost('tempat_lahir'),
        //     'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),

        //     'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        //     'agama' => $this->request->getPost('agama'),
        //     'no_hp' => $this->request->getPost('no_hp'),
        //     'alamat' => $this->request->getPost('alamat'),
        //     'nama_orangtua' => $this->request->getPost('nama_orangtua'),
        //     'pekerjaan_orangtua' => $this->request->getPost('pekerjaan_orangtua'),
        //     'foto' => $foto,


        // ];
        // dd($dataSiswa);

        unset($datasiswa['_method']);

        $this->ModelSiswa->update($id, $datasiswa);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/siswa'))->with('success', 'Data Berhasil Diubah!');
        }
        // return view('admin/mapel/tambah',$data);

    }

    public function editGuru($id = null)
    {

        $data['title'] = "Edit Guru";
        // if ($id != null) {
        //     $query = $this->db->table('guru')->getWhere(['id' => $id]);
        //     if ($query->resultID->num_rows > 0) {
        //         $data['guru'] = $query->getRow();
        //         return view('admin/guru/edit', $data);
        //     } else {
        //         return redirect()->to(base_url('/admin/guru'))->with('eror', 'Data Tidak Ditemukan!');
        //     }
        // } else {
        //     return redirect()->to(base_url('/admin/guru'))->with('eror', 'Data Tidak Ditemukan!');
        // }
        $query = $this->db->table('guru')->join('user', 'user.id=guru.user_id')->getWhere(['guru.id' => $id]);

        if ($query->resultID->num_rows > 0) {
            $data = [
                'title' => 'Edit Guru',
                'validation' => \Config\Services::validation(),
                'guru' => $query->getRow(),
                'id' => $this->db->table('guru')->getWhere(['guru.id' => $id])->getRow()
            ];
            return view('admin/guru/edit', $data);
        } else {
            return redirect()->to(base_url('/guru/siswa'))->with('eror', 'Data Tidak Ditemukan!');
        }
    }

    public function updateGuru($id)
    {
        $data = $this->request->getPost();
        if (!$this->validate([

            'nama' => ['rules' => 'required', 'errors' => [ 'required' => 'NISN wajib diisi!!']]


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/editGuru/' . $id)->with('is_unique', 'Data Guru Sudah Ada!!!')->withInput();
        }
        $data = [

            'nama' => $this->request->getPost('nama'),

            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama' => $this->request->getPost('agama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat')


        ];
        unset($data['_method']);
        $this->db->table('guru')->where(['id' => $id])->update($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('/admin/guru'))->with('success', 'Data Berhasil Diubah!');
        }
        // return view('admin/mapel/tambah',$data);

    }
}
