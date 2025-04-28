<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', [ImageController::class, 'index']);
Route::post('/upload', [ImageController::class, 'store']);
Route::post('/update/{id}', [ImageController::class, 'update']);
Route::delete('/delete/{id}', [ImageController::class, 'destroy']);
Route::get('/property-detail/{id}', [ImageController::class, 'propertyDetail']);
Route::get('/save-profile', [ImageController::class, 'saveProfile']);
Route::get('/save-card-info', [ImageController::class, 'saveCardInfo']);
Route::get('/phone-verify', [ImageController::class, 'phoneVerify']);
Route::get('/save-verify-code', [ImageController::class, 'saveVerifyCode']);
Route::get('/alquilar', [ImageController::class, 'alquilar']);
Route::get('/terminos-y-condiciones', [ImageController::class, 'termsAndConditions']);
Route::get('/contact', [ImageController::class, 'contact']);
Route::get('/add-property', [ImageController::class, 'addProperty'])->middleware('auth');
Route::get('/view-profile', [ImageController::class, 'viewProfile'])->middleware('auth');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);