<?php

namespace App\Controllers;

class Auth extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;

    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function register()
    {
        if ($this->request->getPost()) {
            //lakukan validasi untuk data yang dipost
            $data = $this->request->getPost();
            $this->validation->run($data, 'register');
            $errors = $this->validation->getErrors();

            //jika tidak ada errors jalankan
            if (!$errors) {
                $userModel = new \App\Models\UserModel();

                $user = new \App\Entities\User();

                $user->username = $this->request->getPost('username');
                $user->password = $this->request->getPost('password');

                $user->nik = $this->request->getPost('nik');
                $user->nama = $this->request->getPost('nama');
                $user->jk = $this->request->getPost('jk');
                $user->alamat = $this->request->getPost('alamat');
                $user->role = 2;

                $user->created_by = 0;
                $user->created_at = date("Y-m-d H:i:s");

                $userModel->save($user);

                return view('login');
            }
            $this->session->setFlashdata('errors', $errors);
        }

        $data = [
            'title' => 'Register'
        ];

        return view('register', $data);
    }

    public function login()
    {
        if ($this->request->getPost()) {
            //lakukan validasi untuk data yang dipost
            $data = $this->request->getPost();
            $this->validation->run($data, 'login');
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
                        'id' => $user->id_user,
                        'isLoggedIn' => TRUE,
                        'role' => $user->role
                    ];

                    $this->session->set($sessData);

                    return redirect()->to(site_url('home/index'));
                }
            } else {
                $this->session->setFlashdata('errors', ['User tidak ditemukan']);
            }
        }

        $data = [
            'title' => 'Login'
        ];

        return view('login', $data);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('auth/login'));
    }
}
