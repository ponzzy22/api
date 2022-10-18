<?php

use App\Http\Controllers\Anggota\HonorerController;
use Illuminate\Support\Facades\Route;

Route::get('honorer', [HonorerController::class, 'index']);
Route::get('honorer/create', [HonorerController::class, 'create']);
Route::post('honorer', [HonorerController::class, 'store']);
Route::get('honorer/{honorer}', [HonorerController::class, 'show']);
Route::get('honorer/{honorer}/edit', [HonorerController::class, 'edit']);
Route::put('honorer/{honorer}', [HonorerController::class, 'update']);
Route::delete('honorer/{honorer}', [HonorerController::class, 'destroy']);


