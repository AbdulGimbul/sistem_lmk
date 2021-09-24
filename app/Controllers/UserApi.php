<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Firebase\JWT\JWT;

class UserApi extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header)
            return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];

        try {
            $decode = JWT::decode($token, $key, ['HS256']);
            $response = [
                'id_user' => $decode->uid,
                'username' => $decode->username
            ];

            return $this->respond($response);
        } catch (\Throwable $th) {
            return $this->fail('Invalid Token');
        }
    }
}
