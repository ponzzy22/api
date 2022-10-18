<?php

namespace App\Http\Controllers\API\theme;

use App\Http\Controllers\Controller;
use App\Http\Resources\theme\HeaderResource;
use App\Models\Theme\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $data = Header::all();
        $result = HeaderResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Header::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new HeaderResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
