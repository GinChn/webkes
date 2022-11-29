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
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@simpan_login');

Route::get('/logout', 'LoginController@logout');

Route::group(['middleware' => 'login'], function () {
    Route::get('/', 'DashboardController@dashboard');

    Route::group(['middleware' => 'cekrole:Admin'], function () {
        Route::prefix('admin')->group(function () {
            //url: /admin/

            Route::get('profile', 'ProfileController@profile');
            //url: /admin/profile
            Route::get('edit-profile', 'ProfileController@edit_profile');
            Route::post('edit-profile', 'ProfileController@simpan_profile');

            Route::get('data-karyawan', 'KaryawanController@karyawan');

            Route::get('data-laporan', 'LaporanController@laporan');

            Route::get('registrasi', 'RegistrasiController@registrasi');
            Route::get('tambah-user', 'RegistrasiController@tambah_user');
            Route::post('tambah-user', 'RegistrasiController@simpan_user');
            Route::get('hapus-user/{nik}', 'RegistrasiController@hapus_user');

            Route::get('bmi', 'BmiController@bmi');
        });
    });

    Route::group(['middleware' => 'cekrole:User'], function () {
        Route::prefix('user')->group(function () {
            Route::get('profile', 'ProfileController@user_profile');
            Route::get('edit-profile', 'ProfileController@user_edit_profile');
            Route::post('edit-profile', 'ProfileController@user_simpan_profile');

            Route::get('data-laporan', 'LaporanController@user_laporan');
            // Route::get('input-laporan', 'LaporanController@user_inputlaporan');
            Route::post('data-laporan', 'LaporanController@user_simpanlaporan');
            Route::get('hapus-data/{id_laporan}', 'LaporanController@user_hapuslaporan');


            Route::get('bmi', 'BmiController@user_bmi');
        });
    });
});
