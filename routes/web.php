<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/categories', CategoryController::class);
Route::resource('/items', ItemController::class);
Route::get('/borrows/return/{id}', [BorrowController::class, 'return'])->name('borrows.return');
Route::resource('/borrows', BorrowController::class);
