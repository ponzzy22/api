<?php

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
use App\Http\Controllers\API\AllController;
use App\Http\Controllers\API\Anggota\AsnController;
use App\Http\Controllers\API\Anggota\HonorerController;
use App\Http\Controllers\API\Anggota\PptkController;
use App\Http\Controllers\API\Anggota\StrukturalController;
use App\Http\Controllers\Master\TokenController;
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
Route::post('token/generate/new', [TokenController::class, 'generate_new']);
Route::post('token/generate/update', [TokenController::class, 'generate_update']);
Route::post('token/cekuser', [TokenController::class, 'cekuser']);

//MIDDLEWARE
Route::middleware('auth:sanctum')->group(function () {
	//TOKEN
	Route::get('token/cektoken', [TokenController::class, 'cektoken']);

    //POST
	Route::apiResource('post/artikel', ArtikelController::class);
	Route::apiResource('post/berita', BeritaController::class);
	Route::apiResource('post/informasi', InformasiController::class);
	Route::apiResource('post/publikasi', PublikasiController::class);

	//MEDIA
	Route::apiResource('media/gambar', GambarController::class);
	Route::apiResource('media/dokumen', DokumenController::class);
	Route::apiResource('media/video', VideoController::class);

	//THEME
	Route::apiResource('theme/header', HeaderController::class);
	Route::apiResource('theme/content', ContentController::class);
	Route::apiResource('theme/footer', FooterController::class);

	Route::apiResource('anggota/honorer', HonorerController::class);
	Route::apiResource('anggota/struktural', StrukturalController::class);
	Route::apiResource('anggota/pptk', PptkController::class);
	Route::apiResource('anggota/asn', AsnController::class);

});


