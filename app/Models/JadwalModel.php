<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'tbl_jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = [
        'id_murid', 'id_guru', 'hari', 'jam', 'status'
    ];

    public function getJadwal($id = false)
    {
        if ($id == false) {
            $jadwal = $this->db->query("SELECT tbl_jadwal.id_jadwal,
            tbl_jadwal.hari,
            tbl_jadwal.jam,
            tbl_guru.nama as nama_guru,
            tbl_murid.nama as nama_murid,
            tbl_murid.alamat as alamat_murid
            FROM tbl_jadwal INNER JOIN tbl_guru ON tbl_jadwal.id_guru = tbl_guru.id_guru INNER JOIN tbl_murid ON tbl_jadwal.id_murid = tbl_murid.id_murid  WHERE tbl_jadwal.status = 1");

            return $jadwal->getResultArray();
        }

        $jadwal = $this->db->query("SELECT
        tbl_murid.id_murid,
        tbl_jadwal.id_jadwal,
        tbl_jadwal.hari,
        tbl_jadwal.jam,
        tbl_jadwal.status,
        tbl_guru.nama as nama_guru
        FROM tbl_jadwal INNER JOIN tbl_guru ON tbl_jadwal.id_guru = tbl_guru.id_guru INNER JOIN tbl_pendaftaran ON tbl_jadwal.status = tbl_pendaftaran.status INNER JOIN tbl_murid ON tbl_jadwal.id_murid = tbl_murid.id_murid WHERE tbl_murid.id_murid = $id GROUP BY tbl_murid.id_murid");

        return $jadwal->getResultArray();
    }
}
