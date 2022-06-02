<?php

namespace App\Controllers;

use App\Models\GuruModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\JadwalModel;
use App\Models\MuridModel;
use App\Models\UserModel;

class JadwalApi extends ResourceController
{
    use ResponseTrait;
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->userModel = new UserModel();
        $this->muridModel = new MuridModel();
        $this->guruModel = new GuruModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['jadwal'] = $this->jadwalModel->findAll();

        return $this->respond($data);
    }

    public function getJadwalUserLogin()
    {
        $session = session();

        $idUser = $session->get('id');
        $ambilUser = $this->userModel->where(['id_user' => $idUser])->first();
        $ambilIdUser = $ambilUser->id_user;
        $ambilJadwal = $this->jadwalModel->getJadwal();

        foreach ($ambilJadwal as $j) {
            $idMuridJadwal = $j['id_murid'];

            $cekOrtuMurid = $this->db->query("SELECT * FROM tbl_murid WHERE id_murid = '" . $idMuridJadwal . "'")->getRowArray();
            $idOrtuMurid = $cekOrtuMurid['id_user'];

            if ($idOrtuMurid == $ambilIdUser) {
                $result[] = $j;
                $data['Jadwal User'] = $result;
            }
            // $coba = $this->jadwalModel->where(['id_murid' => $cekOrtuMurid->id_murid]);
            // echo $coba->id_murid;

        }
        // $ambilMurid = $this->muridModel->where(['id_user' => $ambilIdUser])->first();
        // $ambilIdMurid = $ambilMurid['id_murid'];
        return $this->respond($data);
    }

    public function getJadwalGuru($id)
    {

        $ambilGuru = $this->jadwalModel->where(['id_guru' => $id])->first();
        if ($ambilGuru != null) {
            $ambilIdGuru = $ambilGuru['id_guru'];
            $ambilJadwal = $this->jadwalModel->getJadwalGuru($ambilIdGuru);

            foreach ($ambilJadwal as $j) {
                $result[] = $j;
                $data['Jadwal Guru'] = $result;

                // $coba = $this->jadwalModel->where(['id_murid' => $cekOrtuMurid->id_murid]);
                // echo $coba->id_murid;

            }
        }
        // $ambilMurid = $this->muridModel->where(['id_user' => $ambilIdUser])->first();
        // $ambilIdMurid = $ambilMurid['id_murid'];
        if (isset($data)) {
            $hasil = $this->respond($data);
        } else {
            $data['Jadwal Guru'] = [];
            $hasil = $this->respond($data);
        }
        return $hasil;
    }

    public function getJadwalUser($id)
    {

        $ambilUser = $this->userModel->where(['id_user' => $id])->first();
        $ambilIdUser = $ambilUser->id_user;
        $ambilJadwal = $this->jadwalModel->getJadwal();

        foreach ($ambilJadwal as $j) {
            $idMuridJadwal = $j['id_murid'];
            $cekOrtuMurid = $this->db->query("SELECT * FROM tbl_murid WHERE id_murid = '" . $idMuridJadwal . "'")->getRowArray();
            $idOrtuMurid = $cekOrtuMurid['id_user'];

            if ($idOrtuMurid == $ambilIdUser) {
                $result[] = $j;
                $data['Jadwal User'] = $result;
            }
            // $coba = $this->jadwalModel->where(['id_murid' => $cekOrtuMurid->id_murid]);
            // echo $coba->id_murid;
        }
        // $ambilMurid = $this->muridModel->where(['id_user' => $ambilIdUser])->first();
        // $ambilIdMurid = $ambilMurid['id_murid'];
        if (isset($data)) {
            $hasil = $this->respond($data);
        } else {
            $data['Jadwal User'] = [];
            $hasil = $this->respond($data);
        }
        return $hasil;
    }
}
