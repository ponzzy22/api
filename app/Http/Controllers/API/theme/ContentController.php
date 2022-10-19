<?php

namespace App\Http\Controllers\API\theme;

use App\Http\Controllers\Controller;
use App\Http\Resources\theme\ContentResource;
use App\Models\Theme\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $data = Content::where('user_id', auth()->user()->id)->get();
        $result = ContentResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Content::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new ContentResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
