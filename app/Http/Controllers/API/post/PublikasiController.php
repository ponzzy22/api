<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\PublikasiResource;
use App\Models\Post\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index()
    {
        $data = Publikasi::all();
        $result = PublikasiResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Publikasi::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new PublikasiResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
