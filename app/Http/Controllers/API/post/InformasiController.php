<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\InformasiResource;
use App\Models\Post\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $data = Informasi::all();
        $result = InformasiResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Informasi::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new InformasiResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
