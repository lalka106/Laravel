<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');


Route::get('/review', [MainController::class, 'review'])->name('review');
Route::get('/review/{id}', [MainController::class, 'ShowSingleReview'])->name('single-review');
Route::get('/review/{id}/update', [MainController::class, 'ReviewUpdate'])->name('review-update');
Route::get('/review/{id}/update', [MainController::class, 'ReviewUpdateSubmit'])->name('review-update-submit');
Route::get('/review/{id}/delete', [MainController::class, 'ReviewDelete'])->name('review-delete');
Route::post('/review/check', [MainController::class, 'review_check'])->name('review-check');


Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

});
Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/login_proc', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_proc');

    Route::get('/registration', [\App\Http\Controllers\AuthController::class, 'showRegForm'])->name('registration');
    Route::post('/registration_proc', [\App\Http\Controllers\AuthController::class, 'registration'])->name('registration_proc');
});





//Route::get('/user/{id}/{name}', function ($id,$name) {
//    return  'ID' . $id.'NAME'.$name;
//});
