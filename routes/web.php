<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Contact routes
Route::get('partials/contact', [App\http\Controllers\ContactController::class, 'index'])->name('partials/contact');
Route::post('partials/contact', [App\http\Controllers\ContactController::class, 'store'])->name('partials/contact.store');

//About routes
Route::get('partials/about', [App\http\Controllers\AboutController::class, 'index'])->name('partials/about');

//Posts routes
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::resource('posts', PostController::class);

//Likes routes
Route::get('like/{postid', [LikeController::class, 'like'])->name('like');

//Profile routes

//Admin routes