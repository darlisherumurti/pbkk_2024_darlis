<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pertemuan1Controller;

Route::get('/', function(){
    return view('layout.base');
});

Route::prefix('/pertemuan1')->group(function(){
 Route::get('/genap-ganjil',[Pertemuan1Controller::class,'genapGanjil'])->name('genap-ganjil');
 Route::get('/fibbonaci',[Pertemuan1Controller::class,'fibonacci'])->name('fibonacci');
 Route::get('/prima', [Pertemuan1Controller::class, 'bilanganPrima'])->name('bilangan-prima');
 
 Route::get('/param', fn() => view('pertemuan1.param'))->name('param');
 Route::get('/param/{param1}', [Pertemuan1Controller::class, 'param1'])->name('param1');
 Route::get('/param/{param1}/{param2}', [Pertemuan1Controller::class, 'param2'])->name('param2');

});

Route::prefix('/pertemuan2')->group(function(){
    Route::resource('/crud-buku', BukuController::class);
});

Route::fallback(function () {
    return redirect('/');
});