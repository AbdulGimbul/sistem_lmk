<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // public function __construct()
    // {
    //     $this->session = session();
    // }
    protected $returnType = 'App\Entities\User';
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'nik', 'nama', 'jk', 'alamat', 'username', 'avatar', 'password', 'salt', 'created_at', 'updated_at'
    ];

    // public function ambilEntities()
    // {

    //     if (!$session->has('isLoggedIn')) {
    //         return $this->returnType = 'App\Entities\User';
    //     }
    // }

    protected $useTimestamps = false;

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $id])->first();
    }
}
