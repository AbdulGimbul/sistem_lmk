<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarModel extends Model
{
    protected $table = 'tbl_pendaftaran';
    protected $primaryKey = 'id_pendaftar';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'tanggal_daftar', 'status'
    ];
}
