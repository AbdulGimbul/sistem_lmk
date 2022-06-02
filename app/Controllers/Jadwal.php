<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\JadwalModel;
use App\Models\MuridModel;
use App\Models\UserModel;

class Jadwal extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $guruModel;
    protected $muridModel;
    protected $jadwalModel;

    public function __construct()
    {
        $this->guruModel = new GuruModel();
        $this->muridModel = new MuridModel();
        $this->jadwalModel = new JadwalModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $jadwal = $this->jadwalModel->getJadwal();
        $guru = $this->guruModel->findAll();
        $murid = $this->muridModel->findAll();

        $data = [
            'title' => 'Jadwal Les LMK',
            'jadwal' => $jadwal,
            'guru' => $guru,
            'murid' => $murid,
            'validation' => \Config\Services::validation()
        ];

        return view('jadwal/index', $data);
    }

    public function getJadwalGuru($id)
    {

        $ambilGuru = $this->jadwalModel->where(['id_guru' => $id])->first();
        $ambilIdGuru = $ambilGuru['id_guru'];
        $ambilJadwal = $this->jadwalModel->getJadwalGuru($ambilIdGuru);

        foreach ($ambilJadwal as $j) {
            $result[] = $j;
            $data['Jadwal Guru'] = $result;

            // $coba = $this->jadwalModel->where(['id_murid' => $cekOrtuMurid->id_murid]);
            // echo $coba->id_murid;

        }
        // $ambilMurid = $this->muridModel->where(['id_user' => $ambilIdUser])->first();
        // $ambilIdMurid = $ambilMurid['id_murid'];
        return $this->respond($data);
    }

    public function save()
    {

        $this->jadwalModel->save([
            'id_murid' => $this->request->getVar('murid'),
            'id_guru' => $this->request->getVar('guru'),
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam'),
            'status' => 1
        ]);

        session()->setFlashdata('pesan', 'Jadwal LMK berhasil ditambahkan.');

        return redirect()->to('/jadwal');
    }

    public function getUbah()
    {
        echo json_encode($this->jadwalModel->getJadwalById($_POST['id']));
    }

    public function update()
    {
        $id = $_POST['id'];

        $data = [
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam')
        ];

        $this->jadwalModel->update($id, $data);

        return redirect()->to('/jadwal');
    }

    public function delete($id)
    {

        $this->jadwalModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/jadwal');
    }
}
