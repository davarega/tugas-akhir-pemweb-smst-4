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
	$routes->get('/', 'Dashboard::user');
	$routes->get('pegawai', 'User::pegawai');
	$routes->get('jadwal', 'User::jadwal');

	$routes->get('cuti', 'Cuti::u_index');
	$routes->get('cuti/(:num)', 'Cuti::u_show/$1');
	$routes->get('cuti/create', 'Cuti::u_create');
	$routes->post('cuti/store', 'Cuti::u_store');
	$routes->get('cuti/edit/(:num)', 'Cuti::u_edit/$1');
	$routes->post('cuti/update/(:num)', 'Cuti::u_update/$1');
	$routes->post('cuti/delete/(:num)', 'Cuti::u_delete/$1');
	// tambah halaman untuk pegawai disini
});

$routes->get('admin', 'Dashboard::admin', ['filter' => 'auth', 'filter' => 'admin']);
$routes->group('admin', ['filter' => 'auth', 'filter' => 'admin'], function ($routes) {
	$routes->get('dashboard', 'Dashboard::admin');
	// tambah halaman untuk admin disini
	$routes->get('pegawai', 'Pegawai::index');
	$routes->get('pegawai/(:num)', 'Pegawai::show/$1');
	$routes->get('pegawai/create', 'Pegawai::create');
	$routes->post('pegawai/store', 'Pegawai::store');
	$routes->get('pegawai/edit/(:num)', 'Pegawai::edit/$1');
	$routes->post('pegawai/update/(:num)', 'Pegawai::update/$1');
	$routes->post('pegawai/delete/(:num)', 'Pegawai::delete/$1');

	$routes->get('jabatan', 'Jabatan::index');
	$routes->get('jabatan/(:num)', 'Jabatan::show/$1');
	$routes->get('jabatan/create', 'Jabatan::create');
	$routes->post('jabatan/store', 'Jabatan::store');
	$routes->get('jabatan/edit/(:num)', 'Jabatan::edit/$1');
	$routes->post('jabatan/update/(:num)', 'Jabatan::update/$1');
	$routes->post('jabatan/delete/(:num)', 'Jabatan::delete/$1');

	$routes->get('cuti', 'Cuti::a_index');
	// $routes->get('cuti/(:num)', 'Cuti::a_show/$1');
	$routes->post('cuti/approve/(:num)', 'Cuti::a_approve/$1');
	$routes->post('cuti/reject/(:num)', 'Cuti::a_reject/$1');
});
