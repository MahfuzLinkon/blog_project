<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/product-details/{id}', [FrontendController::class, 'details'])->name('product.details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
//    Category Route
    Route::get('/create-category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/manage-category', [CategoryController::class, 'manage'])->name('manage.category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete.category');
//    Brand Route
    Route::get('/create-brand', [BrandController::class, 'create'])->name('create.brand');
    Route::post('/store-brand', [BrandController::class, 'store'])->name('store.brand');
    Route::get('/manage-brand', [BrandController::class, 'manage'])->name('manage.brand');
    Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('edit.brand');
    Route::post('/update-brand/{id}', [BrandController::class, 'update'])->name('update.brand');
    Route::get('/delete-brand/{id}', [BrandController::class, 'delete'])->name('delete.brand');
//    Product Route
    Route::get('/create-product', [ProductController::class, 'create'])->name('create.product');
    Route::post('/store-product', [ProductController::class, 'store'])->name('store.product');
    Route::get('/manage-product', [ProductController::class, 'manage'])->name('manage.product');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete.product');


});
