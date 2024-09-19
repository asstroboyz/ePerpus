<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model
{
    protected $table = 'guru';
    protected $useTimestamps = true;
    protected $primarykey = 'id';
    protected $allowedFields = ['id', 'user_id', 'id_mengajar', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'no_hp', 'alamat', 'foto'];
    public function siswa($data)
    {
        $this->db->table('siswa')->insert($data);
    }

    public function guru($data)
    {
        $this->db->table('guru')->insert($data);
    }

    public function login($username)
    {
        $useTimestamps = true;
        return $this->db->table('user')->where([
            'username' => $username
        ])->get()->getRowArray();
    }
}
