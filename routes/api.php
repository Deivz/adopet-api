<?php

use App\Http\Controllers\AdotanteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(AdotanteController::class)->group(function() {
    Route::get('/adotante', 'index');
    Route::post('/adotante', 'store');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
