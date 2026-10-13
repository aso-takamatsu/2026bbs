<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NoticeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']); 
Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);
Route::get('/posts/{id}', [PostController::class, 'show']);


Route::get('/notices', [NoticeController::class, 'index']);
Route::get('/notices/create', [NoticeController::class, 'create']);
Route::post('/notices', [NoticeController::class, 'store']);
Route::get('/notices/{id}', [NoticeController::class, 'show']);
Route::get('/notices/{id}/edit', [NoticeController::class, 'edit']);
Route::put('/notices/{id}', [NoticeController::class, 'update']);
Route::delete('/notices/{id}', [NoticeController::class, 'destroy']);