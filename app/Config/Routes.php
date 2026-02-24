<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/siswa', 'Siswa::index');
$routes->post('/siswa/simpan', 'Siswa::simpan');
$routes->get('/laporan/buat/(:num)', 'Laporan::buat/$1');
$routes->post('/laporan/simpan', 'Laporan::simpan');
$routes->get('/laporan/buat/(:num)', 'Laporan::buat/$1');
$routes->post('/laporan/simpan', 'Laporan::simpan');
$routes->get('/laporan/detail/(:num)', 'Laporan::detail/$1');
$routes->get('/laporan/cetak/(:num)', 'Laporan::cetak/$1');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/', 'Auth::index'); // Halaman awal menampilkan form login
$routes->post('auth/proses_login', 'Auth::proses_login'); // Alamat pengolah data
$routes->get('auth/logout', 'Auth::logout'); // Alamat untuk keluar
$routes->get('users', 'Users::index');
$routes->post('users/simpan', 'Users::simpan');
$routes->get('users/hapus/(:num)', 'Users::hapus/$1');
$routes->get('laporan/validasi/(:num)', 'Laporan::validasi/$1');
$routes->get('laporan/edit/(:num)', 'Laporan::edit/$1');
$routes->post('laporan/update/(:num)', 'Laporan::update/$1');
$routes->post('laporan/validasi/(:num)', 'Laporan::validasi/$1');
$routes->post('laporan/update/(:num)', 'Laporan::update/$1');
$routes->get('kelas', 'Kelas::index');
$routes->get('kelas/tambah', 'Kelas::tambah');
$routes->post('kelas/simpan', 'Kelas::simpan');
$routes->get('kelas/pilih_siswa/(:num)', 'Kelas::pilih_siswa/$1');
$routes->post('kelas/simpan_siswa_ke_kelas', 'Kelas::simpan_siswa_ke_kelas');
$routes->get('kelas/detail/(:num)', 'Kelas::detail/$1');
$routes->get('postingan', 'Postingan::index');
$routes->get('postingan/detail/(:num)', 'Postingan::detail/$1');
$routes->get('postingan/tambah', 'Postingan::tambah');
$routes->post('postingan/simpan', 'Postingan::simpan');
$routes->get('siswa/edit/(:num)', 'Siswa::edit/$1');
$routes->post('siswa/update/(:num)', 'Siswa::update/$1');
$routes->delete('siswa/hapus/(:num)', 'Siswa::hapus/$1');
$routes->get('postingan/edit/(:num)', 'Postingan::edit/$1');
$routes->post('postingan/update/(:num)', 'Postingan::update/$1');
$routes->post('postingan/hapus/(:num)', 'Postingan::hapus/$1');