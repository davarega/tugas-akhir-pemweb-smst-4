<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('about', 'Pages::about');
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
$routes->group('admin/dashboard', ['filter' => 'auth', 'filter' => 'admin'], function ($routes) {
	$routes->get('/', 'Admin::index');
	$routes->get('pegawai/(:num)', 'Pegawai::show/$1');
	// tambah halaman untuk admin disini
	$routes->get('pegawai', 'Pegawai::index');
});
