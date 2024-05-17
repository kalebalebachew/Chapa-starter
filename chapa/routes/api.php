<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/initialize',[ChapaController::class, 'initializeTransaction']);

Route::post('/webhook',[ChapaController::class, 'handleWebhook']);