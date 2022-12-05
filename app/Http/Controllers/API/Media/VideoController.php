<?php

namespace App\Http\Controllers\API\media;

use App\Http\Controllers\Controller;
use App\Http\Resources\media\VideoResource;
use App\Models\Media\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function index()
    {
        $d = Video::where('user_id', auth()->user()->id)->get();
        $r = VideoResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Video::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new VideoResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }


    function store(Request $r)
    {
        $r->validate([
            'judul' => ['required', 'unique:website_gambar,judul'],
            'image' => ['required', 'max:10000']
        ]);

        $g = new Video;
        $g->user_id = $r->user_id;
        $g->judul = $r->judul;
        $g->image = uploadfile('image', 'media/video');
        $c = $g->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil Tersimpan']);
        }
        return response()->json(["danger" => 'Data Gagal Tersimpan!']);
    }


    function update(Request $r, $id)
    {
        $g = Video::find($id);
        $g->user_id = $r->user_id;
        $g->judul = $r->judul;
        $c = $g->save();

        $req = "image";
        $namefolder = 'media/video';
        $data = $g->image;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $g->image = $url;
            $c = $g->save();
        }

        if ($c) {
            return response()->json(["message" => 'Data Berhasil diUpdate']);
        }
        return response()->json(["danger" => 'Data Gagal diUpdate !']);
    }


    function destroy($id)
    {
        $g = Video::findorfail($id);
        $g->delete();
        $d = $g->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }
}
