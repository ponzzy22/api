<?php

namespace App\Http\Controllers\API\media;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\media\DokumenResource;
use App\Models\Media\Dokumen;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    function index()
    {
        $d = Dokumen::where('user_id', auth()->user()->id)->get();
        $r = DokumenResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Dokumen::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new DokumenResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }


    function store(Request $r)
    {
        $r->validate([
            'judul' => ['required', 'unique:website_gambar,judul'],
            'image' => ['required', 'max:10000']
        ]);

        $g = new Dokumen;
        $g->user_id = $r->user_id;
        $g->judul = $r->judul;
        $g->user = $r->user;
        $g->image = uploadfile('image', 'media/dokumen');
        $c = $g->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil Tersimpan']);
        }
        return response()->json(["danger" => 'Data Gagal Tersimpan!']);
    }


    function update(Request $r, $id)
    {
        $g = Dokumen::find($id);
        $g->user_id = $r->user_id;
        $g->judul = $r->judul;
        $g->user = $r->user;
        $c = $g->save();

        $req = "image";
        $namefolder = 'media/dokumen';
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
        $g = Dokumen::findorfail($id);
        $g->delete();
        $d = $g->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }
}
