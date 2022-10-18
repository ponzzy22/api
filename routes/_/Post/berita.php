<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\BeritaController;

Route::get('berita', [BeritaController::class, 'index']);
Route::get('berita/create', [BeritaController::class, 'create']);
Route::post('berita', [BeritaController::class, 'store']);
Route::get('berita/{berita}', [BeritaController::class, 'show']);
Route::get('berita/{berita}/edit', [BeritaController::class, 'edit']);
Route::put('berita/{berita}', [BeritaController::class, 'update']);
Route::delete('berita/{berita}', [BeritaController::class, 'destroy']);
