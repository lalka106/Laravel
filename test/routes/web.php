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

Route::get('/', [MainController::class,'home'])->name('home');
Route::get('/about', [MainController::class,'about'])->name('about');
Route::get('/login', [MainController::class,'login'])->name('login');


Route::get('/review', [MainController::class,'review'])->name('review');
Route::get('/review/{id}', [MainController::class,'ShowSingleReview'])->name('single-review');
Route::get('/review/{id}/update', [MainController::class,'ReviewUpdate'])->name('review-update');
Route::post('/review/{id}/update', [MainController::class,'ReviewUpdateSubmit'])->name('review-update-submit');
Route::get('/review/{id}/delete', [MainController::class,'ReviewDelete'])->name('review-delete');
Route::post('/review/check', [MainController::class,'review_check'])->name('review-check');

//Route::get('/user/{id}/{name}', function ($id,$name) {
//    return  'ID' . $id.'NAME'.$name;
//});
