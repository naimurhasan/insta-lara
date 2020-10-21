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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');;

Auth::routes();



Route::get('/p/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::post('/p', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/p/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');

Route::post('/follow/{user}', [App\Http\Controllers\FollowerController::class, 'store'])->name('follow.store');
