<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/initialize',[ChapaController::class, 'initializeTransaction']);

Route::get('/webhook',[ChapaController::class, 'handleWebhook']);