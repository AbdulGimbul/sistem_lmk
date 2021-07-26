<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Test Login OK'
		];
		return view('welcome_message', $data);
	}
}
