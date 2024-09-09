<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\PinjamanController;
use Illuminate\Support\Facades\Route;





Route::prefix('/pertemuan4')->middleware('throttle:60,1')->group(function () {

    Route::post('/register', RegisterController::class);
    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::prefix('/bukus')->group(function () {
            Route::get('/', [BukuController::class, 'index']);
            Route::get('/{buku}', [BukuController::class, 'single']);
            Route::get('/{buku}/kategori', [BukuController::class, 'kategori']);
            Route::middleware(['role:admin|petugas'])->group(function () {
                Route::post('/{buku}', [BukuController::class, 'store']);
                Route::put('/{buku}', [BukuController::class, 'update']);
                Route::delete('/{buku}', [BukuController::class, 'destroy']);
            });
        });
        Route::prefix('/kategoris')->group(function () {
            Route::get('/', [KategoriController::class, 'index']);
            Route::get('/{kategori}/bukus', [KategoriController::class, 'buku']);
            Route::get('/{kategori}', [KategoriController::class, 'single']);
            Route::middleware(['role:admin'])->group(function () {                
                Route::post('/{kategori}', [KategoriController::class, 'store']);
                Route::put('/{kategori}', [KategoriController::class, 'update']);
                Route::delete('/{kategori}', [KategoriController::class, 'destroy']);
            });
        });
        Route::middleware(['role:admin|petugas'])->prefix('/pinjamans')->group(function () {
            Route::get('/', [PinjamanController::class, 'index']);
            Route::get('/{pinjaman}', [PinjamanController::class, 'single']);
            Route::post('/', [PinjamanController::class, 'store']);
            Route::post('/{pinjaman}/setujui', [PinjamanController::class, 'setujui']);
            Route::post('/{pinjaman}/tolak', [PinjamanController::class, 'tolak']);
            Route::post('/{pinjaman}/kembalikan', [PinjamanController::class, 'kembalikan']);
            Route::put('/{pinjaman}', [PinjamanController::class, 'update']);
            Route::delete('/{pinjaman}', [PinjamanController::class, 'destroy']);
        });
    });
});

