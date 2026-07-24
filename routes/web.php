<?php

use App\Http\Controllers\ArchitectureDemoController;
use App\Http\Controllers\ExternalPostController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/architecture-demo', [ArchitectureDemoController::class, 'index'])->name('architecture-demo');
Route::get('/posts-demo', [ExternalPostController::class, 'index'])->name('posts-demo');
Route::get('/posts-demo/{id}', [ExternalPostController::class, 'show'])->name('posts-detail');

if (in_array(config('app.env'), ['local', 'testing'])) {
    Route::get('/test-error/{code}', function ($code) {
        abort((int)$code);
    });
}
