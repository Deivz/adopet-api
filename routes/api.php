<?php

use App\Http\Controllers\AdotanteController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ResponsavelController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;


Route::controller(AdotanteController::class)->group(function() {
    Route::get('/adotantes', 'index');
    Route::post('/adotantes', 'store');
});

Route::controller(ResponsavelController::class)->group(function() {
    Route::get('/responsaveis', 'index');
    Route::get('/responsaveis/{responsavel}', 'show');
    Route::post('/responsaveis', 'store');
    Route::put('/responsaveis/{responsavel}', 'update');
    Route::delete('/responsaveis/{responsavel}', 'destroy');
});

Route::controller(PetController::class)->group(function() {
    Route::get('/pets', 'index');
    Route::get('/pets/{pet}', 'show');
    Route::post('/pets', 'store');
    Route::put('/pets/{pet}', 'update');
    Route::delete('/pets/{pet}', 'destroy');
});

Route::get('/storage/{folder}/{file}', function ($folder, $file) {
    $path = storage_path("app/public/{$folder}/{$file}");
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = response($file, 200)->header('Content-Type', $type);
    return $response;
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
