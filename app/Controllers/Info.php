<?php



namespace App\Controllers;



use App\Models\InfoModel;



class Info extends BaseController

{

    /**

     * Instance of the main Request object.

     *

     * @var HTTP\IncomingRequest

     */

    protected $request;



    public function __construct()

    {

        $this->infoModel = new InfoModel();
    }



    public function index()

    {

        $info = $this->infoModel->findAll();

        $data = [

            'title' => 'Program LMK',

            'info' => $info

        ];



        return view('info/index', $data);
    }



    public function detail()

    {
    }



    public function create()

    {

        $data = [

            'title' => 'Tambahkan Data Info',

            'validation' => \Config\Services::validation()

        ];



        return view('info/create', $data);
    }



    public function save()

    {
        if (!$this->validate([

            'judul' => [

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

            return redirect()->to('/info/create')->withInput();
        }

        //ambil gambar

        $fileFoto = $this->request->getFile('foto');



        if ($fileFoto->getError() == 4) {

            $namaFoto = base_url('/assets/img/default.png');

            $simpanPath = $namaFoto;
        } else {

            //pindahkan foto ke folder img

            $fileFoto->move('assets/img');

            //ambil nama foto

            $namaFoto = $fileFoto->getName();



            $simpanPath = base_url('/assets/img/' . $namaFoto);
        }



        $this->infoModel->save([

            'judul' => $this->request->getVar('judul'),

            'deskripsi' => $this->request->getVar('deskripsi'),

            'gambar' => $simpanPath,

            'type' => $this->request->getVar('type'),

        ]);



        session()->setFlashdata('pesan', 'Informasi LMK berhasil ditambahkan.');



        return redirect()->to('/info');
    }



    public function delete($id)

    {



        $this->infoModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/info');
    }



    public function edit($id)

    {

        $data = [

            'title' => 'Ubah Data Informasi',

            'validation' => \Config\Services::validation(),

            'info' => $this->infoModel->getInfo($id)

        ];



        return view('info/edit', $data);
    }



    public function update($id)

    {

        //cek nama

        $infoLama = $this->infoModel->getInfo($this->request->getVar('id_info'));



        $fileFoto = $this->request->getFile('foto');

        $defaultFoto = $infoLama['gambar'];



        //cek gambar, apakah tetap gambar lama

        if ($fileFoto->getError() == 4) {

            $namaFoto = $this->request->getVar('fotoLama');

            $simpanPath = $namaFoto;
        } else if ($defaultFoto == base_url('/assets/img/default.png')) {

            //pindahkan foto ke folder img

            $fileFoto->move('assets/img');

            //ambil nama foto

            $namaFoto = $fileFoto->getName();

            $simpanPath = base_url('/assets/img/' . $namaFoto);
        } else {

            //pindahkan foto ke folder img

            $fileFoto->move('assets/img');

            //ambil nama foto

            $namaFoto = $fileFoto->getName();

            $simpanPath = base_url('/assets/img/' . $namaFoto);

            //hapus file yang lama

            $fileLama = $this->request->getVar('fotoLama');

            // unlink($fileLama);
        }





        $this->infoModel->save([

            'id_info' => $id,

            'judul' => $this->request->getVar('judul'),

            'deskripsi' => $this->request->getVar('deskripsi'),

            'gambar' => $simpanPath,

            'type' => $this->request->getVar('type')

        ]);



        session()->setFlashdata('pesan', 'Data informasi berhasil diubah.');



        return redirect()->to('/info');
    }
}
