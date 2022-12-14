<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin.add', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin.store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin.edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin.update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::post('/admin.delete/{id}', [AdminController::class,'delete'])->name('admin.delete');
Route::get('/admin.search', [AdminController::class,'search'])->name('admin.search');

Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat.add', [ObatController::class, 'create'])->name('obat.create');
Route::post('/obat.store', [ObatController::class, 'store'])->name('obat.store');
Route::get('/obat.edit/{id}', [ObatController::class, 'edit'])->name('obat.edit');
Route::post('/obat.update/{id}', [ObatController::class, 'update'])->name('obat.update');
Route::post('/obat.archive/{id}', [ObatController::class,'archive'])->name('obat.archive');
Route::post('/obat.delete/{id}', [ObatController::class,'delete'])->name('obat.delete');
Route::get('/obat.search', [ObatController::class,'search'])->name('obat.search');
Route::get('/obat.archived', [ObatController::class,'archived'])->name('obat.archived');
Route::post('/obat.recover/{id}', [ObatController::class,'recover'])->name('obat.recover');
Route::post('/obat.delete_archived/{id}', [ObatController::class,'delete_archived'])->name('obat.delete_archived');
Route::get('/obat.search_archived', [ObatController::class,'search_archived'])->name('obat.search_archived');


Route::get('/cabang', [CabangController::class, 'index'])->name('cabang.index');
Route::get('/cabang.add', [CabangController::class, 'create'])->name('cabang.create');
Route::post('/cabang.store', [CabangController::class, 'store'])->name('cabang.store');
Route::get('/cabang.edit/{id}', [CabangController::class, 'edit'])->name('cabang.edit');
Route::post('/cabang.update/{id}', [CabangController::class, 'update'])->name('cabang.update');
Route::post('/cabang.delete/{id}', [CabangController::class,'delete'])->name('cabang.delete');
Route::post('/cabang.archive/{id}', [CabangController::class,'archive'])->name('cabang.archive');
Route::get('/cabang.search', [CabangController::class,'search'])->name('cabang.search');
Route::get('/cabang.archived', [CabangController::class, 'archived'])->name('cabang.archived');
Route::post('/cabang.recover/{id}', [CabangController::class, 'recover'])->name('cabang.recover');
Route::post('/cabang.delete_archived/{id}', [CabangController::class,'delete_archived'])->name('cabang.delete_archived');
Route::get('/cabang.search_archived', [CabangController::class,'search_archived'])->name('cabang.search_archived');


Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::get('/pemesanan.add', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/pemesanan.store', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanan.edit/{id}', [PemesananController::class, 'edit'])->name('pemesanan.edit');
Route::post('/pemesanan.update/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
Route::post('/pemesanan.delete/{id}', [PemesananController::class,'delete'])->name('pemesanan.delete');
Route::get('/pemesanan.search', [PemesananController::class,'search'])->name('pemesanan.search');

Route::get('/detail', [DetailController::class, 'index'])->name('detail.index');

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout']);

