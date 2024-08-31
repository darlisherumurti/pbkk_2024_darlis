<?php

use App\Http\Controllers\Pertemuan2Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('layout.base');
});


Route::prefix('/pertemuan2')->group(function(){
    Route::resource('/crud-buku', Pertemuan2Controller::class);
});

Route::fallback(function () {
    return redirect('/');
});