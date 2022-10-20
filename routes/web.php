<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\Master\UserMasterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// login
Route::get('/', [AuthController::class, 'logout'])->name('logout');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login_proces']);
Route::get('logout', [AuthController::class, 'logout']);

//generate token
Route::get('generate_index', [UserMasterController::class, 'generate_index'])->name('generate.index');
Route::post('generate/store', [TokenController::class, 'generate'])->name('generate');

//user
Route::get('user_index', [UserMasterController::class, 'user_index'])->name('user.index');
Route::post('user_store', [UserMasterController::class, 'user_store'])->name('user.store');
Route::put('user_update/{user_update}', [UserMasterController::class, 'user_update'])->name('user.update');
Route::delete('user_destroy/{user_destroy}', [UserMasterController::class, 'user_destroy'])->name('user.destroy');

//website list
Route::get('web_index', [UserMasterController::class, 'web_index'])->name('web.index');
Route::post('web_store', [UserMasterController::class, 'web_store'])->name('web.store');
Route::put('web_update/{web_update}', [UserMasterController::class, 'web_update'])->name('web.update');
Route::delete('web_destroy/{web_destroy}', [UserMasterController::class, 'web_destroy'])->name('web.destroy');


Route::middleware('auth')->group(function(){
    include "_/dashboard.php";
    include "_/Post/berita.php";
    include "_/Anggota/struktural.php";
    include "_/Anggota/asn.php";
    include "_/Anggota/pptk.php";
    include "_/Anggota/honorer.php";
    include "_/media.php";
    include "_/Post/informasi.php";
    include "_/Post/publikasi.php";
    include "_/Post/artikel.php";
    include "_/Theme/header.php";
    include "_/Theme/content.php";
    include "_/Theme/footer.php";
});

