<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarModel extends Model
{
    protected $table = 'tbl_pendaftaran';
    protected $primaryKey = 'id_daftar';
    protected $useTimestamps = true;
    protected $createdField = 'tanggal_daftar';
    protected $updatedField = '';
    protected $allowedFields = [
        'status'
    ];
}
