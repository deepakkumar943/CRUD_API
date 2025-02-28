<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductPageController;

Route::get('/products', [ProductPageController::class, 'index']);

