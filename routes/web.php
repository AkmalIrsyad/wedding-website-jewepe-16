<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda',[BerandaController::class,'catalogues'])->name('landing.catalogues');
Route::get('/detail-paket/{id}',[BerandaController::class,'cataloguesDetail'])->name('catalogues.detail');
Route::get('/kontak',[BerandaController::class,'kontakIndex']);
Route::post('/order', [OrderController::class, 'store'])->name('order.store');



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// contoh halaman setelah login
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [SettingController::class, 'store']);

    Route::get('/manajemen-katalog', [KatalogController::class, 'index'])->name('admin.katalog.index');
    Route::get('/manajemen-katalog/add', [KatalogController::class, 'create'])->name('admin.katalog.add');
    Route::post('/manajemen-katalog/store', [KatalogController::class, 'store'])->name('admin.katalog.store');
    Route::get('/manajemen-katalog/{id}/edit', [KatalogController::class, 'edit'])->name('admin.katalog.edit');
    Route::get('/manajemen-katalog/{id}', [KatalogController::class, 'update'])->name('admin.katalog.update');
    Route::delete('/manajemen-katalog/{id}', [KatalogController::class, 'destroy'])->name('admin.katalog.destroy');


    Route::get('/manajemen-pesanan', [OrderController::class, 'indexAdmin'])->name('admin.pesanan.index');
    Route::patch('/manajemen-pesanan/{order}/accept', [OrderController::class, 'accept'])->name('admin.pesanan.accept');
    Route::patch('/manajemen-pesanan/{order}/cancel', [OrderController::class, 'cancel'])->name('admin.pesanan.cancel');
    Route::delete('/manajemen-pesanan/{order}', [OrderController::class, 'destroy'])->name('admin.pesanan.destroy');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');

});
