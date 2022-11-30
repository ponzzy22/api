<?php

namespace App\Http\Controllers\API\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Resources\Anggota\StrukturalResource;
use App\Models\Anggota\Struktural;
use Illuminate\Http\Request;

class StrukturalController extends Controller
{
    public function index()
    {
        $data = Struktural::latest()->get();
        $result = StrukturalResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Struktural::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new StrukturalResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
