<?php
defined('BASEPATH') or exit('No direct script access allowed');




$route['admin'] = 'login';
$route['adminvotting'] = 'admin/login';
$route['logout'] = 'admin/login/logout';
$route['beranda.aspx'] = 'admin/dashboard';
$route['data-polling.aspx'] = 'admin/Polling';
$route['data-flayer.aspx'] = 'admin/Flayer';
$route['data-daftar-user.aspx'] = 'admin/user';
$route['data-pengguna-user.aspx'] = 'admin/Pengguna';
$route['data-inbox.aspx'] = 'admin/Inbox';





//user
$route['kontak-send.aspx'] = 'home/send';
$route['votting.aspx'] = 'Votting';
$route['logout.aspx'] = 'login/logout';
$route['dashboard.aspx'] = 'Dashboard';
$route['dashboard1.aspx'] = 'Dashboard/exampel';
$route['profil.aspx'] = 'Pengguna';
$route['data-votting.aspx'] = 'Votting/data_votting';
$route['register-anggota.aspx'] = 'Register';
$route['login.aspx'] = 'login';
$route['default_controller'] = 'Home';
$route['index.html'] = 'Home';
$route['index.js'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;