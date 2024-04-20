<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/import-categories', [CategoryController::class, 'importarCategories']);
Route::get('/import-products', [ProductController::class, 'importarProductePerCategoria']);
