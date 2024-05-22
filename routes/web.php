<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/getListUsers',[UserController::class, 'getUser']);
Route::get('/addListUsers',[UserController::class, 'addListUsers']);
Route::get('/updateListUsers',[UserController::class, 'updateListUsers']);
Route::get('/deleteUsers',[UserController::class, 'deleteUsers']);


Route::middleware('product')->group(function () {
    Route::post('/getListProduct',[ProductController::class, 'getProduct']);
    Route::post('/addProduct',[ProductController::class, 'addProduct']);
});


Route::get('/register', [loginController::class, 'register']);
Route::get('/login', [loginController::class, 'login']);


