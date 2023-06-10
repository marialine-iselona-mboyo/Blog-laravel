<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
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

//Welcome page
Route::get('/', function () {
    $posts = Post::all();
    return view('welcome', compact('posts'));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Contact routes
Route::get('partials/contact', [App\http\Controllers\ContactController::class, 'index'])->name('partials/contact');
Route::post('partials/contact', [App\http\Controllers\ContactController::class, 'store'])->name('partials/contact.store');
//To show messages
Route::get('emails/show-messages', [MessageController::class, 'index'])->name('emails/show-messages');
Route::get('emails/show-messages/{id}', [MessageController::class, 'show'])->name('emails/show-messages.show');

//About routes
Route::get('partials/about', [App\http\Controllers\AboutController::class, 'index'])->name('partials/about');

//Posts routes
Route::get('posts/index', [App\Http\Controllers\PostController::class, 'index'])->name('posts/index');
Route::resource('/posts', PostController::class);

//Likes routes
Route::get('like/{postid}', [LikeController::class, 'like'])->name('like');

//Comments routes
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/{postId}/comments', 'CommentController@index')->name('comments.index');
Route::put('/posts/{postId}/comments/{commentId}', 'CommentController@update')->name('comments.update');
Route::delete('/posts/{postId}/comments/{commentId}', 'CommentController@destroy')->name('comments.destroy');



//Profile routes
Route::get('users/{name}', [ProfileController::class, 'index'])->name('users/profile');
Route::resource('/users', ProfileController::class);

//FAQ routes
Route::get('/faq', [App\Http\Controllers\FAQController::class, 'index'])->name('faq/index');
Route::resource('/faq', FAQController::class)->except(['index']);

//Categories routes
Route::get('categories/index_cat', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories/index_cat');
Route::resource('categories', CategoryController::class)->except(['index_cat']);

//Admin routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::put('/admin/makeAdmin/{id}', [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
Route::put('/admin/demoteAdmin/{id}', [AdminController::class, 'demoteAdmin'])->name('admin.demoteAdmin');
Route::get('admin/users', [AdminController::class, 'index'])->name('admin/users');

