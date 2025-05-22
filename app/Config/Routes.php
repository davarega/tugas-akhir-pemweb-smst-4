<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index', ['filter' => 'isLogin']);
// tambah halaman untuk public yang tidak memerlukan autentikasi disini

$routes->get('login', 'Auth::index', ['filter' => 'isLogin']);
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'User::index');
	$routes->get('pegawai', 'User::pegawai');
	$routes->get('jadwal', 'User::jadwal');
	$routes->get('cuti', 'User::cuti');
	// tambah halaman untuk pegawai disini
});

$routes->get('admin', 'Admin::index', ['filter' => 'auth', 'filter' => 'admin']);
$routes->group('admin', ['filter' => 'auth', 'filter' => 'admin'], function ($routes) {
	$routes->get('dashboard', 'Admin::index');
	// tambah halaman untuk admin disini
	$routes->get('pegawai', 'Pegawai::index');
	$routes->get('pegawai/(:num)', 'Pegawai::show/$1');
	$routes->get('pegawai/create', 'Pegawai::create');
	$routes->post('pegawai/store', 'Pegawai::store');
	$routes->get('pegawai/edit/(:num)', 'Pegawai::edit/$1');
	$routes->post('pegawai/update/(:num)', 'Pegawai::update/$1');
	$routes->get('pegawai/delete/(:num)', 'Pegawai::delete/$1');

	$routes->get('jabatan', 'Jabatan::index');
	$routes->get('jabatan/(:num)', 'Jabatan::show/$1');
	$routes->get('jabatan/create', 'Jabatan::create');
	$routes->post('jabatan/edit/(:num)', 'Jabatan::edit/$1');
	$routes->get('jabatan/delete/(:num)', 'Jabatan::delete/$1');

	$routes->get('cuti', 'Cuti::index');
	$routes->get('cuti/(:num)', 'Cuti::show/$1');
	$routes->get('cuti/create', 'Cuti::create');
	$routes->post('cuti/edit/(:num)', 'Cuti::edit/$1');
	$routes->get('cuti/delete/(:num)', 'Cuti::delete/$1');
	$routes->get('cuti/approve/(:num)', 'Cuti::approve/$1');
	$routes->get('cuti/reject/(:num)', 'Cuti::reject/$1');
});
