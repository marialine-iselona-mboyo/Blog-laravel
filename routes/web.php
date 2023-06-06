<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;

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
    $posts = Post::all();
    return view('welcome', compact('posts'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Contact routes
Route::get('partials/contact', [App\http\Controllers\ContactController::class, 'index'])->name('partials/contact');
Route::post('partials/contact', [App\http\Controllers\ContactController::class, 'store'])->name('partials/contact.store');

//About routes
Route::get('partials/about', [App\http\Controllers\AboutController::class, 'index'])->name('partials/about');

//Posts routes
Route::get('posts/index', [App\Http\Controllers\PostController::class, 'index'])->name('posts/index');
Route::resource('/posts', PostController::class);

//Likes routes
Route::get('like/{postid}', [LikeController::class, 'like'])->name('like');

//Profile routes
Route::get('users/{name}', [ProfileController::class, 'index'])->name('users/profile');
Route::post('users/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('users.profile.store');
Route::get('users/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('users.edit');

//Route::get('users/profile', [App\http\Controllers\ProfileController::class, 'index'])->name('users/profile');

//Admin routes
