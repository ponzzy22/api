<?php

use App\Http\Controllers\Master\TokenController;
use App\Http\Controllers\Master\UserMasterController;
use Illuminate\Support\Facades\Route;

//generate token
Route::get('generate_index', [UserMasterController::class, 'generate_index'])->name('generate.index');
Route::get('generate_new_index', [UserMasterController::class, 'generate_new_index'])->name('generate.new.index');
Route::get('generate_update_index', [UserMasterController::class, 'generate_update_index'])->name('generate.update.index');
Route::post('generate/new', [TokenController::class, 'generate_new'])->name('generate_new');
Route::post('generate/update', [TokenController::class, 'generate_update'])->name('generate_update');

//user
Route::get('user_index', [UserMasterController::class, 'user_index'])->name('user.index');
Route::post('user_store', [UserMasterController::class, 'user_store'])->name('user.store');
Route::put('user_update/{user_update}', [UserMasterController::class, 'user_update'])->name('user.update');
Route::delete('user_destroy/{user_destroy}', [UserMasterController::class, 'user_destroy'])->name('user.destroy');


