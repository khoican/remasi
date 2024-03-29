<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [UserController::class, 'index'])->name('login');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('proses_login', [UserController::class, 'proses_login'])->name('proses_login');
Route::post('proses_register', [UserController::class, 'proses_register'])->name('proses_register');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::resource('/', App\Http\Controllers\Home::class)->names('home');

Route::get('change-password',[UserController::class, 'change_password'])->name('change_password');
Route::post('proses-change-password',[UserController::class, 'proses_change_password'])->name('proses-change-password');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('/resep', App\Http\Controllers\UserRecipe::class)->names('resep');
    Route::get('/kategori/{slug_category}', [App\Http\Controllers\UserRecipe::class, 'getCategory'])->name('resep-category');
    Route::get('/resep/{slug_recipe}', [App\Http\Controllers\UserRecipe::class, 'show'])->name('resep-show');
    Route::post('comment', [App\Http\Controllers\UserRecipe::class, 'comment'])->name('comment');
    Route::post('reply', [App\Http\Controllers\UserRecipe::class, 'reply'])->name('reply');

    Route::group(['middleware' => ['cek_login:admin']], function() {
        Route::resource('/admin', App\Http\Controllers\Recipe::class)->names('admin');

        Route::resource('/kategori', App\Http\Controllers\Category::class)->names('kategori');
    });
});


