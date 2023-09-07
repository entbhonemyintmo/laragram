<?php

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


Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('post');
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create'])->name('post.create');
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store'])->name('post.store');
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('post.show');

Route::post('/follow/{user}', [App\Http\Controllers\FollowController::class, 'store'])->name('follow.store');
