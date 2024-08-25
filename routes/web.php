<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pertemuan1Controller;
Route::get('/', function(){
    return view('layout.base');
});

Route::prefix('/pertemuan1')->group(function(){
 Route::get('/genap-ganjil',[Pertemuan1Controller::class,'genapGanjil'])->name('genap-ganjil');
 Route::get('/fibbonaci',[Pertemuan1Controller::class,'fibonacci'])->name('fibonacci');
 Route::get('/prima', [Pertemuan1Controller::class, 'bilanganPrima'])->name('bilangan-prima');
});
