<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $session = session();
        $id = $session->get('id');

        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'Profil Akun',
            'user' => $user
        ];

        return view('user/index', $data);
    }
}
