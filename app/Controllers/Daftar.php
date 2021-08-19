<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\JadwalModel;
use App\Models\MuridModel;
use App\Models\DaftarModel;

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
    protected $daftarModel;

    public function __construct()
    {
        $this->guruModel = new GuruModel();
        $this->muridModel = new MuridModel();
        $this->jadwalModel = new JadwalModel();
        $this->daftarModel = new DaftarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jadwal',
            'guru' => $this->guruModel->findAll(),
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

        $this->muridModel->save([
            'nama' => $this->request->getVar('nama'),
            'jk' => $this->request->getVar('jk'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'asal_sekolah' => $this->request->getVar('asal_sekolah'),
            'kelas' => $this->request->getVar('kelas'),
            'avatar' => $namaFoto
        ]);

        $this->jadwalModel->save([
            'id_guru' => $this->request->getVar('guru'),
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam')
        ]);

        $this->daftarModel->save([]);

        session()->setFlashdata('pesan', 'Data murid baru berhasil didaftarkan.');

        return redirect()->to('/murid');
    }
}
