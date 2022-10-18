<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\BeritaResource;
use App\Models\Post\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::all();
        $result = BeritaResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Berita::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new BeritaResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
