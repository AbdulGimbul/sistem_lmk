<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	public $register = [
		'nik' => [
			'rules' => 'required|min_length[16]|max_length[16]',
		],
		'nama' => [
			'rules' => 'required|min_length[1]',
		],
		'alamat' => [
			'rules' => 'required|min_length[5]',
		],
		'username' => [
			'rules' => 'required|min_length[4]',
		],
		'password' => [
			'rules' => 'required',
		],
		'repeatPassword' => [
			'rules' => 'required|matches[password]'
		],
	];

	public $register_errors = [
		'nik' => [
			'required' => '{field} harus diisi',
			'min_length' => '{field} harus terdiri dari 16 angka',
			'max_length' => '{field} harus terdiri dari 16 angka'
		],
		'nama' => [
			'required' => '{field} harus diisi',
			'min_length' => '{field} minimal 1 karakter'
		],
		'alamat' => [
			'required' => '{field} harus diisi',
			'min_length' => '{field} minimal 5 karakter'
		],
		'username' => [
			'required' => '{field} harus diisi',
			'min_length' => '{field} minimal 4 karakter'
		],
		'password' => [
			'required' => '{field} harus diisi'
		],
		'repeatPassword' => [
			'required' => '{field} harus diisi',
			'matches' => '{field} tidak match dengan password'
		]
	];

	public $login = [
		'username' => [
			'rules' => 'required',
		],
		'password' => [
			'rules' => 'required',
		]
	];

	public $login_errors = [
		'username' => [
			'required' => '{field} harus diisi',
		],
		'password' => [
			'required' => '{field} harus diisi'
		]
	];

	//--------------------------------------------------------------------
}
