<?php

use App\Http\Controllers\AdotanteController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ResponsavelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(AdotanteController::class)->group(function() {
    Route::get('/adotantes', 'index');
    Route::post('/adotantes', 'store');
});

Route::controller(ResponsavelController::class)->group(function() {
    Route::get('/responsaveis', 'index');
    Route::get('/responsaveis/{responsavel}', 'show');
    Route::post('/responsaveis', 'store');
});

Route::controller(PetController::class)->group(function() {
    Route::get('/pets', 'index');
    Route::get('/pets/{pet}', 'show');
    Route::post('/pets', 'store');
    Route::put('/pets/{pet}', 'update');
    Route::delete('/pets/{pet}', 'destroy');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
