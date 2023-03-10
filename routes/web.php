<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Auth;



Route::get('/', [BukuController::class, 'indexpublic'])->name('indexpublic');

Route::resource('buku', BukuController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\BukuController::class, 'index'])->name('index');
