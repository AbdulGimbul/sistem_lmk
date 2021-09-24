<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'admin' => \App\Filters\Admin::class,
		'user' => \App\Filters\User::class,
		'jwtauth' => \App\Filters\JwtFilter::class,
		'cors' => \App\Filters\Cors::class
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			// 'csrf',
			'admin' => ['except' => ['auth/*', 'authapi/*', 'guruapi', 'guruapi/*', 'muridapi/*', 'userapi/*']],
			'user' => ['except' => ['auth/*', 'authapi/*', 'guruapi', 'guruapi/*', 'muridapi/*', 'userapi/*']],
			'cors'
		],
		'after'  => [
			'user' => [
				'except' => [
					'home/*',
					'guru', 'guru/detail/$arguments',
					'murid',
					'daftar', 'daftar/*'
				]
			],
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
