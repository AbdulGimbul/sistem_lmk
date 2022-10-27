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

        $this->db = \Config\Database::connect();
    }



    public function index($idUser = "")

    {

        $data = [

            'title' => 'Form Pendaftaran',

            'guru' => $this->guruModel->orderBy('hasil_pm', 'DESC')->findAll(),

            'user' => $this->userModel->findAll(),

            'jadwal' => $this->jadwalModel->findAll(),

            'id_user' => $idUser,

            'validation' => \Config\Services::validation()

        ];



        return view('daftar/index', $data);
    }



    public function save()

    {

        $ambilUser = $this->request->getVar('user_ortu');

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
        $simpanPath = base_url('/assets/img/' . $namaFoto);

        $namaMurid = $this->request->getVar('nama');



        $date = date('Ymd');



        $query = $this->db->query("SELECT max(id_daftar) as id_daftar from tbl_pendaftaran WHERE id_daftar LIKE '$date%' ")->getResult();

        $data = $query;

        foreach ($data as $dt) {

            $dt2['id_daftar'] = $dt->id_daftar;
        }

        $ambil = $dt2['id_daftar'];

        $no = substr($ambil, 8, 3);

        $urut = $no + 1;

        $id_daftar = $date . sprintf("%03s", $urut);


        $this->muridModel->save([

            // 'id_daftar' => $id_daftar,

            'id_user' => $ambilUser,

            'nama' => $namaMurid,

            'jk' => $this->request->getVar('jk'),

            'tempat_lahir' => $this->request->getVar('tempat_lahir'),

            'tgl_lahir' => $this->request->getVar('tgl_lahir'),

            'alamat' => $this->request->getVar('alamat'),

            'asal_sekolah' => $this->request->getVar('asal_sekolah'),

            'kelas' => $this->request->getVar('kelas'),

            'avatar' => $simpanPath

        ]);



        $lastInsertMurid = $this->muridModel->getInsertID();



        $saveDaftar = [

            'id_daftar' => $id_daftar,

            'id_murid' => $lastInsertMurid

        ];



        $this->daftarModel->save($saveDaftar);



        $idUser = $this->muridModel->where(['id_user' => $ambilUser, 'nama' => $namaMurid])->first();



        $dateIdJadwal = date('ymd');



        $queryJadwal = $this->db->query("SELECT max(id_jadwal) as id_jadwal from tbl_jadwal WHERE id_jadwal LIKE '$dateIdJadwal%' ")->getResult();

        $dataJadwal = $queryJadwal;

        foreach ($dataJadwal as $dtJ) {

            $dtJ2['id_jadwal'] = $dtJ->id_jadwal;
        }

        $ambilJadwal = $dtJ2['id_jadwal'];

        $noJ = substr($ambilJadwal, 6, 3);

        $urutJ = $noJ + 1;

        $id_jadwal = $dateIdJadwal . sprintf("%03s", $urutJ);

        $harisave = unserialize($_POST["harisave"]);
        $jamsave = unserialize($_POST["jamsave"]);

        $dataJadwal = [

            'hari' => $harisave,

            'jam' => $jamsave

        ];


        $dataset = [];

        for ($i = 0; $i < (sizeof($dataJadwal['hari'])); $i++) {

            # code...

            $jadwalCek = $id_jadwal++;

            $dataset[] = [

                'id_jadwal' => $jadwalCek,

                'id_murid' => $idUser['id_murid'],

                'id_guru' => $this->request->getVar('id_guru'),

                'hari' => $dataJadwal['hari'][$i],

                'jam' => $dataJadwal['jam'][$i],

                'status' => 0,

                'is_read' => 0

            ];
        }

        $this->db->table('tbl_jadwal')->insertBatch($dataset);


        session()->setFlashdata('pesan', 'Data murid baru berhasil didaftarkan.');

        return redirect()->to('/daftar/successlanding');
    }

    public function daftarByAdmin()
    {

        $data = [

            'title' => 'Form Pendaftaran',

            'guru' => $this->guruModel->orderBy('hasil_pm', 'DESC')->findAll(),

            'user' => $this->userModel->findAll(),

            'jadwal' => $this->jadwalModel->findAll(),

            'validation' => \Config\Services::validation()

        ];



        return view('daftar/index_admin', $data);
    }


    public function saveByAdmin()
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

            return redirect()->to('/daftar/index_admin')->withInput();
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

        $simpanPath = base_url('/assets/img/' . $namaFoto);


        $ambilUser = $this->request->getVar('user_ortu');

        $namaMurid = $this->request->getVar('nama');



        $date = date('Ymd');



        $query = $this->db->query("SELECT max(id_daftar) as id_daftar from tbl_pendaftaran WHERE id_daftar LIKE '$date%' ")->getResult();

        $data = $query;

        foreach ($data as $dt) {

            $dt2['id_daftar'] = $dt->id_daftar;
        }

        $ambil = $dt2['id_daftar'];

        $no = substr($ambil, 8, 3);

        $urut = $no + 1;

        $id_daftar = $date . sprintf("%03s", $urut);


        $this->muridModel->save([

            'id_user' => $ambilUser,

            'nama' => $namaMurid,

            'jk' => $this->request->getVar('jk'),

            'tempat_lahir' => $this->request->getVar('tempat_lahir'),

            'tgl_lahir' => $this->request->getVar('tgl_lahir'),

            'alamat' => $this->request->getVar('alamat'),

            'asal_sekolah' => $this->request->getVar('asal_sekolah'),

            'kelas' => $this->request->getVar('kelas'),

            'avatar' => $simpanPath

        ]);



        $lastInsertMurid = $this->muridModel->getInsertID();



        $saveDaftar = [

            'id_daftar' => $id_daftar,

            'id_murid' => $lastInsertMurid

        ];



        $this->daftarModel->save($saveDaftar);



        $idUser = $this->muridModel->where(['id_user' => $ambilUser, 'nama' => $namaMurid])->first();



        $dateIdJadwal = date('ymd');



        $queryJadwal = $this->db->query("SELECT max(id_jadwal) as id_jadwal from tbl_jadwal WHERE id_jadwal LIKE '$dateIdJadwal%' ")->getResult();

        $dataJadwal = $queryJadwal;

        foreach ($dataJadwal as $dtJ) {

            $dtJ2['id_jadwal'] = $dtJ->id_jadwal;
        }

        $ambilJadwal = $dtJ2['id_jadwal'];

        $noJ = substr($ambilJadwal, 6, 3);

        $urutJ = $noJ + 1;

        $id_jadwal = $dateIdJadwal . sprintf("%03s", $urutJ);

        $harisave = unserialize($_POST["harisave"]);
        $jamsave = unserialize($_POST["jamsave"]);

        $dataJadwal = [

            'hari' => $harisave,

            'jam' => $jamsave

        ];


        $dataset = [];

        for ($i = 0; $i < (sizeof($dataJadwal['hari'])); $i++) {

            # code...

            $jadwalCek = $id_jadwal++;

            $dataset[] = [

                'id_jadwal' => $jadwalCek,

                'id_murid' => $idUser['id_murid'],

                'id_guru' => $this->request->getVar('id_guru'),

                'hari' => $dataJadwal['hari'][$i],

                'jam' => $dataJadwal['jam'][$i],

                'status' => 1,

                'is_read' => 0

            ];
        }



        $this->db->table('tbl_jadwal')->insertBatch($dataset);


        session()->setFlashdata('pesan', 'Data murid baru berhasil didaftarkan.');


        return redirect()->to('/murid');
    }

    public function ambilData()
    {

        $ambilUser = $this->request->getVar('user_ortu');

        if (!$this->validate([

            'nama' => [

                'rules' => 'required|is_unique[tbl_murid.nama]',

                'errors' => [

                    'required' => '{field} tidak boleh kosong',

                    'is_unique' => '{field} sudah terdaftar'

                ]

            ],

        ])) {

            return redirect()->to('/daftar/index/' . $ambilUser)->withInput();
        }

        $dataJadwal = [

            'hari' => $this->request->getVar('hari'),

            'jam' => $this->request->getVar('jam')

        ];


        $dataset = [];

        for ($i = 0; $i < (sizeof($dataJadwal['hari'])); $i++) {

            # code...

            $dataset[] = [

                'hari' => $dataJadwal['hari'][$i],

                'jam' => $dataJadwal['jam'][$i],

            ];
        }

        $this->algoritma();

        $data = [

            'title' => 'Form Pendaftaran',

            'guru' => $this->guruModel->orderBy('hasil_pm', 'DESC')->findAll(),

            'user' => $this->userModel->findAll(),

            'jadwal' => $this->jadwalModel->findAll(),

            'validation' => \Config\Services::validation()

        ];

        return view('/daftar/pilih_guru', $data);
    }

    public function ambilDataByAdmin()
    {

        if (!$this->validate([

            'nama' => [

                'rules' => 'required|is_unique[tbl_murid.nama]',

                'errors' => [

                    'required' => '{field} tidak boleh kosong',

                    'is_unique' => '{field} sudah terdaftar'

                ]

            ],

        ])) {

            return redirect()->to('/daftar/index/')->withInput();
        }

        $dataJadwal = [

            'hari' => $this->request->getVar('hari'),

            'jam' => $this->request->getVar('jam')

        ];


        $dataset = [];

        for ($i = 0; $i < (sizeof($dataJadwal['hari'])); $i++) {

            # code...

            $dataset[] = [

                'hari' => $dataJadwal['hari'][$i],

                'jam' => $dataJadwal['jam'][$i],

            ];
        }

        $this->algoritma();

        $data = [

            'title' => 'Form Pendaftaran',

            'guru' => $this->guruModel->orderBy('hasil_pm', 'DESC')->findAll(),

            'user' => $this->userModel->findAll(),

            'jadwal' => $this->jadwalModel->findAll(),

            'validation' => \Config\Services::validation()

        ];

        return view('/daftar/pilih_guru_admin', $data);
    }

    public function algoritma()
    {
        //bobot jumlah murid, nilai profil kriteria = 3
        $pJmlMurid = 3;
        //bobot jumlah jam, nilai profil kriteria = 3
        $pJmlJam = 3;
        //bobot jumlah hari, nilai  profil kriteria = 3
        $pJmlHari = 3;

        //ngambil jumlah murid tiap guru, kemudian katergorikan
        $guru = $this->guruModel->findAll();
        foreach ($guru as $g) {
            $totalMurid = 0;
            $muridGuru = $this->db->query("SELECT DISTINCT id_murid FROM tbl_jadwal WHERE id_guru = '" . $g['id_guru'] . "'")->getResultArray();
            foreach ($muridGuru as $m) {
                $totalMurid++;
            }
            if ($totalMurid <= 2) {
                $jmlMurid = "Sedikit";
            } else if ($totalMurid > 2 && $totalMurid < 6) {
                $jmlMurid = "Sedang";
            } else {
                $jmlMurid = "Banyak";
            }

            //ngambil jumlah jam tiap guru, kemudian katergorikan
            $totalJam = 0;
            $jamGuru = $this->db->query("SELECT jam FROM tbl_jadwal WHERE id_guru = '" . $g['id_guru'] . "'")->getResultArray();
            foreach ($jamGuru as $j) {
                $totalJam++;
            }
            if ($totalJam <= 2) {
                $jmlJam = "Sedikit";
            } else if ($totalJam > 2 && $totalJam < 7) {
                $jmlJam = "Sedang";
            } else {
                $jmlJam = "Banyak";
            }

            //ngambil jumlah hari tiap guru, kemudian katergorikan
            $totalHari = 0;
            $hariGuru = $this->db->query("SELECT DISTINCT hari FROM tbl_jadwal WHERE id_guru = '" . $g['id_guru'] . "'")->getResultArray();
            foreach ($hariGuru as $h) {
                $totalHari++;
            }
            if ($totalHari <= 2) {
                $jmlHari = "Sedikit";
            } else if ($totalHari > 2 && $totalHari < 6) {
                $jmlHari = "Sedang";
            } else {
                $jmlHari = "Banyak";
            }

            //normalisasi, sedikit = 3, sedang = 2, banyak = 1
            if ($jmlMurid == "Sedikit") {
                $nMurid = 3;
            } elseif ($jmlMurid == "Sedang") {
                $nMurid = 2;
            } elseif ($jmlMurid == "Banyak") {
                $nMurid = 1;
            }

            if ($jmlJam == "Sedikit") {
                $nJam = 3;
            } elseif ($jmlJam == "Sedang") {
                $nJam = 2;
            } elseif ($jmlJam == "Banyak") {
                $nJam = 1;
            }

            if ($jmlHari == "Sedikit") {
                $nHari = 3;
            } elseif ($jmlHari == "Sedang") {
                $nHari = 2;
            } elseif ($jmlHari == "Banyak") {
                $nHari = 1;
            }

            //menghitung nilai gap = profil alternarif - profil kriteria
            $nGapMurid = $nMurid - $pJmlMurid;
            $nGapJam = $nJam - $pJmlJam;
            $nGapHari = $nHari - $pJmlHari;

            //mapping nilai gap ke tabel analsis gap
            $analisisGap = [
                [
                    'gap' => 0,
                    'bobot' => 5,
                    'ket' => 'Kompetensi sesuai kebutuhan'
                ],
                [
                    'gap' => 1,
                    'bobot' => 4.5,
                    'ket' => 'Kompetensi kelebihan satu tingkat'
                ],
                [
                    'gap' => -1,
                    'bobot' => 4,
                    'ket' => 'Kompetensi kekurangan 1 tingkat'
                ],
                [
                    'gap' => 2,
                    'bobot' => 3.5,
                    'ket' => 'Kompetensi kelebihan 2 tingkat'
                ],
                [
                    'gap' => -2,
                    'bobot' => 3,
                    'ket' => 'Kompetensi kekurangan 2 tingkat'
                ],
                [
                    'gap' => 3,
                    'bobot' => 2.5,
                    'ket' => 'Kompetensi kelebihan 3 tingkat'
                ],
                [
                    'gap' => -3,
                    'bobot' => 2,
                    'ket' => 'Kompetensi kekurangan 3 tingkat'
                ],
                [
                    'gap' => 4,
                    'bobot' => 1.5,
                    'ket' => 'Kompetensi kelebihan 4 tingkat'
                ],
                [
                    'gap' => -4,
                    'bobot' => 1,
                    'ket' => 'Kompetensi kekurangan 4 tingkat'
                ]
            ];
            foreach ($analisisGap as $ag) {
                if ($ag['gap'] == $nGapMurid) {
                    $nMappingMurid = $ag['bobot'];
                }
                if ($ag['gap'] == $nGapJam) {
                    $nMappingJam = $ag['bobot'];
                }
                if ($ag['gap'] == $nGapHari) {
                    $nMappingHari = $ag['bobot'];
                }
            }

            //Pengelompokkan Core Factor dan Secondary Factor
            //Core Factor yaitu Jumlah Murid dan Jumlah Jam
            //Secondary Factor yaitu Jumlah Hari
            //Hitung nilai rata-rata Core Factor dan Secondary Factor
            $ncf = ($nMappingMurid + $nMappingJam) / 2;
            $nsf = $nMappingHari / 1;

            //menghitung nilai akhir
            $nf[] = (0.65 * $ncf) + (0.35 * $nsf);
            $hasil_pm = $nf;
        }
        $no = 0;
        foreach ($guru as $g) {
            $data = [
                'hasil_pm' => $hasil_pm[$no]
            ];
            $this->db->table('tbl_guru')->where(['id_guru' => $g['id_guru']])->update($data);
            $no++;
        }
    }

    public function successLanding()
    {
        $data = [
            'title' => 'Landing Success'
        ];
        return view('daftar/success_landing', $data);
    }
}
