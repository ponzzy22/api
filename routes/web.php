<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

    //master
    include "_/Master/website.php";
    include "_/Master/token.php";
    include "_/Master2/master.php";
});

