<?php

use App\Http\Controllers\Master\UserMasterController;
use Illuminate\Support\Facades\Route;

//website list
Route::get('master', [UserMasterController::class, 'master_index'])->name('master.index');
Route::get('web_index', [UserMasterController::class, 'web_index'])->name('web.index');
Route::post('web_store', [UserMasterController::class, 'web_store'])->name('web.store');
Route::put('web_update/{web_update}', [UserMasterController::class, 'web_update'])->name('web.update');
Route::delete('web_destroy/{web_destroy}', [UserMasterController::class, 'web_destroy'])->name('web.destroy');



