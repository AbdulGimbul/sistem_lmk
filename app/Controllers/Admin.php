<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        //cek apakah ada session bernama isLogin

    }
}
