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

        $data = [
            'title' => 'Form Pendaftaran',
            'jadwal' => $jadwal,
            'validation' => \Config\Services::validation()
        ];


        return view('jadwal/index', $data);
    }
}
