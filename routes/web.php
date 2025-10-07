<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CardController::class, 'index'])->name('home');

Route::resource('cards', CardController::class);

Route::get('/study', [CardController::class, 'study'])->name('cards.study');
Route::post('/cards/{card}/review', [CardController::class, 'review'])->name('cards.review');

Route::resource('categories', CategoryController::class)->only(['index', 'show']);

Route::resource('tags', TagController::class)->only(['index', 'show']);

Route::get('/about', function () {
    return view('about');
})->name('about');
