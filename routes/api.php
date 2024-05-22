<?php

use App\Jobs\ChangePrice;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/product', [\App\Http\Controllers\ProductController::class, 'store']);
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'store']);
Route::put('/product', [\App\Http\Controllers\ProductController::class, 'store']);
Route::delete('/product', [\App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('/queueTest', function () {
    ChangePrice::dispatch(product::where('product_id', 1)->first(), 100, 1)->onQueue('default');
    return 'ok';
});
