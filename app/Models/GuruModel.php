<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'tbl_guru';
    protected $primaryKey = 'id_guru';
    protected $allowedFields = [
        'username', 'nama', 'jk', 'tempat_lahir', 'tgl_lahir', 'avatar', 'alamat', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;

    public function getGuru($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_guru' => $id])->first();
    }
}
