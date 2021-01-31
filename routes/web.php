<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('home'); 
})->name('admin');

Route::get('/post/trash_bin', [PostController::class, 'trash_bin'])->name('post.trash_bin');
Route::get('/post/restore/{id}', [PostController::class, 'restored'])->name('post.restored');
Route::delete('/post/delete/{id}', [PostController::class, 'kill'])->name('post.deleted');
Route::resource('post', PostController::class);
Route::resource('category', CategoryController::class);
Route::resource('tag', TagController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


