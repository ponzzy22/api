<?php

namespace App\Http\Controllers\API\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Resources\Anggota\PptkResource;
use App\Models\Anggota\Pptk;
use Illuminate\Http\Request;

class PptkController extends Controller
{
    public function index()
    {
        $data = Pptk::latest()->get();
        $result = PptkResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Pptk::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new PptkResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
