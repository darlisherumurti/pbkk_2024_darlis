<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/pertemuan3/home' );

Route::prefix('/pertemuan3')->group(function(){
    Route::view('/home','pertemuan3.home');

    Route::get('/register', [RegisterController::class,'show'])->name('register.create');
    Route::post('/register', [RegisterController::class,'register'])->name('register.show');
    Route::get('/login', [LoginController::class,'show'])->name('login.show');
    Route::post('/login', [LoginController::class,'login'])->name('login.create');
    Route::post('/logout', [LoginController::class,'logout'])->name('login.destroy');

    Route::get('/article',[ArticleController::class,'index'])->name('article.index');
    Route::get('/article/{id}',[ArticleController::class,'show'])->name('article.show');
});

Route::fallback(function () {
    return redirect('/pertemuan3/home');
});