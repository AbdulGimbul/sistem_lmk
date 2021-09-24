<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\GuruModel;

class GuruApi extends ResourceController
{
    use ResponseTrait;
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $guruModel;
    public function __construct()
    {
        $this->guruModel = new GuruModel();
    }

    //all guru
    public function index()
    {
        $data['guru'] = $this->guruModel->orderBy('id_guru', 'DESC')->findAll();
        return $this->respond($data);
    }

    //create
    public function create()
    {

        $data = [
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'jk' => $this->request->getVar('jk'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat' => $this->request->getVar('alamat')
        ];

        $this->guruModel->insert($data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Guru berhasil ditambahkan'
            ]
        ];

        return $this->respondCreated($response);
    }

    //detail user
    public function show($id = null)
    {
        $data = $this->guruModel->getGuru($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Guru tidak ditemukan.');
        }
    }

    //update
    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        $this->guruModel->update($id, $data);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data guru berhasil diperbarui'
            ]
        ];

        return $this->respond($response);
    }

    public function delete($id = null)
    {
        //cari gambar berdasarkan id
        $guru = $this->guruModel->find($id);

        //cek jika file gambarnya default.png
        if ($guru['avatar'] != 'default.png') {
            //hapus gambar
            unlink('assets/img/' . $guru['avatar']);
        }

        $data = $this->guruModel->where('id_guru', $id)->delete($id);
        if ($data) {
            $this->guruModel->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'message' => [
                    'success' => 'Data guru berhasil dihapus'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Guru tidak ditemukan.');
        }
    }
}
