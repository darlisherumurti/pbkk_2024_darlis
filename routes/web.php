<?php

use App\Http\Controllers\Pertemuan2Controller;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pertemuan1Controller;
use App\Http\Controllers\Pertemuan3Controller;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', function(){
    return view('layout.base');
});

Route::prefix('/pertemuan1')->group(function(){
 Route::match(['get', 'post'], '/genap-ganjil', [Pertemuan1Controller::class, 'genapGanjil'])->name('genap-ganjil');
 Route::get('/fibbonaci',[Pertemuan1Controller::class,'fibonacci'])->name('fibonacci');
 Route::get('/prima', [Pertemuan1Controller::class, 'bilanganPrima'])->name('bilangan-prima');
 Route::get('/param', fn() => view('pertemuan1.param'))->name('param');
 Route::get('/param/{param1}', [Pertemuan1Controller::class, 'param1'])->name('param1');
 Route::get('/param/{param1}/{param2}', [Pertemuan1Controller::class, 'param2'])->name('param2');

});

Route::prefix('/pertemuan2')->group(function(){
    Route::resource('/crud-buku', Pertemuan2Controller::class);
});

Route::prefix('/pertemuan3')->group(function(){
    Route::get('/', [Pertemuan3Controller::class,'index'])->name('pertemuan3.index')->middleware(AuthMiddleware::class);
    Route::post('/login', [Pertemuan3Controller::class,'login'])->name('pertemuan3.login');
    Route::post('/register', [Pertemuan3Controller::class,'register'])->name('pertemuan3.register');
    Route::post('/logout', [Pertemuan3Controller::class,'logout'])->name('pertemuan3.logout');

});
Route::fallback(function () {
    return redirect('/');
});