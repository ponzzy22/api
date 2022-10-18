<?php

use App\Http\Controllers\Theme\FooterController;
use Illuminate\Support\Facades\Route;

Route::get('footer', [FooterController::class, 'index']);
Route::get('footer/create', [FooterController::class, 'create']);
Route::post('footer', [FooterController::class, 'store']);
Route::get('footer/{footer}', [FooterController::class, 'show']);
Route::get('footer/{footer}/edit', [FooterController::class, 'edit']);
Route::put('footer/{footer}', [FooterController::class, 'update']);
Route::delete('footer/{footer}', [FooterController::class, 'destroy']);



