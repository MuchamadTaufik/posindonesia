<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryDaerahController;
use App\Http\Controllers\CategoryProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
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

    Route::get('/kategori-daerah', [CategoryDaerahController::class, 'index'])->name('category-daerah');
    Route::get('/kategori-daerah/create', [CategoryDaerahController::class, 'create'])->name('category-daerah.create');
    Route::post('/kategori-daerah/store', [CategoryDaerahController::class, 'store'])->name('category-daerah.store');
    Route::get('/kategori-daerah/edit/{categoryDaerah}', [CategoryDaerahController::class, 'edit'])->name('category-daerah.edit');
    Route::put('/kategori-daerah/update/{categoryDaerah}', [CategoryDaerahController::class, 'update'])->name('category-daerah.update');
    Route::delete('/kategori-daerah/delete/{categoryDaerah}', [CategoryDaerahController::class, 'destroy'])->name('category-daerah.delete');

    Route::get('/produk-masuk', [ProdukController::class, 'index'])->name('produk.masuk');
    Route::get('/produk-masuk/create', [ProdukController::class, 'create'])->name('produk.masuk.create');
    Route::post('/produk-masuk/store', [ProdukController::class, 'store'])->name('produk.masuk.store');
    Route::get('/produk-masuk/edit/{produk}', [ProdukController::class, 'edit'])->name('produk.masuk.edit');
    Route::put('/produk-masuk/update/{produk}', [ProdukController::class, 'update'])->name('produk.masuk.update');
    Route::delete('/produk-masuk/delete/{produk}', [ProdukController::class, 'destroy'])->name('produk.masuk.delete');
});
