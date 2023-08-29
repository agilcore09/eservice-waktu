<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/home', [App\Http\Controllers\AdminController::class, 'home'])->name('home1');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/show-teknisi', [App\Http\Controllers\AdminController::class, 'show'])->name('show');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/del', [App\Http\Controllers\AdminController::class, 'del'])->name('del');
Route::get('/hapus', [App\Http\Controllers\AdminController::class, 'hapus'])->name('hapus');

//simpan teknisi
Route::post('/save-teknisi', [App\Http\Controllers\AdminController::class, 'store'])->name('store-teknisi');
Route::get('/proses-edit-teknisi/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit_teknisi');
Route::put('/proses-update-teknisi/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update_teknisi');
Route::get('/proses-delete-teknisi/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('delete_teknisi');

//Kerusakan
Route::get('/kerusakan', [App\Http\Controllers\KerusakanController::class, 'index'])->name('kerusakan');
Route::post('/save-kerusakan', [App\Http\Controllers\KerusakanController::class, 'store'])->name('store-kerusakan');
Route::get('/proses-edit-kerusakan/{id}', [App\Http\Controllers\KerusakanController::class, 'edit'])->name('edit_kerusakan');
Route::put('/proses-update-kerusakan/{id}', [App\Http\Controllers\KerusakanController::class, 'update'])->name('update_kerusakan');
Route::get('/proses-delete-kerusakan/{id}', [App\Http\Controllers\KerusakanController::class, 'destroy'])->name('delete_kerusakan');

//Login Teknisi
Route::get('/login-teknisi', [App\Http\Controllers\LoginTeknisiController::class, 'index'])->name('show_login');
Route::post('/login-proses', [App\Http\Controllers\LoginTeknisiController::class, 'store'])->name('proses_login');
Route::get('/logout', [App\Http\Controllers\LoginTeknisiController::class, 'logout'])->name('logout-teknisi');



//Servisan
Route::get('/show-home-servisan', [App\Http\Controllers\ServisanController::class, 'homeser'])->name('homeser');
Route::get('/show-servisan', [App\Http\Controllers\ServisanController::class, 'index'])->name('show_Servisan');
Route::get('/show-servisan-selesai', [App\Http\Controllers\ServisanController::class, 'index_selesai'])->name('show_Servisan_selesai');
Route::get('/show-input-servisan', [App\Http\Controllers\ServisanController::class, 'create'])->name('create_Servisan');
Route::post('/proses-input-servisan', [App\Http\Controllers\ServisanController::class, 'store'])->name('store_servisan');

Route::get('/list-harga', [App\Http\Controllers\ServisanController::class, 'harga'])->name('harga_servis');
//Cari servisan
Route::get('/cari-servisan', [App\Http\Controllers\ServisanController::class, 'cari_servisan'])->name('cari_servisan');
//Cari harga servisan
Route::get('/cari-harga', [App\Http\Controllers\ServisanController::class, 'cari_harga'])->name('cari_harga');


// proses kerja servisan
Route::get('/proses-bayar/{id}', [App\Http\Controllers\ServisanController::class, 'bayar'])->name('bayar');
Route::get('/selesai/{id}', [App\Http\Controllers\ServisanController::class, 'selesai'])->name('selesaikan');
Route::get('/dikerja/{id}', [App\Http\Controllers\ServisanController::class, 'dikerja'])->name('dikerjakan');
Route::get('/garansi/{id}', [App\Http\Controllers\ServisanController::class, 'garansi'])->name('garansi');
Route::get('/up-garansi/{id}', [App\Http\Controllers\ServisanController::class, 'upgaransi'])->name('selesai_garansi');

//cetaknota

Route::get('/pdf/{id}', [App\Http\Controllers\PrintController::class, 'print'])->name('print');
Route::get('/report', [App\Http\Controllers\PrintController::class, 'printreport'])->name('printr');


//cek kostumer
Route::post('/cek-kostumer', [App\Http\Controllers\HomeController::class, 'costumer'])->name('cek_costumer');
Route::get('/home-kostumer', [App\Http\Controllers\HomeController::class, 'home'])->name('home-kostumer');


Route::get('/vcsr', function () {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
Route::get('/cc', function () {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});


Route::get('/cr', function () {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});
