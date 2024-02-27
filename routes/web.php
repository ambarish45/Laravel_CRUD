<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

Route::get('/', [productController::class, 'index']) -> name('products.index');
Route::get('/products/create', [productController::class, 'create']) -> name('products.create');
Route::post('/products/store', [productController::class, 'store']) -> name('products.store');
Route::get('/products/{id}/edit', [productController::class, 'edit']) -> name('products.edit');
Route::get('/products/{id}/delete', [productController::class, 'destroy']) -> name('products.destroy');
Route::patch('/products/{id}/update', [productController::class, 'update'])->name('products.update');