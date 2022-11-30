<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\GenerateTokenController;

Route::get('generate', [GenerateTokenController::class, 'index']);
Route::get('generate/create', [GenerateTokenController::class, 'create']);
Route::post('generate', [GenerateTokenController::class, 'store']);
Route::delete('generate/{key}', [GenerateTokenController::class, 'destroy']);
