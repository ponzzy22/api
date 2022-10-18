<?php

use App\Http\Controllers\Post\ArtikelController;
use Illuminate\Support\Facades\Route;

Route::get('artikel', [ArtikelController::class, 'index']);
Route::get('artikel/create', [ArtikelController::class, 'create']);
Route::post('artikel', [ArtikelController::class, 'store']);
Route::get('artikel/{artikel}', [ArtikelController::class, 'show']);
Route::get('artikel/{artikel}/edit', [ArtikelController::class, 'edit']);
Route::put('artikel/{artikel}',[ArtikelController::class, 'update']);
Route::delete('artikel/{artikel}', [ArtikelController::class, 'destroy']);
