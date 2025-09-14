<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/',[PostController::class,'index'])->name('posts.index');
Route::get('posts/deleted_posts', [PostController::class,'deleted_posts'])->name('posts.deleted_posts');
Route::get('posts/restore', [PostController::class,'restore_all'])->name('posts.restore');
Route::get('posts/restore_post/{id}', [PostController::class,'restore_post'])->name('posts.restore_post');
Route::resource('posts', PostController::class);

