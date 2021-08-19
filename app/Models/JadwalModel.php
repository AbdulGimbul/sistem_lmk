<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'tbl_jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = [
        'id_murid', 'id_pendaftar', 'id_guru', 'hari', 'jam', 'status'
    ];
}
