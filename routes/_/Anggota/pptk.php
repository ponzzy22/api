<?php

use App\Http\Controllers\Anggota\PptkController;
use Illuminate\Support\Facades\Route;

Route::get('pptk', [PptkController::class, 'index']);
Route::get('pptk/{pptk}', [PptkController::class, 'show']);
