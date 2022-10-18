<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Theme\HeaderController;

Route::get('header', [HeaderController::class, 'index']);
Route::get('header/create', [HeaderController::class, 'create']);
Route::post('header', [HeaderController::class, 'store']);
Route::get('header/{header}', [HeaderController::class , 'show']);
Route::get('header/{header}/edit',[HeaderController::class, 'edit']);
Route::put('header/{header}',[HeaderController::class, 'update']);
Route::delete('header/{header}', [HeaderController::class,'destroy']);
