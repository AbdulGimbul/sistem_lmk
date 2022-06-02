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

        $validation = \Config\Services::validation();


        $user = $this->userModel->getUser($id);



        $data = [

            'title' => 'Profil Akun',

            'user' => $user,
            'validation' => $validation

        ];



        return view('user/index', $data);
    }



    public function update($id)

    {

        $this->userModel->save([

            'id_user' => $id,

            'username' => $this->request->getVar('username'),

            'nama' => $this->request->getVar('nama'),

            'jk' => $this->request->getVar('jk'),

            'alamat' => $this->request->getVar('alamat'),

            'nohp' => $this->request->getVar('nohp')

        ]);



        return redirect()->to('/user');
    }


    public function updatePassword()

    {
        $session = session();
        if ($this->request->getPost()) {

            //lakukan validasi untuk data yang dipost

            $validation = \Config\Services::validation();

            $data = $this->request->getPost();

            $validation->run($data, 'updatepassword');

            $errors = $validation->getErrors();

            if (!$errors) {
                $session = session();

                $id = $session->get('id');

                $userEntity = new \App\Entities\User();
                $user = $this->userModel->getUser($id);

                $current_password = $this->request->getVar('current_password');
                $new_password = $this->request->getVar('new_password1');

                $password_lama = (md5($user->salt . $current_password));

                if ($password_lama != $user->password) {
                    $session->setFlashdata('errors', ['Password lama salah!']);
                    return redirect()->to('/user');
                } else {
                    //password OK
                    $userEntity->id_user = $user->id_user;
                    $userEntity->password = $new_password;

                    $this->userModel->save($userEntity);
                    $session->setFlashdata('berhasil', 'Password berhasil diubah!');
                    return redirect()->to('/user');
                }
            } else {
                $session->setFlashdata('errors', $errors);
                return redirect()->to('/user');
            }
        }
    }



    public function updateFoto($id)

    {

        $fileFoto = $this->request->getFile('foto');



        if ($fileFoto->getError() == 4) {

            $namaFoto = base_url('/assets/img/default.png');
        } else {

            $fileFoto->move('assets/img');

            //ambil nama foto

            $namaFoto = $fileFoto->getName();

            $simpanPath = base_url('/assets/img/' . $namaFoto);
        }



        $this->userModel->save([

            'id_user' => $id,

            'avatar' => $simpanPath

        ]);



        return redirect()->to('/user');
    }
}
