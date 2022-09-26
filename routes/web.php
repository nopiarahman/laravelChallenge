<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/tambah', [KategoriController::class, 'create']);
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategoriEdit');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategoriSimpan');
    Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->name('kategoriUpdate');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);
    // Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('/berita/tambah', [BeritaController::class, 'create']);
    Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->name('beritaEdit');
    Route::post('/berita', [BeritaController::class, 'store'])->name('beritaSimpan');
    Route::patch('/berita/{id}', [BeritaController::class, 'update'])->name('beritaUpdate');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy']);
});
require __DIR__.'/auth.php';
