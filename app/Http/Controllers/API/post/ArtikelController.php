<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\ArtikelResource;
use App\Models\Post\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::all();
        $result = ArtikelResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Artikel::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new ArtikelResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
