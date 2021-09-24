<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\MuridModel;

class Murid extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $muridModel;
    protected $jadwalModel;
    public function __construct()
    {
        $this->muridModel = new MuridModel();
        $this->jadwalModel = new JadwalModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_murid') ? $this->request->getVar('page_murid') : 1;

        $cari = $this->request->getVar('cari');
        if ($cari) {
            $murid = $this->muridModel->search($cari);
        } else {
            $murid = $this->muridModel;
        }

        $murid = $murid->paginate(7, 'murid');
        $pager = $this->muridModel->pager;


        $data = [
            'title' => 'Data Murid',
            'murid' => $murid,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];

        return view('murid/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Murid',
            'validation' => \Config\Services::validation()
        ];

        return view('murid/create', $data);
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
            return redirect()->to('/murid/create')->withInput();
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

        session()->setFlashdata('pesan', 'Data murid berhasil ditambahkan.');

        return redirect()->to('/murid');
    }

    public function detail($id)
    {
        $jadwal = $this->jadwalModel->getJadwal($id);

        $data = [
            'title' => 'Detail Murid',
            'murid' => $this->muridModel->getMurid($id),
            'jadwal' => $jadwal
        ];

        //jika murid tidak ada di tabel
        if (empty($data['murid'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama murid dengan id ' . $id . ' tidak ditemukan.');
        }

        return view('murid/detail_murid', $data);
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $murid = $this->muridModel->find($id);

        //cek jika file gambarnya default.png
        if ($murid['avatar'] != 'default_ikhwan.png' && $murid['avatar'] != 'default_akhwat.png') {
            //hapus gambar
            unlink('assets/img/' . $murid['avatar']);
        }

        $this->muridModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/murid');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data murid',
            'validation' => \Config\Services::validation(),
            'murid' => $this->muridModel->getMurid($id)
        ];

        return view('murid/edit', $data);
    }

    public function update($id)
    {
        //cek nama
        $muridLama = $this->muridModel->getMurid($this->request->getVar('id'));
        if ($muridLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[tbl_murid.nama]';
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
            return redirect()->to('/murid/edit/' . $this->request->getVar('id'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        $defaultFoto = $muridLama['avatar'];

        //cek gambar, apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else if ($defaultFoto == 'default_ikhwan.png' || $defaultFoto == 'default_akhwat.png') {
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


        $this->muridModel->save([
            'id_murid' => $id,
            'nama' => $this->request->getVar('nama'),
            'jk' => $this->request->getVar('jk'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'avatar' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data murid berhasil diubah.');

        return redirect()->to('/murid');
    }

    public function statusTerima($id)
    {
        $db = \Config\Database::connect();

        $builderJadwal = $db->table('tbl_jadwal');
        $builderJadwal->set('status', 1);
        $builderJadwal->where('id_jadwal', $id);
        $builderJadwal->update();

        $builderDaftar = $db->table('tbl_pendaftaran');
        $builderDaftar->set('status', 1);
        $builderDaftar->where('id_daftar', $id);
        $builderDaftar->update();

        return redirect()->to('/murid/' . $id);
    }

    public function statusTolak($id)
    {
        $db = \Config\Database::connect();

        $builderJadwal = $db->table('tbl_jadwal');
        $builderJadwal->set('status', 2);
        $builderJadwal->where('id_jadwal');
        $builderJadwal->update();

        $builderDaftar = $db->table('tbl_pendaftaran');
        $builderDaftar->set('status', 2);
        $builderDaftar->where('id_daftar', $id);
        $builderDaftar->update();

        return redirect()->to('/murid/' . $id);
    }
}
