<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
	public function index()
	{
		$ambilGuru = $this->db->query("SELECT * FROM tbl_guru");
		$jumlahGuru = $ambilGuru->getNumRows();
		$ambilMurid = $this->db->query("SELECT * FROM tbl_murid");
		$jumlahMurid = $ambilMurid->getNumRows();
		$ambilJadwal = $this->db->query("SELECT * FROM tbl_jadwal WHERE status = 1");
		$jumlahJadwal = $ambilJadwal->getNumRows();
		$jumlahMuridLk = $this->db->query("SELECT * FROM tbl_murid WHERE jk = 'Laki-laki'")->getNumRows();
		$jumlahMuridPr = $this->db->query("SELECT * FROM tbl_murid WHERE jk = 'Perempuan'")->getNumRows();
		$jumlahGuruLk = $this->db->query("SELECT * FROM tbl_guru WHERE jk = 'Laki-laki'")->getNumRows();
		$jumlahGuruPr = $this->db->query("SELECT * FROM tbl_guru WHERE jk = 'Perempuan'")->getNumRows();

		$jumlahSenin = $this->db->query("SELECT * FROM tbl_jadwal WHERE hari = 'Senin'")->getNumRows();
		$jumlahSelasa = $this->db->query("SELECT * FROM tbl_jadwal WHERE hari = 'Selasa'")->getNumRows();
		$jumlahRabu = $this->db->query("SELECT * FROM tbl_jadwal WHERE hari = 'Rabu'")->getNumRows();
		$jumlahKamis = $this->db->query("SELECT * FROM tbl_jadwal WHERE hari = 'Kamis'")->getNumRows();
		$jumlahJumat = $this->db->query("SELECT * FROM tbl_jadwal WHERE hari = 'Jumat'")->getNumRows();
		$jumlahSabtu = $this->db->query("SELECT * FROM tbl_jadwal WHERE hari = 'Sabtu'")->getNumRows();

		$data = [
			'title' => 'Dashboard',
			'jml_guru' => $jumlahGuru,
			'jml_murid' => $jumlahMurid,
			'jml_jadwal' => $jumlahJadwal,
			'jml_murid_ikhwan' => $jumlahMuridLk,
			'jml_murid_akhwat' => $jumlahMuridPr,
			'jml_guru_ikhwan' => $jumlahGuruLk,
			'jml_guru_akhwat' => $jumlahGuruPr,
			'jml_senin' => $jumlahSenin,
			'jml_selasa' => $jumlahSelasa,
			'jml_rabu' => $jumlahRabu,
			'jml_kamis' => $jumlahKamis,
			'jml_jumat' => $jumlahJumat,
			'jml_sabtu' => $jumlahSabtu,
		];

		return view('dashboard', $data);
	}
}
