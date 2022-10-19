<?php

use App\Http\Controllers\TokenController;
use App\Http\Controllers\API\media\DokumenController;
use App\Http\Controllers\API\Media\GambarController;
use App\Http\Controllers\API\media\VideoController;
use App\Http\Controllers\API\post\ArtikelController;
use App\Http\Controllers\API\post\BeritaController;
use App\Http\Controllers\API\post\InformasiController;
use App\Http\Controllers\API\post\PublikasiController;
use App\Http\Controllers\API\theme\ContentController;
use App\Http\Controllers\API\theme\FooterController;
use App\Http\Controllers\API\theme\HeaderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//GENERATE TOKEN
Route::post('token/generate', [TokenController::class, 'generate']);
Route::post('token/testing', [TokenController::class, 'testing']);

//MIDDLEWARE
Route::middleware('auth:sanctum')->group(function () {
	//TOKEN
	Route::get('token/detail', [TokenController::class, 'detail']);
	Route::post('token/delete', [TokenController::class, 'delete']);

    //POST
	Route::apiResource('artikel', ArtikelController::class);
	Route::apiResource('berita', BeritaController::class);
	Route::apiResource('informasi', InformasiController::class);
	Route::apiResource('publikasi', PublikasiController::class);

	//MEDIA
	Route::apiResource('gambar', GambarController::class);
	Route::apiResource('dokumen', DokumenController::class);
	Route::apiResource('video', VideoController::class);

	//THEME
	Route::apiResource('header', HeaderController::class);
	Route::apiResource('content', ContentController::class);
	Route::apiResource('footer', FooterController::class);
});

