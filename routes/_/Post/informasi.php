<?php

use App\Http\Controllers\Post\InformasiController;
use Illuminate\Support\Facades\Route;

Route::get('informasi', [InformasiController::class, 'index']);
Route::get('informasi/create', [InformasiController::class, 'create']);
Route::post('informasi', [InformasiController::class, 'store']);
Route::get('informasi/{informasi}', [InformasiController::class, 'show']);
Route::get('informasi/{informasi}/edit', [InformasiController::class, 'edit']);
Route::put('informasi/{informasi}', [InformasiController::class, 'update']);
Route::delete('informasi/{informasi}', [InformasiController::class, 'destroy']);
