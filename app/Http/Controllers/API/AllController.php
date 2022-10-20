<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post\Berita;
use App\Models\Post\Artikel;
use App\Http\Resources\post\ArtikelResource;
use App\Http\Resources\post\BeritaResource;
use Illuminate\Http\Request;

class AllController extends Controller
{
 public function alldata()
 {
    $artikel = Artikel::where('user_id', auth()->user()->id)->get();
    $berita = Berita::where('user_id', auth()->user()->id)->get();

    $result = ArtikelResource::collection($artikel);
    $result1 = BeritaResource::collection($berita);
    
    return $this->sendResponse($result,'Successfull get data');
    return $this->sendResponse($result1,'Successfull get data');
}
}
