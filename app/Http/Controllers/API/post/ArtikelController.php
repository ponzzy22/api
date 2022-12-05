<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\ArtikelResource;
use App\Models\Post\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    function index()
    {
        $d = Artikel::where('user_id', auth()->user()->id)->get();
        $r = ArtikelResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Artikel::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new ArtikelResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }


    function store(Request $r)
    {
        $r->validate([
            'judul_artikel' => 'required',
            'gambar_artikel' => 'required|mimes:jpg,bmp,png|max:5024',
            'isi_artikel' => 'required',
        ]);

        $d = new Artikel();
        $d->judul_artikel = $r->judul_artikel;
        $d->user_id = $r->user_id;
        $d->isi_artikel = $r->isi_artikel;
        $req = 'gambar_artikel';
        $namefolder = 'post/artikel';
        $file = uploadfile($req, $namefolder);
        $d->gambar_artikel = $file;
        $c = $d->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil Tersimpan']);
        }
        return response()->json(["danger" => 'Data Gagal Tersimpan!']);
    }


    function update(Request $r, $id)
    {
        $r->validate([
            'judul_artikel' => 'required',
            'gambar_artikel' => 'mimes:jpg,bmp,png',
            'isi_artikel' => 'required',
        ]);

        $d = Artikel::find($id);
        $d->user_id = $r->user_id;
        $d->judul_artikel = $r->judul_artikel;
        $d->isi_artikel = $r->isi_artikel;
        $c = $d->save();

        $req = 'gambar_artikel';
        $namefolder = 'post/artikel';
        $data = $d->gambar_artikel;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $d->gambar_artikel = $url;
            $c = $d->save();
        };

        if ($c) {
            return response()->json(["message" => 'Data Berhasil diUpdate']);
        }
        return response()->json(["danger" => 'Data Gagal diUpdate !']);
    }


    function destroy($id)
    {
        $a = Artikel::findorfail($id);
        $a->delete();
        $d = $a->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }
}
