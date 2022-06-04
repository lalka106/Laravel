<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
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

Route::get('/contacts', [MainController::class, 'showContactForm'])->name('contacts');
Route::post('/contact_form_proc', [MainController::class, 'contactForm'])->name('contact_form_proc');



Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/review/{id}', [ReviewController::class, 'ShowSingleReview'])->name('single-review');
    Route::get('/review/{id}/update', [ReviewController::class, 'ReviewUpdate'])->name('review-update');
    Route::post('/review/{id}/update', [ReviewController::class, 'ReviewUpdateSubmit'])->name('review-update-submit');
    Route::get('/review/{id}/delete', [ReviewController::class, 'ReviewDelete'])->name('review-delete');
    Route::post('/review/check', [ReviewController::class, 'review_check'])->name('review-check');


});
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/login_proc', [AuthController::class, 'login'])->name('login_proc');

    Route::get('/forgot', [AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_proc', [AuthController::class, 'forgot'])->name('forgot_proc');

    Route::get('/registration', [\App\Http\Controllers\AuthController::class, 'showRegForm'])->name('registration');
    Route::post('/registration_proc', [\App\Http\Controllers\AuthController::class, 'registration'])->name('registration_proc');


});







//Route::get('/user/{id}/{name}', function ($id,$name) {
//    return  'ID' . $id.'NAME'.$name;
//});
