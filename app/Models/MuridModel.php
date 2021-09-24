<?php

namespace App\Models;

use CodeIgniter\Model;

class MuridModel extends Model
{
    protected $table = 'tbl_murid';
    protected $primaryKey = 'id_murid';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_daftar', 'id_user', 'nama', 'jk', 'tempat_lahir', 'tgl_lahir', 'alamat', 'asal_sekolah', 'kelas', 'avatar', 'created_at', 'updated_at'
    ];

    public function getMurid($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_murid' => $id])->first();
    }

    public function search($cari)
    {
        // $builder = $this->table('tbl_murid');
        // $builder->like('nama', $cari);
        // return $builder;

        return $this->table('tbl_murid')->like('nama', $cari)->orLike('alamat', $cari);
    }
}
