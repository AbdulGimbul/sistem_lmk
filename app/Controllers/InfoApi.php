<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\InfoModel;

class InfoApi extends ResourceController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;

    public function __construct()
    {
        $this->infoModel = new InfoModel();
    }

    public function index()
    {
        $data['info'] = $this->infoModel->orderBy('id_info', 'DESC')->findAll();
        return $this->respond($data);
    }

    //detail info
    public function show($id = null)
    {
        $data = $this->infoModel->getInfo($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Info tidak ditemukan.');
        }
    }

    public function getProgram()
    {
        $data['program'] = $this->infoModel->where(['type' => 1])->find();
        return $this->respond($data);
    }

    public function getTentang()
    {
        $data['tentang lmk'] = $this->infoModel->where(['type' => 2])->find();
        return $this->respond($data);
    }
}
