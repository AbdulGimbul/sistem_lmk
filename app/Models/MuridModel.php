<?php

namespace App\Models;

use CodeIgniter\Model;

class MuridModel extends Model
{
    protected $table = 'tbl_murid';
    protected $primaryKey = 'id_murid';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama', 'alamat'
    ];

    public function search($cari)
    {
        // $builder = $this->table('tbl_murid');
        // $builder->like('nama', $cari);
        // return $builder;

        return $this->table('tbl_murid')->like('nama', $cari)->orLike('alamat', $cari);
    }
}
