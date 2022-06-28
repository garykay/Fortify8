<?php

use Illuminate\Support\Facades\Route;
use Admin\UserController;
use Admin\PostController;
use User\Profile;
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

Route::get('/', function () {
    return view('index');
});

//User pages
Route::prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function () {
        Route::get('profile', Profile::class)->name('profile');
    });

//Admin routes
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin', 'verified'])->name('admin.')->group(function () {
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/posts', PostController::class);
});
