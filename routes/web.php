<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('categories');
    Route::post('/store', [CategoriesController::class, 'store'])->name('storeCategory');
    Route::post('/edit', [CategoriesController::class, 'update'])->name('updateCategory');
    Route::post('/delete', [CategoriesController::class, 'delete'])->name('deleteCategory');
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('products');
    Route::post('/store', [ProductsController::class, 'store'])->name('storeProduct');
    Route::post('/edit', [ProductsController::class, 'update'])->name('updateProduct');
    Route::post('/delete', [ProductsController::class, 'delete'])->name('deleteProduct');
});
