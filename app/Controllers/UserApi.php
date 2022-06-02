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

    //update
    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        $userModel = new UserModel();

        $userModel->update($id, $data);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => 'Data user berhasil diperbarui'
        ];

        return $this->respond($response);
    }

    public function updateFoto($id)
    {

        $userModel = new UserModel();

        $fileFoto = $this->request->getFile('image');
        $method = "PUT";

        if ($fileFoto->getError() == 4) {

            $namaFoto = base_url('/assets/img/default.png');
        } else {

            $fileFoto->move('assets/img');

            //ambil nama foto

            $namaFoto = $fileFoto->getName();

            $simpanPath = base_url('/assets/img/' . $namaFoto);
        }

        if ($userModel->save(['id_user' => $id, 'avatar' => $simpanPath])) {
            $response = [
                'error' => false,
                'messages' => 'Foto berhasil diperbarui',
                'image' => $simpanPath
            ];
        } else {
            $response = [
                'error' => 500,
                'messages' => 'Foto gagal diperbarui'
            ];
        }




        return $this->respond($response);
    }
}
