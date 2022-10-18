<?php

use App\Http\Controllers\Theme\ContentController;
use Illuminate\Support\Facades\Route;


Route::get('content', [ContentController::class, 'index']);
Route::get('content/create', [ContentController::class, 'create']);
Route::post('content/store', [ContentController::class, 'store']);
Route::get('content/{content}', [ContentController::class, 'edit']);
Route::get('content/{content}/show', [ContentController::class, 'show']);
Route::put('content/{content}', [ContentController::class, 'update']);
Route::delete('content/{content}', [ContentController::class, 'destroy']);

