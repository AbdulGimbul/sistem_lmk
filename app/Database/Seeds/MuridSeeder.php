<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MuridSeeder extends Seeder
{
	public function run()
	{
		for ($i = 0; $i < 100; $i++) {
			$data = [
				'nama' => static::faker()->name,
				'alamat'    => static::faker()->address,
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			];
			$this->db->table('tbl_murid')->insert($data);
		}
		// Simple Queries
		// $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

		// Using Query Builder
	}
}
