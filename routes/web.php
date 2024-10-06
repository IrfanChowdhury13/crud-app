<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('create', [PageController::class, 'create'])->name('create');
// Route::get('show', [PageController::class, 'show'])->name('show');
Route::get('edit', [PageController::class, 'edit'])->name('edit');

Route::resource('products', ProductController::class);
