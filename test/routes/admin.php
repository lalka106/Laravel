<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


Route::middleware("guest:admin")->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('login_proc', [AuthController::class, 'login'])->name('login_proc');

});

Route::middleware("auth:admin")->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('posts', PostController::class);
});
