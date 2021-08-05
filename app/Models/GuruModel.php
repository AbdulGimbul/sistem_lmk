<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'tbl_guru';
    protected $primaryKey = 'id_guru';
    protected $allowedFields = [
        'nama', 'jk', 'username', 'avatar', 'alamat', 'created_date', 'updated_by'
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
