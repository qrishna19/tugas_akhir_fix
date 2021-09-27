<?php

use App\Http\Livewire\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ProyekCreate;
use App\Http\Livewire\ProyekUpdate;
use App\Http\Livewire\Proyek;
use App\Http\Livewire\Profil;
use App\Http\Livewire\Kategori;
use App\Http\Livewire\Mahasiswa;
use App\Http\Livewire\PilihAnggota;
use App\http\Livewire\RegisterMahasiswa;
use App\http\Livewire\RegisterDosen;
use App\Http\Livewire\Tambahkan;

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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/order', [App\Http\Controllers\HomeController::class, 'order'])->name('order');
Route::get('/kategori', Kategori::class);
Route::get('/registermahasiswa', RegisterMahasiswa::class);
Route::get('/registerdosen', RegisterDosen::class);
Route::get('/tampil_proyek/{id}', [App\Http\Controllers\HomeController::class, 'tampil_proyek'])->name('tampil_proyek');
Route::get('/tampil_kategori/{id}', [App\Http\Controllers\KategoriController::class, 'showProjects'])->name('tampil_kategori');
Route::get('/order_kategori/{id}', [App\Http\Controllers\KategoriController::class, 'order'])->name('orderAndCategory');

Auth::routes();

Route::group(['middleware' => ['auth','verified']],function(){ 
    Route::get('/proyekcreate', ProyekCreate::class);
    Route::get('/proyekupdate', ProyekUpdate::class);
    Route::get('/proyek', Proyek::class);
    Route::get('/profil', Profil::class);
    Route::get('/admin', Admin::class); 
    Route::get('/pilihanggota', PilihAnggota::class);
    Route::get('/mahasiswa', Mahasiswa::class);
    Route::get('/berhasil', Tambahkan::class);
    Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('showUser');

});

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/masterdata', [App\Http\Controllers\MasterdataController::class, 'index'])->name('masterdata');
});