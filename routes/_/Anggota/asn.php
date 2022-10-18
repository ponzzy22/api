<?php

use App\Http\Controllers\Anggota\AsnController;
use Illuminate\Support\Facades\Route;

Route::get('asn', [AsnController::class, 'index']);
Route::get('asn/{asn}', [AsnController::class, 'show']);

