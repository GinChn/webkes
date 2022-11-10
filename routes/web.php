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

//Route::group(['middleware' => 'login'], function() {
    Route::get('/', 'AdminController@dashboard');
    Route::get('/profile', 'AdminController@profile');
    Route::get('/edit-profile', 'AdminController@edit_profile');
    Route::get('/data-karyawan', 'AdminController@karyawan');
    Route::get('/data-laporan', 'AdminController@laporan');
    Route::get('/registrasi', 'AdminController@registrasi');
    Route::get('/tambah-user', 'AdminController@tambah_user');
    Route::post('/tambah-user', 'AdminController@simpan_user');
    Route::get('/bmi', 'AdminController@bmi');
//});

// Route::get('/dashboard', 'UserController@dashboard');
// Route::get('/profile', 'UserController@profile');
// Route::get('/laporan', 'UserController@laporan');
// Route::get('/bmi', 'UserController@bmi');