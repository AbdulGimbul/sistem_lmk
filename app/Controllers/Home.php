<?php

namespace App\Controllers;

class Home extends BaseController
{
	protected $db;
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

		$data = [
			'title' => 'Dashboard',
			'jml_guru' => $jumlahGuru,
			'jml_murid' => $jumlahMurid
		];

		return view('dashboard', $data);
	}
}
