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

    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required'],
            'image' => ['required', 'max:10000']
        ]);

        $data = new Video();
        $data->judul = request('judul');
        $data->image = uploadfile('image', 'media/video');
        $data->user_id = auth()->user()->id;
        $data->save();

        return $this->sendResponse($data, "Successfull store");
    }

    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        $video->user_id = auth()->user()->id;
        $video->judul = request('judul');
        // $video->user = request('user');
        $video->save();
        $req = "image";
        $namefolder = 'media/video';
        $data = $video->image;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $video->image = $url;
            $video->save();
        }

        return $this->sendResponse($video, "Successfull Update");
    }

    public function destroy($id)
    {
        $video = Video::findorfail($id);
        $video->delete();
        $data = $video->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
