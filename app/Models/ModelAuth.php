<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;
    protected $primarykey = 'id';
    protected $allowedFields = ['id', 'username', 'password', 'role_id'];
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
       
        return $this->db->table('user')->where([
            'username' => $username
        ])->get()->getRowArray();
    }
}
