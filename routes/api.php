<?php

use App\Http\Controllers\API\Media\DokumenController;
use App\Http\Controllers\API\Media\GambarController;
use App\Http\Controllers\API\Media\VideoController;
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
use App\Http\Controllers\API\Media\cobaController;
use App\Http\Controllers\Master\TokenController;
use App\Models\Post\Publikasi;
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

    Route::get('media/gambar', [GambarController::class, 'index']);
    Route::get('media/dokumen', [DokumenController::class, 'index']);
    Route::get('media/video', [VideoController::class, 'index']);
    Route::get('post/artikel', [ArtikelController::class, 'index']);
    Route::get('post/berita', [BeritaController::class, 'index']);
    Route::get('post/informasi', [InformasiController::class, 'index']);
    Route::get('post/publikasi', [PublikasiController::class, 'index']);
    Route::get('theme/content', [ContentController::class, 'index']);
    Route::get('theme/footer', [FooterController::class, 'index']);
    Route::get('theme/header', [HeaderController::class, 'index']);
    Route::get('anggota/asn', [AsnController::class, 'index']);
    Route::get('anggota/pptk', [PptkController::class, 'index']);
    Route::get('anggota/struktural', [StrukturalController::class, 'index']);
    Route::get('anggota/honorer', [HonorerController::class, 'index']);

});

//GAMBAR
Route::get('media/gambar/{gambar}', [GambarController::class, 'show']);
Route::post('media/gambar', [GambarController::class, 'store']);
Route::post('media/gambar/{gambar}', [GambarController::class, 'update']);
Route::delete('media/gambar/{gambar}', [GambarController::class, 'destroy']);

//DOKUMEN
Route::get('media/dokumen/{dokumen}', [DokumenController::class, 'show']);
Route::post('media/dokumen', [DokumenController::class, 'store']);
Route::post('media/dokumen/{dokumen}', [DokumenController::class, 'update']);
Route::delete('media/dokumen/{dokumen}', [DokumenController::class, 'destroy']);

//VIDEO
Route::get('media/video/{video}', [VideoController::class, 'show']);
Route::post('media/video', [VideoController::class, 'store']);
Route::post('media/video/{video}', [VideoController::class, 'update']);
Route::delete('media/video/{video}', [VideoController::class, 'destroy']);

//ARTIKEL
Route::get('post/artikel/{artikel}', [ArtikelController::class, 'show']);
Route::post('post/artikel', [ArtikelController::class, 'store']);
Route::post('post/artikel/{artikel}', [ArtikelController::class, 'update']);
Route::delete('post/artikel/{artikel}', [ArtikelController::class, 'destroy']);

//BERITA
Route::get('post/berita/{berita}', [BeritaController::class, 'show']);
Route::post('post/berita', [BeritaController::class, 'store']);
Route::post('post/berita/{berita}', [BeritaController::class, 'update']);
Route::delete('post/berita/{berita}', [BeritaController::class, 'destroy']);

//INFORMASI
Route::get('post/informasi/{informasi}', [InformasiController::class, 'show']);
Route::post('post/informasi', [InformasiController::class, 'store']);
Route::post('post/informasi/{informasi}', [InformasiController::class, 'update']);
Route::delete('post/informasi/{informasi}', [InformasiController::class, 'destroy']);

//PUBLIKASI
Route::get('post/publikasi/{publikasi}', [PublikasiController::class, 'show']);
Route::post('post/publikasi', [PublikasiController::class, 'store']);
Route::post('post/publikasi/{publikasi}', [PublikasiController::class, 'update']);
Route::delete('post/publikasi/{publikasi}', [PublikasiController::class, 'destroy']);

//CONTENT
Route::get('theme/content/{content}', [ContentController::class, 'show']);
Route::post('theme/content', [ContentController::class, 'store']);
Route::post('theme/content/{content}', [ContentController::class, 'update']);
Route::delete('theme/content/{content}', [ContentController::class, 'destroy']);

//FOOTER
Route::get('theme/footer/{footer}', [FooterController::class, 'show']);
Route::post('theme/footer', [FooterController::class, 'store']);
Route::post('theme/footer/{footer}', [FooterController::class, 'update']);
Route::delete('theme/footer/{footer}', [FooterController::class, 'destroy']);

//HEADER
Route::get('theme/header/{header}', [HeaderController::class, 'show']);
Route::post('theme/header', [HeaderController::class, 'store']);
Route::post('theme/header/{header}', [HeaderController::class, 'update']);
Route::delete('theme/header/{header}', [HeaderController::class, 'destroy']);

//ASN
Route::get('anggota/asn/{asn}', [AsnController::class, 'show']);
Route::post('anggota/asn', [AsnController::class, 'store']);
Route::post('anggota/asn/{asn}', [AsnController::class, 'update']);
Route::delete('anggota/asn/{asn}', [AsnController::class, 'destroy']);

//PPTK
Route::get('anggota/pptk/{pptk}', [PptkController::class, 'show']);
Route::post('anggota/pptk', [PptkController::class, 'store']);
Route::post('anggota/pptk/{pptk}', [PptkController::class, 'update']);
Route::delete('anggota/pptk/{pptk}', [PptkController::class, 'destroy']);

//STRUKTURAL
Route::get('anggota/struktural/{struktural}', [StrukturalController::class, 'show']);
Route::post('anggota/struktural', [StrukturalController::class, 'store']);
Route::post('anggota/struktural/{struktural}', [StrukturalController::class, 'update']);
Route::delete('anggota/struktural/{struktural}', [StrukturalController::class, 'destroy']);

//HONORER
Route::get('anggota/honorer/{honorer}', [HonorerController::class, 'show']);
Route::post('anggota/honorer', [HonorerController::class, 'store']);
Route::post('anggota/honorer/{honorer}', [HonorerController::class, 'update']);
Route::delete('anggota/honorer/{honorer}', [HonorerController::class, 'destroy']);
