<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/guru/create', 'Guru::create');
$routes->get('/murid/create', 'Murid::create');
$routes->delete('/guru/(:num)', 'Guru::delete/$1');
$routes->delete('/murid/(:num)', 'Murid::delete/$1');
$routes->get('/guru/edit/(:segment)', 'Guru::edit/$1');
$routes->get('/murid/edit/(:segment)', 'Murid::edit/$1');
$routes->delete('/guru/luang/(:num)', 'Guru::delete_luang/$1');
$routes->get('/guru/jadwal', 'Guru::jadwal');
$routes->get('/guru/luang', 'Guru::luang');
$routes->get('/guru/statuslihat/(:segment)', 'Guru::statusLihat/$1');
$routes->get('/guru/(:any)', 'Guru::detail/$1');
$routes->get('/murid/statusterima/(:segment)', 'Murid::statusTerima/$1');
$routes->get('/murid/statustolak/(:segment)', 'Murid::statusTolak/$1');
$routes->get('/murid/(:any)', 'Murid::detail/$1');
$routes->get('/infoapi', 'InfoApi::index');
$routes->get('/infoapi/getprogram', 'InfoApi::getProgram');
$routes->get('/infoapi/gettentang', 'InfoApi::getTentang');
$routes->get('/infoapi/(:num)', 'InfoApi::show/$1');
$routes->post('/authapi/login', 'AuthApi::login');
$routes->post('/authapi/register', 'AuthApi::register');
$routes->post('/user/updatepassword', 'User::updatePassword');
$routes->get('/jadwalapi/getjadwalguru/(:num)', 'JadwalApi::getJadwalGuru/$1');
$routes->get('/jadwalapi/getjadwaluser/(:num)', 'JadwalApi::getJadwalUser/$1');
$routes->put('/userapi/updatefoto/(:num)', 'UserApi::updateFoto/$1');
$routes->resource('authapi');
$routes->resource('userapi', ['controller' => 'UserApi']);
$routes->resource('guruapi', ['controller' => 'GuruApi']);
$routes->resource('muridapi', ['controller' => 'MuridApi']);
$routes->resource('jadwalapi', ['controller' => 'JadwalApi']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
