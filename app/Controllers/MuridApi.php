<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MuridModel;

class MuridApi extends ResourceController
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
        $this->muridModel = new MuridModel();
    }

    //all murid
    public function index()
    {
        $data['murid'] = $this->muridModel->orderBy('id_murid', 'DESC')->findAll();
        return $this->respond($data);
    }

    //create
    public function create()
    {

        $data = [
            'nama' => $this->request->getVar('nama'),
            'jk' => $this->request->getVar('jk'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'asal_sekolah' => $this->request->getVar('asal_sekolah'),
            'kelas' => $this->request->getVar('kelas')
        ];

        $this->muridModel->insert($data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Murid berhasil ditambahkan'
            ]
        ];

        return $this->respondCreated($response);
    }

    //detail user
    public function show($id = null)
    {
        $data = $this->muridModel->getMurid($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Murid tidak ditemukan.');
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
                'success' => 'Data murid berhasil diperbarui'
            ]
        ];

        return $this->respond($response);
    }

    public function delete($id = null)
    {
        //cari gambar berdasarkan id
        $guru = $this->muridModel->find($id);

        //cek jika file gambarnya default.png
        if ($guru['avatar'] != 'default.png') {
            //hapus gambar
            unlink('assets/img/' . $guru['avatar']);
        }

        $data = $this->muridModel->where('id_murid', $id)->delete($id);
        if ($data) {
            $this->muridModel->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'message' => [
                    'success' => 'Data murid berhasil dihapus'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Murid tidak ditemukan.');
        }
    }
}
