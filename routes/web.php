<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/import-categories', [CategoryController::class, 'importCategories']);

Route::get('/fetch-products', [ProductController::class, 'importarProductePerCategoria']);
