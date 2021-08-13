<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nik', 'nama', 'jk', 'alamat', 'username', 'avatar', 'password', 'salt', 'created_at', 'updated_at'
    ];
    protected $returnType = 'App\Entities\User';
    protected $useTimestamps = false;

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
