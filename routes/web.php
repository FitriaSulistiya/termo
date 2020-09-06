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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/detail_penyuluhan/{slug}', 'DetailPenyuluhanController@index')
    ->name('detail_penyuluhan');

Route::get('/daftar_peternak', 'DaftarPeternakController@index')
    ->name('daftar_peternak');

Route::get('/daftar_penyuluhan', 'DaftarPenyuluhanController@index')
    ->name('daftar_penyuluhan');

Route::get('/detail_peternak/{slug}', 'DetailPeternakController@index')
    ->name('detail_peternak');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');
        
        Route::resource('peternak', 'PeternakController');
        Route::resource('users', 'UsersController');
        Route::resource('penyuluhan', 'PenyuluhanController');
        Route::resource('peternak_gallery', 'PeternakGalleryController');
        Route::resource('penyuluhan_gallery', 'PenyuluhanGalleryController');
});

Route::prefix('user')
    ->middleware(['auth'])
    ->namespace('User')
    ->group(function() {
        Route::get('/profile', 'UserController@index')
            ->name('user.profile');
});

Auth::routes();