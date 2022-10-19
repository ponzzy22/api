<?php

namespace App\Http\Controllers\API\Media;

use App\Http\Controllers\Controller;
use App\Http\Resources\media\GambarResource;
use App\Models\Media\Gambar;
use Illuminate\Http\Request;

class GambarController extends Controller
{
    public function index()
    {
        $data = Gambar::where('user_id', auth()->user()->id)->get();
        $result = GambarResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Gambar::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new GambarResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
