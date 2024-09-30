<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('index', 'Admin.index');
Route::view('login','login');
Route::post('login',[UserController::class,'login']);
Route::view('dashboard','Admin.index');
