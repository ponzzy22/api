<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\BeritaResource;
use App\Models\Post\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    function index()
    {
        $d = Berita::where('user_id', auth()->user()->id)->get();
        $r = BeritaResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Berita::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new BeritaResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }


    function store(Request $r)
    {
        $r->validate([
            'judul' => 'required',
            'poto' => 'required|mimes:jpg,bmp,png|max:5024',
            'isi' => 'required',
        ]);

        $d = new Berita();
        $d->user_id = $r->user_id;
        $d->judul = $r->judul;
        $d->isi = $r->isi;
        $req = "poto";
        $namefolder = 'post/berita';
        $url = uploadfile($req, $namefolder);
        $d->poto = $url;
        $c = $d->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil Tersimpan']);
        }
        return response()->json(["danger" => 'Data Gagal Tersimpan!']);
    }


    function update(Request $r, $id)
    {
        $r->validate([
            'judul' => 'required',
            'poto' => 'mimes:jpg,bmp,png',
            'isi' => 'required',
        ]);

        $d = Berita::find($id);
        $d->user_id = $r->user_id;
        $d->judul = $r->judul;
        $d->isi = $r->isi;
        $c = $d->save();

        $req = "poto";
        $namefolder = 'post/berita';
        $data = $d->poto;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $d->poto = $url;
            $c = $d->save();
        }

        if ($c) {
            return response()->json(["message" => 'Data Berhasil diUpdate']);
        }
        return response()->json(["danger" => 'Data Gagal diUpdate !']);
    }

    function destroy($id)
    {
        $b = Berita::findorfail($id);
        $b->delete();
        $d = $b->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }
}
