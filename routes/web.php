<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return '<a href="/posts">Posts</a>';
});



Route::get('/posts', [PostController::class,'index'])->name('posts.index');

Route::get('/posts/{id}', [PostController::class, 'show'])->where('id', '[0-9]+')->name('posts.show');

Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{id}/edit', [PostController::class,'edit'])->name('posts.edit');

Route::put('/posts/{id}', [PostController::class,'update'])->name('posts.update');

Route::get('/posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
