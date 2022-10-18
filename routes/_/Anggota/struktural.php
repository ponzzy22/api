<?php

use App\Http\Controllers\Anggota\StrukturalController;
use Illuminate\Support\Facades\Route;

Route::get('struktural', [StrukturalController::class, 'index']);
Route::get('struktural/{struktural}', [StrukturalController::class, 'show']);




