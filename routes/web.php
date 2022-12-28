<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::view('/', 'auth.login');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::view('user','tables.user')->name('users.index');
    Route::view('category', 'tables.category')->name('category');
    Route::view('product', 'tables.product')->name('product');
    Route::view('order', 'tables.order')->name('order');
    // Route::post('users/find', [\App\Http\Controllers\UserController::class, 'take'])->name('users.find');

    Route::get('profile/show', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('profile/wel', [\App\Http\Controllers\ProfileController::class, 'show'])->name('u-ser.destroy');
    Route::put('profile/hi', [\App\Http\Controllers\ProfileController::class, 'update'])->name('u-ser.edit');
    Route::put('profile/show', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.show');
});
