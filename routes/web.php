<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryProdukController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');
});

Route::group(['middleware' => ['auth', 'role:staff']], function () {
    Route::get('/kategori-produk', [CategoryProdukController::class, 'index'])->name('category-produk');
    Route::get('/kategori-produk/create', [CategoryProdukController::class, 'create'])->name('category-produk.create');
    Route::post('/kategori-produk/store', [CategoryProdukController::class, 'store'])->name('category-produk.store');
    Route::get('/kategori-produk/edit/{categoryProduk}', [CategoryProdukController::class, 'edit'])->name('category-produk.edit');
    Route::put('/kategori-produk/update/{categoryProduk}', [CategoryProdukController::class, 'update'])->name('category-produk.update');
    Route::delete('/kategori-produk/delete/{categoryProduk}', [CategoryProdukController::class, 'destroy'])->name('category-produk.delete');
});
