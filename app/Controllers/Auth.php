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



            $avatar = base_url('/assets/img/default_account.png');



            //jika tidak ada errors jalankan

            if (!$errors) {

                $userModel = new \App\Models\UserModel();



                $user = new \App\Entities\User();



                $user->username = $this->request->getVar('username');

                $user->password = $this->request->getVar('password');



                $user->nama = $this->request->getVar('nama');

                $user->jk = $this->request->getVar('jk');

                $user->alamat = $this->request->getVar('alamat');

                $user->nohp = $this->request->getVar('no_hp');

                $user->avatar = $avatar;

                $user->role = 2;



                $user->created_by = 0;

                $user->created_at = date("Y-m-d H:i:s");



                $userModel->save($user);



                return view('login');
            }

            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('/auth/register')->withInput();
        }



        $data = [

            'title' => 'Register',
            'validation' => $this->validation

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

            if (!$errors) {
                $userModel = new \App\Models\UserModel();
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                $user = $userModel->where('username', $username)->first();

                if ($user) {
                    $salt = $user->salt;

                    if ($user->password !== md5($salt . $password)) {
                        $this->session->setFlashdata('pwd', 'Password salah');
                    } else {
                        $sessData = [
                            'username' => $user->username,
                            'nama' => $user->nama,
                            'id' => $user->id_user,
                            'isLoggedIn' => TRUE,
                            'role' => $user->role,
                            'avatar' => $user->avatar
                        ];
                        $this->session->set($sessData);

                        return redirect()->to(site_url('home/index'));
                    }
                } else {
                    // $this->session->setFlashdata('user', 'User tidak ditemukan');

                    $guruModel = new \App\Models\GuruModel();
                    $username = $this->request->getPost('username');
                    $password = $this->request->getPost('password');
                    $user = $guruModel->where('username', $username)->first();

                    if ($user) {

                        if ($user['password'] !== $password) {
                            $this->session->setFlashdata('pwd', 'Password salah');
                        } else {
                            $sessData = [
                                'username' => $user['username'],
                                'nama' => $user['nama'],
                                'id' => $user['id_guru'],
                                'isLoggedIn' => TRUE,
                                'role' => $user['role'],
                                'avatar' => $user['avatar']
                            ];
                            $this->session->set($sessData);

                            return redirect()->to(site_url('home/index'));
                        }
                    } else {
                        $this->session->setFlashdata('user', 'User tidak ditemukan');
                    }
                }
            } else {
                $this->session->setFlashdata('errors', $errors);
                return redirect()->to('/auth/login')->withInput();
            }
        }

        $data = [
            'title' => 'Login',
            'validation' => $this->validation
        ];

        return view('login', $data);
    }



    public function logout()

    {

        $this->session->destroy();

        return redirect()->to(site_url('auth/login'));
    }
}
