<?php

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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('/')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/service', 'HomeController@service')->name('service');
    Route::get('/about_us', 'HomeController@about_us')->name('about_us');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/faq', 'HomeController@faq')->name('faq');
    Route::get('/promotion', 'HomeController@promotion')->name('promotion');
    
});

Route::get('sendemail', 'MailController@sendemail')->name('sendemail');

Route::prefix('/biodata')->group(function () {
    Route::get('/user_index', 'BiodataController@user_index')->name('biodata_user_index');
    Route::post('/user_edit', 'BiodataController@user_edit')->name('biodata_user_edit');
    
    Route::get('/restoran_index', 'BiodataController@restoran_index')->name('biodata_restoran_index');
    Route::post('/restoran_edit', 'BiodataController@restoran_edit')->name('biodata_restoran_edit');
    
});

Route::prefix('/manajemen_tempat_duduk')->group(function () {
    Route::get('/index', 'KursiController@index')->name('kursi_index');
    Route::post('/denah_edit', 'KursiController@denah_edit')->name('kursi_denah_edit');

    Route::post('/kursi_tambah', 'KursiController@kursi_tambah')->name('kursi_tambah');
    Route::get('/kursi_hapus/{id}', 'KursiController@kursi_hapus')->name('kursi_hapus');
    Route::post('/kursi_edit', 'KursiController@kursi_edit')->name('kursi_edit');
    Route::get('/kursi_find/{id}', 'KursiController@kursi_find')->name('kursi_find');
    Route::get('/kursi_verfikasi', 'KursiController@kursi_verifikasi')->name('kursi_verifikasi');
});

Route::prefix('/booking')->group(function () {
    Route::get('/index', 'BookingController@index')->name('booking_index');
    
    Route::get('/restoran/single_restoran/{restoranid}', 'BookingController@single_restoran')->name('single_restoran');
    Route::get('/restoran/search_restoran/', 'BookingController@search_restoran')->name('search_restoran');

    Route::get('/booking/{id}', 'BookingController@booking')->name('booking');
    Route::get('/booking/cari_kursi/{id}', 'BookingController@index')->name('booking_temp');
    Route::get('/booking/cari_kursi/{id}/{tanggal}/{dari}/{hingga}', 'BookingController@booking_cari_kursi')->name('booking_cari_kursi');
    Route::post('/booking/tambah', 'BookingController@booking_tambah')->name('booking_tambah');

    Route::get('/booking/batal/{id}', 'BookingController@booking_batal')->name('booking_batal');

    Route::get('/booking_history/', 'BookingController@booking_history')->name('booking_history');

    
});

Route::prefix('/manajemenbooking')->group(function () {
    Route::get('/index', 'ManajemenBookingController@index')->name('manajemen_booking_index');
    Route::post('/verifikasi', 'ManajemenBookingController@verifikasi')->name('manajemen_booking_verifikasi');
    Route::get('/batal/{id}', 'ManajemenBookingController@batal')->name('manajemen_booking_batal');
    
});

Route::prefix('/admin')->group(function () {
    Route::get('/verifikasi_restoran', 'AdminController@verifikasi_restoran')->name('admin_verifikasi_restoran');
    Route::get('/verifikasi_restoran_do/{id}', 'AdminController@verifikasi_restoran_do')->name('admin_verifikasi_restoran_do');

    Route::get('/verifikasi_topup', 'AdminController@verifikasi_topup')->name('admin_verifikasi_topup');
    Route::post('/verifikasi_topup_do', 'AdminController@verifikasi_topup_do')->name('admin_verifikasi_topup_do');
    
});

Route::prefix('/topup')->group(function () {
    Route::get('/index', 'TopupController@index')->name('topup_index');
    Route::post('/tambah', 'TopupController@tambah_topup')->name('topup_tambah');
});
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Auth::routes();
