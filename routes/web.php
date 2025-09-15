<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

use App\Http\Controllers\PostController;

Route::middleware('auth')->group(function () {
    Route::get('posts/delete_perm/{id}', [PostController::class, 'delete_permanently'])->name('posts.perm_delete');
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/deleted_posts', [PostController::class, 'deleted_posts'])->name('posts.deleted_posts');
    Route::get('posts/restore', [PostController::class, 'restore_all'])->name('posts.restore');
    Route::get('posts/restore_post/{id}', [PostController::class, 'restore_post'])->name('posts.restore_post');
    Route::resource('posts', PostController::class);
});