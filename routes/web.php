<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

Route::get('/', [productController::class, 'index']) -> name('products.index');
Route::get('/products/create', [productController::class, 'create']) -> name('products.create');
Route::post('/products/store', [productController::class, 'store']) -> name('products.store');
