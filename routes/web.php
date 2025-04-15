<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


Route::get('/', [ImageController::class, 'index']);
Route::get('/add-property', [ImageController::class, 'addProperty']);
Route::post('/upload', [ImageController::class, 'store']);
Route::post('/update/{id}', [ImageController::class, 'update']);
Route::delete('/delete/{id}', [ImageController::class, 'destroy']);
Route::get('/property-detail/{id}', [ImageController::class, 'propertyDetail']);
Route::get('/save-profile', [ImageController::class, 'saveProfile']);
Route::get('/save-card-info', [ImageController::class, 'saveCardInfo']);
Route::get('/view-profile', [ImageController::class, 'viewProfile']);
Route::get('/phone-verify', [ImageController::class, 'phoneVerify']);
Route::get('/save-verify-code', [ImageController::class, 'saveVerifyCode']);