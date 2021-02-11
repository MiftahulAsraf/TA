<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return redirect('login');
});

Route::get('/dashboard','DashboardController@index')->name('home');
Route::get('/contact','DashboardController@contact');
Route::get('/chat','DashboardController@chat');



Route::get('/user', 'UserController@index');
Route::get('/user/{id_users}/edit', 'UserController@edit');
Route::post('/user/{id_users}/update','UserController@update');
Route::get('/user/{id_users}/delete','UserController@delete');

Route::get('/pasien', 'PasienController@index');
Route::post('/pasien/create', 'PasienController@create');
Route::post('/register', 'PasienController@register');
Route::get('/akun', 'PasienController@akun');
Route::get('/pasien/{id_pasien}/edit','PasienController@edit');    
Route::post('/pasien/{id_pasien}/update','PasienController@update');
Route::get('/pasien/{id_pasien}/delete','PasienController@delete');

Route::get('/penyakit', 'PenyakitController@index');
Route::post('/penyakit/create', 'PenyakitController@create');
Route::get('/penyakit/{id_penyakit}/edit', 'PenyakitController@edit');
Route::post('/penyakit/{id_penyakit}/update','PenyakitController@update');
Route::get('/penyakit/{id_penyakit}/delete','PenyakitController@delete');

Route::get('/obat', 'ObatController@index');
Route::post('/obat/create', 'ObatController@create');
Route::get('/obat/{id_obat}/edit', 'ObatController@edit');
Route::post('/obat/{id_obat}/update','ObatController@update');
Route::get('/obat/{id_obat}/delete','ObatController@delete');

Route::get('/layanan', 'LayananController@index');
Route::post('/layanan/create', 'LayananController@create');
Route::get('/layanan/{id_layanan}/edit', 'LayananController@edit');
Route::post('/layanan/{id_layanan}/update','LayananController@update');
Route::get('/layanan/{id_layanan}/delete','LayananController@delete');

Route::get('/layanantambahan', 'LayananTambahanController@index');
Route::post('/layanantambahan/create', 'LayananTambahanController@create');
Route::get('/layanantambahan/{id_layanantambahan}/edit', 'LayananTambahanController@edit');
Route::post('/layanantambahan/{id_layanantambahan}/update','LayananTambahanController@update');
Route::get('/layanantambahan/{id_layanantambahan}/delete','LayananTambahanController@delete');

Route::get('/waktu', 'WaktuController@index');
Route::post('/waktu/create', 'WaktuController@create');
Route::get('/waktu/{id_waktu}/edit', 'WaktuController@edit');
Route::post('/waktu/{id_waktu}/update','WaktuController@update');
Route::get('/waktu/{id_waktu}/delete','WaktuController@delete');

Route::get('/reservasi','ReservasiController@index');
Route::get('/riwayatreservasi','ReservasiController@riwayat');
Route::post('/reservasi/create', 'ReservasiController@create');
Route::get('/pendaftaran','ReservasiController@pendaftaran');
Route::post('/pendaftaran/create', 'ReservasiController@daftarcreate');
Route::get('/jadwal','ReservasiController@jadwal');


Route::get('/konfirmasi','ReservasiController@index2');
Route::get('/konfirmasi/{id_reservasi}/edit', 'ReservasiController@edit');
Route::post('/konfirmasi/{id_reservasi}/update','ReservasiController@update');
Route::get('/konfirmasi/{id_reservasi}/delete','ReservasiController@delete');

Route::get('/riwayat/{id_reservasi}/delete','ReservasiController@deleteres');
Route::get('/riwayat/{id_reservasi}/edit', 'ReservasiController@editres');
Route::post('/riwayat/{id_reservasi}/update','ReservasiController@updateres');

Route::get('/akun/{id_pasien}/edit', 'PasienController@akunedit');
Route::post('/akun/{id_pasien}/update','PasienController@akunupdate');




Route::get('/rekammedis','RekamController@index');
Route::get('/transaksi','RekamController@index2');
Route::get('/rekammedis/{id_pasien}/rekampribadi','RekamController@rekampribadi');
Route::get('/transaksi/{id_pemeriksaan}/invoice','RekamController@invoice');

Route::get('/riwayattransaksi','RekamController@riwayat');
Route::get('/riwayatrekam','RekamController@riwayatrekam');
Route::get('/laporan','RekamController@laporan');
Route::get('/laporan/cetaklaporan','RekamController@cetaklaporan');


Route::post('/rekammedis/{id_pasien}/create', 'RekamController@create');
Route::get('/Rekammedis/{id_pemeriksaan}/edit', 'RekamController@edit');
Route::post('/Rekammedis/{id_pemeriksaan}/update','RekamController@update');
Route::get('/Rekammedis/{id_pemeriksaan}/delete','RekamController@delete');

Route::get('/konsultasi','KonsultasiController@index');
Route::get('/konsultasi/chat-history','KonsultasiController@all_chat');
Route::post('/konsultasi/send-chat/{receiverId}','KonsultasiController@send_chat');