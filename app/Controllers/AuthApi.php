<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;

class AuthApi extends ResourceController
{
    use ResponseTrait;

    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->userModel = new \App\Models\UserModel();
    }

    public function register()
    {
        if ($this->request->getPost()) {
            //lakukan validasi untuk data yang dipost
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'register');
            $errors = $this->validation->getErrors();

            //jika tidak ada errors jalankan
            if (!$validate) {
                return $this->fail($errors);
            }

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

            $this->userModel->save($user);

            $response = [
                'status' => 201,
                'error' => null,
                'messages' => 'User berhasil didaftarkan'
            ];

            return $this->respondCreated($response);
        }
    }

    public function login()
    {
        if ($this->request->getPost()) {
            //lakukan validasi untuk data yang dipost
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');
            $errors = $this->validation->getErrors();

            if (!$validate) {
                return $this->fail($errors);
            }

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $this->userModel->where('username', $username)->first();
            if (!$user) {
                return $this->failNotFound('Username Not Found');
            }

            $salt = $user->salt;
            if ($user->password !== md5($salt . $password)) {
                return $this->fail('Wrong Password');
            }

            $key = getenv('TOKEN_SECRET');
            $payload = array(
                "iat" => 1356999524,
                "nbf" => 1357000000,
                "uid" => $user->id_user,
                "username" => $user->username,
                "role" => $user->role
            );

            $token = JWT::encode($payload, $key);

            $output = [
                'status' => 200,
                'message' => 'Berhasil login',
                "token" => $token,
                "username" => $username,
            ];

            return $this->respond($output);
        }
    }
}
