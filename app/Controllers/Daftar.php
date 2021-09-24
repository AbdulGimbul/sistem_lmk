<?php

namespace App\Controllers;

use App\Models\DaftarModel;
use App\Models\GuruModel;
use App\Models\JadwalModel;
use App\Models\MuridModel;
use App\Models\UserModel;

class Daftar extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $guruModel;
    protected $muridModel;
    protected $jadwalModel;

    public function __construct()
    {
        $this->guruModel = new GuruModel();
        $this->muridModel = new MuridModel();
        $this->jadwalModel = new JadwalModel();
        $this->userModel = new UserModel();
        $this->daftarModel = new DaftarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jadwal',
            'guru' => $this->guruModel->findAll(),
            'user' => $this->userModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('daftar/index', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[tbl_murid.nama]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto tidak boleh lebih dari 1 MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/daftar/index')->withInput();
        }

        //ambil gambar
        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto->getError() == 4) {
            if ($this->request->getVar('jk') == 'Laki-laki') {
                $namaFoto = 'default_ikhwan.png';
            } else {
                $namaFoto = 'default_akhwat.png';
            }
        } else {
            //pindahkan foto ke folder img
            $fileFoto->move('assets/img');
            //ambil nama foto
            $namaFoto = $fileFoto->getName();
        }

        $ambilUser = $this->request->getVar('user');
        $namaMurid = $this->request->getVar('nama');

        $status = $this->request->getVar('status');
        $this->daftarModel->save([
            'status' => $status
        ]);

        $db = \Config\Database::connect();
        $db->transBegin();
        $query = $db->query("INSERT INTO tbl_pendaftaran (status) VALUES ('0')");
        $queryDaftar = $db->query("INSERT INTO tbl_murid (id_daftar) VALUES(LAST_INSERT_ID())");
        // $idDaftar = $query->getLastRow('array');

        $this->muridModel->save([
            'id_daftar' => $queryDaftar,
            'id_user' => $ambilUser,
            'nama' => $namaMurid,
            'jk' => $this->request->getVar('jk'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'asal_sekolah' => $this->request->getVar('asal_sekolah'),
            'kelas' => $this->request->getVar('kelas'),
            'avatar' => $namaFoto
        ]);

        $idUser = $this->muridModel->where(['id_user' => $ambilUser, 'nama' => $namaMurid])->first();

        $this->jadwalModel->save([
            'id_murid' => $idUser['id_murid'],
            'id_guru' => $this->request->getVar('guru'),
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam'),
            'status' => $status
        ]);

        session()->setFlashdata('pesan', 'Data murid baru berhasil didaftarkan.');

        return redirect()->to('/murid');
    }
}
