<?php

namespace App\Http\Controllers\API\media;

use App\Http\Controllers\Controller;
use App\Http\Resources\media\DokumenResource;
use App\Models\Media\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $data = Dokumen::where('user_id', auth()->user()->id)->get();
        $result = DokumenResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Dokumen::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new DokumenResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
