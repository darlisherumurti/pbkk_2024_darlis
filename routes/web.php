<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('layout.base');
});


Route::prefix('/pertemuan2')->group(function(){
    Route::resource('/crud-buku', BukuController::class)->parameters(['crud-buku' => 'buku']);
    Route::resource('/crud-kategori', KategoriController::class)->parameters(['crud-kategori' => 'kategori']);
});

Route::fallback(function () {
    return redirect('/');
});