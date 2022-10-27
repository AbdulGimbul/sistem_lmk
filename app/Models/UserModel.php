<?php



namespace App\Models;



use CodeIgniter\Model;



class UserModel extends Model

{

   

    protected $returnType = 'App\Entities\User';

    protected $table = 'user';

    protected $primaryKey = 'id_user';

    protected $allowedFields = [

        'nama', 'jk', 'alamat', 'nohp', 'username', 'avatar', 'password', 'role', 'salt', 'created_at', 'updated_at'

    ];



    protected $useTimestamps = false;



    public function getUser($id = false)

    {

        if ($id == false) {

            return $this->findAll();

        }



        return $this->where(['id_user' => $id])->first();

    }

}

