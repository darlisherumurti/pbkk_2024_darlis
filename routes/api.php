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
            Route::get('/{id}', [BukuController::class, 'single']);
            Route::get('/{id}/kategori', [BukuController::class, 'kategori']);
            Route::middleware(['role:admin|petugas'])->group(function () {
                Route::post('/{id}', [BukuController::class, 'store']);
                Route::put('/{id}', [BukuController::class, 'update']);
                Route::delete('/{id}', [BukuController::class, 'destroy']);
            });
        });
        Route::prefix('/kategoris')->group(function () {
            Route::get('/', [KategoriController::class, 'index']);
            Route::get('/{id}/bukus', [KategoriController::class, 'buku']);
            Route::get('/{id}', [KategoriController::class, 'single']);
            Route::middleware(['role:admin'])->group(function () {                
                Route::post('/{id}', [KategoriController::class, 'store']);
                Route::put('/{id}', [KategoriController::class, 'update']);
                Route::delete('/{id}', [KategoriController::class, 'destroy']);
            });
        });
        Route::get('/pinjamans/me', [PinjamanController::class, 'me']);
        Route::middleware(['role:admin|petugas'])->prefix('/pinjamans')->group(function () {
            Route::get('/', [PinjamanController::class, 'index']);
            Route::get('/{id}', [PinjamanController::class, 'single']);
            Route::post('/', [PinjamanController::class, 'store']);
            Route::post('/{id}/setujui', [PinjamanController::class, 'setujui']);
            Route::post('/{id}/tolak', [PinjamanController::class, 'tolak']);
            Route::post('/{id}/kembalikan', [PinjamanController::class, 'kembalikan']);
        });
    });
});

Route::fallback(function () {
    return response()->json(['message' => 'Not Found'], 404);
});