<?php

use App\Http\Controllers\ArchitectureDemoController;
use App\Http\Controllers\ExternalPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/architecture-demo', [ArchitectureDemoController::class, 'index'])->name('architecture-demo');
Route::get('/posts-demo', [ExternalPostController::class, 'index'])->name('posts-demo');
Route::get('/posts-demo/{id}', [ExternalPostController::class, 'show'])->name('posts-detail');
