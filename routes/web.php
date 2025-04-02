<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


Route::get('/', [ImageController::class, 'index']);
Route::get('/add-property', [ImageController::class, 'addProperty']);
Route::post('/upload', [ImageController::class, 'store']);
Route::post('/update/{id}', [ImageController::class, 'update']);
Route::delete('/delete/{id}', [ImageController::class, 'destroy']);