<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BungaController;
use App\Http\Controllers\MemberController;
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

Route::get('/obat', [BungaController::class, 'index'])->name('obat.index');
Route::get('/obat.add', [BungaController::class, 'create'])->name('obat.create');
Route::post('/obat.store', [BungaController::class, 'store'])->name('obat.store');
Route::get('/obat.edit/{id}', [BungaController::class, 'edit'])->name('obat.edit');
Route::post('/obat.update/{id}', [BungaController::class, 'update'])->name('obat.update');
Route::post('/obat.delete/{id}', [BungaController::class,'delete'])->name('obat.delete');
Route::get('/obat.search', [BungaController::class,'search'])->name('obat.search');

Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/member.add', [MemberController::class, 'create'])->name('member.create');
Route::post('/member.store', [MemberController::class, 'store'])->name('member.store');
Route::get('/member.edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
Route::post('/member.update/{id}', [MemberController::class, 'update'])->name('member.update');
Route::post('/member.delete/{id}', [MemberController::class,'delete'])->name('member.delete');
Route::get('/member.search', [MemberController::class,'search'])->name('member.search');

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

