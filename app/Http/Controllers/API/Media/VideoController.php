<?php

namespace App\Http\Controllers\API\media;

use App\Http\Controllers\Controller;
use App\Http\Resources\media\VideoResource;
use App\Models\Media\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $data = Video::where('user_id', auth()->user()->id)->get();
        $result = VideoResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Video::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new VideoResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }
}
