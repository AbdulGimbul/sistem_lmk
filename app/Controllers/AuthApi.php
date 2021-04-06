<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class AuthApi extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format = 'json';

    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        return $this->respond($this->model->findAll());
    }


    public function register()
    {
        if ($this->request->getPost()) {
            //lakukan validasi untuk data yang dipost
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'register');
            $errors = $this->validation->getErrors();

            //jika tidak ada errors jalankan
            if (!$errors) {
                $userModel = new \App\Models\UserModel();

                $user = new \App\Entities\User();

                $user->username = $this->request->getPost('username');
                $user->password = $this->request->getPost('password');

                $user->created_by = 0;
                $user->created_date = date("Y-m-d H:i:s");

                $userModel->save($user);

                return $this->respondCreated($user, 'user created');
            }
            $this->session->setFlashdata('errors', $errors);
        }

        return view('register');
    }

    public function login()
    {
        if ($this->request->getPost()) {
            //lakukan validasi untuk data yang dipost
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');
            $errors = $this->validation->getErrors();

            if ($errors) {
                return view('login');
            }

            $userModel = new \App\Models\UserModel();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $userModel->where('username', $username)->first();

            if ($user) {
                $salt = $user->salt;
                if ($user->password !== md5($salt . $password)) {
                    $this->session->setFlashdata('errors', ['Password salah']);
                } else {
                    $sessData = [
                        'username' => $user->username,
                        'id' => $user->id,
                        'isLoggedIn' => TRUE
                    ];

                    $this->session->set($sessData);

                    return $this->respond($user);
                }
            } else {
                $this->session->setFlashdata('errors', ['User tidak ditemukan']);
            }
        }

        return view('login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('auth/login'));
    }
}