<?php

namespace App\Controllers;

use App\Models\MuridModel;

class Murid extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $muridModel;
    public function __construct()
    {
        $this->muridModel = new MuridModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_murid') ? $this->request->getVar('page_murid') : 1;

        $cari = $this->request->getVar('cari');
        if ($cari) {
            $murid = $this->muridModel->search($cari);
        } else {
            $murid = $this->muridModel;
        }

        $murid = $murid->paginate(7, 'murid');
        $pager = $this->muridModel->pager;

        $data = [
            'title' => 'Data Murid',
            'murid' => $murid,
            'pager' => $pager,
            'currentPage' => $currentPage
        ];

        return view('murid/index', $data);
    }
}
