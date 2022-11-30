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

    public function store(Request $request)
    {
        $data = new Gambar();
        $data->user_id = auth()->user()->id;
        $data->judul = request('judul');
        $data->image = uploadfile('image', 'media/gambar');
        $data->save();

        return $this->sendResponse($data, "Successfull store");
    }

    public function update(Request $request, $id)
    {
        $gambar = Gambar::find($id);
        $gambar->user_id = auth()->user()->id;
        $gambar->judul = request('judul');
        // $gambar->user = request('user');
        $gambar->save();
        $req = "image";
        $namefolder = 'media/gambar';
        $data = $gambar->image;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $gambar->image = $url;
            $gambar->save();
        }

        return $this->sendResponse($gambar, "Successfull Update");
    }

    public function destroy($id)
    {
        $gambar = Gambar::findorfail($id);
        $gambar->delete();
        $data = $gambar->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
