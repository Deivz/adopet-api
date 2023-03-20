<?php

use App\Http\Controllers\AdotanteController;
use App\Http\Controllers\ResponsavelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(AdotanteController::class)->group(function() {
    Route::get('/adotante', 'index');
    Route::post('/adotante', 'store');
});

Route::controller(ResponsavelController::class)->group(function() {
    Route::get('/responsaveis', 'index');
    Route::get('/responsaveis/{responsavel}', 'show');
    Route::post('/responsaveis', 'store');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
