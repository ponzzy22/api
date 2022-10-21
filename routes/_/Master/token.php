<?php

use App\Http\Controllers\Master\TokenController;
use App\Http\Controllers\Master\UserMasterController;
use Illuminate\Support\Facades\Route;

//generate token
Route::get('generate_index', [UserMasterController::class, 'generate_index'])->name('generate.index');
Route::post('generate/store', [TokenController::class, 'generate'])->name('generate');

//user
Route::get('user_index', [UserMasterController::class, 'user_index'])->name('user.index');
Route::post('user_store', [UserMasterController::class, 'user_store'])->name('user.store');
Route::put('user_update/{user_update}', [UserMasterController::class, 'user_update'])->name('user.update');
Route::delete('user_destroy/{user_destroy}', [UserMasterController::class, 'user_destroy'])->name('user.destroy');


