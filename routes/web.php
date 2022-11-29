<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JamuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/', [PostinganController::class, 'tampil']);
// Route::get('/', [BarangController::class, 'tampil']);

Auth::routes();

// create data pdda halaman rekomendasi
Route::resource('jamu', JamuController::class);


Route::middleware(['auth', 'admin'])->group(function () {

    // crud user
    Route::resource('user', UserController::class);
    Route::get('delus/{user}', [UserController::class, 'destroy']);
});


Route::middleware(['auth'])->group(function () {


    // crud user
    Route::resource('user', UserController::class);
    Route::get('delus/{user}', [UserController::class, 'destroy']);

    // crud kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('delkat/{kategori}', [KategoriController::class, 'destroy']);

    // crud postingan
    Route::resource('postingan', PostinganController::class);
    Route::get('delpos/{postingan}', [PostinganController::class, 'destroy']);

    // crud barang
    Route::resource('barang', BarangController::class);
    Route::get('delbar/{barang}', [BarangController::class, 'destroy']);
});






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
