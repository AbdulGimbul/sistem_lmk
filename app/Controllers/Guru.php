<?php

namespace App\Controllers;

use App\Models\GuruModel;

class Guru extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $guruModel;
    public function __construct()
    {
        $this->guruModel = new GuruModel();
    }

    public function index()
    {
        $guru = $this->guruModel->findAll();
        $data = [
            'title' => 'Data Guru',
            'guru' => $guru
        ];

        return view('guru/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Guru',
            'guru' => $this->guruModel->getGuru($id)
        ];

        //jika guru tidak ada di tabel
        if (empty($data['guru'])) {
            # code...
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama guru dengan id ' . $id . ' tidak ditemukan.');
        }

        return view('guru/detail_guru', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Guru',
            'validation' => \Config\Services::validation()
        ];

        return view('guru/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[tbl_guru.nama]',
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
            return redirect()->to('/guru/create')->withInput();
        }

        //ambil gambar
        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            //pindahkan foto ke folder img
            $fileFoto->move('assets/img');
            //ambil nama foto
            $namaFoto = $fileFoto->getName();
        }

        $this->guruModel->save([
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'jk' => $this->request->getVar('jk'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'avatar' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data guru berhasil ditambahkan.');

        return redirect()->to('/guru');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $guru = $this->guruModel->find($id);

        //cek jika file gambarnya default.png
        if ($guru['avatar'] != 'default.png') {
            //hapus gambar
            unlink('assets/img/' . $guru['avatar']);
        }

        $this->guruModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/guru');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Guru',
            'validation' => \Config\Services::validation(),
            'guru' => $this->guruModel->getGuru($id)
        ];

        return view('guru/edit', $data);
    }

    public function update($id)
    {
        //cek nama
        $guruLama = $this->guruModel->getGuru($this->request->getVar('id'));
        if ($guruLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[tbl_guru.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
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
            return redirect()->to('/guru/edit/' . $this->request->getVar('id'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        $defaultFoto = $guruLama['avatar'];

        //cek gambar, apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else if ($defaultFoto == 'default.png') {
            //pindahkan foto ke folder img
            $fileFoto->move('assets/img');
            //ambil nama foto
            $namaFoto = $fileFoto->getName();
        } else {
            //pindahkan foto ke folder img
            $fileFoto->move('assets/img');
            //ambil nama foto
            $namaFoto = $fileFoto->getName();
            //hapus file yang lama
            $fileLama = $this->request->getVar('fotoLama');
            unlink('assets/img/' . $fileLama);
        }


        $this->guruModel->save([
            'id_guru' => $id,
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'jk' => $this->request->getVar('jk'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'avatar' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data guru berhasil diubah.');

        return redirect()->to('/guru');
    }
}
