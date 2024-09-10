<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PinjamanController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/pertemuan4/home' );

Route::prefix('/pertemuan4')->group(function(){
    Route::view('/home','pertemuan4.home')->name('home');
    
    Route::middleware(['auth'])->group(function(){

        Route::middleware(['role:admin'])->group(function(){

            Route::get('/buku/create', [BukuController::class,'create'])->name('buku.create');
            Route::post('/buku',[BukuController::class,'store'])->name('buku.store');
            Route::get('/buku/{buku}/edit', [BukuController::class,'edit'])->name('buku.edit');
            Route::put('/buku/{buku}', [BukuController::class,'update'])->name('buku.update');
            Route::delete('/buku/{buku}', [BukuController::class,'destroy'])->name('buku.destroy');

            Route::get('/kategori/create', [KategoriController::class,'create'])->name('kategori.create');
            Route::post('/kategori',[KategoriController::class,'store'])->name('kategori.store');
            Route::get('/kategori/{kategori}/edit', [KategoriController::class,'edit'])->name('kategori.edit');
            Route::put('/kategori/{kategori}', [KategoriController::class,'update'])->name('kategori.update');
            Route::delete('/kategori/{kategori}', [KategoriController::class,'destroy'])->name('kategori.destroy');
        });

        Route::middleware(['role:admin|petugas'])->group(function(){
            Route::get('/buku/list', [BukuController::class,'list'])->name('buku.list');
            Route::get('/buku/{buku}/detail', [BukuController::class,'detail'])->name('buku.detail');
            Route::get('/kategori/{kategori}/detail', [KategoriController::class,'detail'])->name('kategori.detail');
            Route::get('/kategori/list', [KategoriController::class,'list'])->name('kategori.list');

            Route::get('/pinjaman/pengembalian', [PinjamanController::class,'pengembalian_show'])->name('pinjaman.pengembalian');
            Route::get('/pinjaman/persetujuan', [PinjamanController::class,'persetujuan_show'])->name('pinjaman.persetujuan');
            Route::get('/pinjaman/create', [PinjamanController::class,'create'])->name('pinjaman.create');
            Route::get('/pinjaman/buku', [PinjamanController::class,'buku_index'])->name('pinjaman.buku.index');
            Route::get('/pinjaman/buku/{buku}', [PinjamanController::class,'buku_show'])->name('pinjaman.buku.show'); 
            Route::get('/pinjaman/{pinjaman}/detail', [PinjamanController::class,'detail'])->name('pinjaman.detail'); 
            Route::post('/pinjaman/{pinjaman}/setujui', [PinjamanController::class,'setujui'])->name('pinjaman.setujui');
            Route::post('/pinjaman/{pinjaman}/tolak', [PinjamanController::class,'tolak'])->name('pinjaman.tolak');
            Route::post('/pinjaman/{pinjaman}/kembalikan', [PinjamanController::class,'kembalikan'])->name('pinjaman.kembalikan');
        });
    
    });

    Route::get('/register', [RegisterController::class,'show'])->name('register.create');
    Route::post('/register', [RegisterController::class,'register'])->name('register.show');
    Route::get('/login', [LoginController::class,'show'])->name('login');
    Route::post('/login', [LoginController::class,'login'])->name('login.create');
    Route::post('/logout', [LoginController::class,'logout'])->name('login.destroy');

    Route::get('/buku', [BukuController::class,'index'])->name('buku.index');
    Route::get('/buku/{buku}', [BukuController::class,'show'])->name('buku.show');
    Route::get('/kategori', [KategoriController::class,'index'])->name('kategori.index');
    Route::get('/kategori/{kategori}', [KategoriController::class,'show'])->name('kategori.show');

    Route::get('/pinjam/buku/{buku}', [PinjamanController::class,'create'])->name('pinjam.create');
    Route::get('/pinjaman/me', [PinjamanController::class,'me'])->name('pinjaman.me');
    Route::post('/pinjaman', [PinjamanController::class,'store'])->name('pinjaman.store');
    Route::get('/pinjaman', fn() => redirect()->route('pinjaman.me'));
    Route::get('/pinjaman/{pinjaman}', [PinjamanController::class,'show'])->name('pinjaman.show');
});

Route::view('/api/schema','api.schema')->name('api.schema');
// Route::fallback(fn() => redirect('/pertemuan4/home')->with('error', 'Halaman Tidak Ditemukan'));