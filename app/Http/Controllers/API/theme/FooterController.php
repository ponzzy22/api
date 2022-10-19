<?php

namespace App\Http\Controllers\API\theme;

use App\Http\Controllers\Controller;
use App\Http\Resources\theme\FooterResource;
use App\Models\Theme\footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $data = footer::where('user_id', auth()->user()->id)->get();
        $result = FooterResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = footer::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new FooterResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
