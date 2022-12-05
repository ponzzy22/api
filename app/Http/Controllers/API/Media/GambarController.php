<?php

namespace App\Http\Controllers\API\Media;

use App\Http\Controllers\Controller;
use App\Http\Resources\media\GambarResource;
use App\Models\Media\Gambar;
use Illuminate\Http\Request;

class GambarController extends Controller
{
    function index()
    {
        $d = Gambar::where('user_id', auth()->user()->id)->get();
        $r = GambarResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Gambar::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new GambarResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }


    function store(Request $r)
    {
        $r->validate([
            'judul' => ['required', 'unique:website_gambar,judul'],
            'image' => ['required', 'max:10000']
        ]);

        $g = new Gambar;
        $g->user_id = $r->user_id;
        $g->judul = $r->judul;
        $g->image = uploadfile('image', 'media/gambar');
        $c = $g->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil Tersimpan']);
        }
        return response()->json(["danger" => 'Data Gagal Tersimpan!']);
    }


    function update(Request $r, $id)
    {
        $g = Gambar::find($id);
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
        $g = Gambar::findorfail($id);
        $g->delete();
        $d = $g->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }
}
