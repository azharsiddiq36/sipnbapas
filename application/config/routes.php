<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['dashboard_admin'] = 'Welcome/dashboard_admin';
$route['dashboard'] = 'Welcome/dashboard';
//pegawai
$route['daftar_pegawai'] = 'PegawaiController/index';
$route['tambah_pegawai'] = 'PegawaiController/add_pegawai';
$route['add_pegawai']= 'PegawaiController/post';
//napi
$route['tambah_narapidana'] = 'NapiController/add_napi';
$route['add_napi'] = 'NapiController/post';
$route['daftar_narapidana'] = 'NapiController/index';

//penjamin
$route['daftar_penjamin'] = 'PenjaminController/index';
$route['daftar_pengajuan_penjamin'] = 'PenjaminController/index';

$route['tambah_penjamin'] = 'PenjaminController/post';
//pengguna
$route['daftar_pengguna'] = 'PenggunaController/index';
$route['add_pengguna'] = 'PenggunaController/add_pengguna';

//bimbingan
$route['bimbinganpost'] = 'BimbinganController/post';
$route['pengantar_surat'] = 'Welcome/suratpengantar';
$route['daftar_bimbingan'] = 'BimbinganController/index';
$route['jadwal_bimbingan'] = 'BimbinganController/jadwal';
$route['cetak_pengantar'] = 'BimbinganController/cetakpengantar';
$route['bimbingan'] = 'BimbinganController/listbimbingan';
$route['persetujuan_penjamin'] = 'BimbinganController/persetujuanbimbingan';
$route['bukti_laporan'] = 'BimbinganController/bukti_laporan';
$route['tambah_bimbingan'] = "BimbinganController/tambah";
//pengguna
$route['post_pengguna'] = 'PenggunaController/post';
$route['login'] = 'AuthController/loginAction';
$route['profile'] = 'AuthController/profile';
$route['ubah_password'] = 'AuthController/ubah_password';
$route['iseng'] = 'Welcome/test';
$route['logout'] = 'Welcome/logout';
$route['welcome'] = 'Welcome/index';


//ajax
$route['ajx_pengantar'] = 'BimbinganController/ajx_surat';
$route['riwayatbimbingan'] = 'BimbinganController/riwayat';
$route['ajx_detail_napi'] = 'NapiController/detailNapiAjx';

$route['translate_uri_dashes'] = FALSE;