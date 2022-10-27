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

            tbl_jadwal.id_murid,
            
            tbl_jadwal.id_guru,

            tbl_jadwal.hari,

            tbl_jadwal.jam,

            tbl_guru.nama as nama_guru,

            tbl_murid.nama as nama_murid,

            tbl_murid.alamat as alamat_murid,

            tbl_guru.alamat as alamat_guru,

            tbl_guru.avatar as avatar_guru

            FROM tbl_jadwal INNER JOIN tbl_guru ON tbl_jadwal.id_guru = tbl_guru.id_guru INNER JOIN tbl_murid ON tbl_jadwal.id_murid = tbl_murid.id_murid  WHERE tbl_jadwal.status = 1");



            return $jadwal->getResultArray();
        }



        $jadwal = $this->db->query("SELECT

        tbl_murid.id_murid,

        tbl_jadwal.id_guru,

        tbl_jadwal.id_jadwal,

        tbl_jadwal.hari,

        tbl_jadwal.jam,

        tbl_jadwal.status,

        tbl_guru.nama as nama_guru

        FROM tbl_jadwal INNER JOIN tbl_guru ON tbl_jadwal.id_guru = tbl_guru.id_guru INNER JOIN tbl_murid ON tbl_jadwal.id_murid = tbl_murid.id_murid WHERE tbl_murid.id_murid = $id");



        return $jadwal->getResultArray();
    }

    public function getJadwalGuru($id)
    {
        $jadwal = $this->db->query("SELECT

        tbl_murid.id_murid,
        tbl_murid.alamat as alamat_murid,

        tbl_jadwal.id_guru,

        tbl_jadwal.id_jadwal,

        tbl_jadwal.hari,

        tbl_jadwal.jam,

        tbl_jadwal.status,
        tbl_jadwal.is_read,

        tbl_guru.nama as nama_guru,

        tbl_murid.nama as nama_murid

        FROM tbl_jadwal INNER JOIN tbl_guru ON tbl_jadwal.id_guru = tbl_guru.id_guru INNER JOIN tbl_murid ON tbl_jadwal.id_murid = tbl_murid.id_murid WHERE tbl_jadwal.id_guru = $id AND tbl_jadwal.status = 1");



        return $jadwal->getResultArray();
    }

    public function getJadwalById($id)
    {
        $jadwal = $this->db->query("SELECT
        tbl_murid.id_murid,
        tbl_murid.nama,
        tbl_jadwal.id_jadwal,
        tbl_jadwal.hari,
        tbl_jadwal.jam,
        tbl_jadwal.status
        FROM tbl_jadwal INNER JOIN tbl_murid ON tbl_jadwal.id_murid = tbl_murid.id_murid WHERE tbl_jadwal.id_jadwal = $id");

        return $jadwal->getRowArray();
    }
}
