<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoModel extends Model
{
    protected $table = 'tbl_info';
    protected $primaryKey = 'id_info';
    protected $allowedFields = [
        'judul', 'deskripsi', 'gambar', 'type'
    ];

    public function getInfo($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_info' => $id])->first();
    }
}
