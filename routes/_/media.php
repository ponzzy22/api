<?php

use App\Http\Controllers\Media\DokumenController;
use App\Http\Controllers\Media\GambarController;
use App\Http\Controllers\Media\VideoController;
use Illuminate\Support\Facades\Route;

Route::resource('media-gambar', GambarController::class);
Route::resource('media-video', VideoController::class);
Route::resource('media-dokumen', DokumenController::class);
