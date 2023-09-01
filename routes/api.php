<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/posts', [PostController::class, 'userPosts']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/authPosts/{post}', [PostController::class, 'authPosts']);
    Route::patch('/posts/{post:id}/update', [PostController::class, 'update']);
    Route::delete('/posts/{post:id}/delete', [PostController::class, 'destroy']);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

require __DIR__ . '/auth.php';
