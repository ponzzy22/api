<?php

namespace App\Http\Controllers\API\theme;

use App\Http\Controllers\Controller;
use App\Http\Resources\theme\ContentResource;
use App\Models\Theme\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    function index()
    {
        $d = Content::where('user_id', auth()->user()->id)->get();
        $r = ContentResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Content::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new ContentResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }


    function store(Request $r)
    {

        $r->validate([
            'judul' => 'required',
            'tentang' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'maklumat' => 'required',
            'selayang' => 'required|mimes:jpg,bmp,png|max:5024',
            'layanan' => 'required',
        ]);

        $d = new Content();
        $d->judul = $r->judul;
        $d->tentang = $r->tentang;
        $d->visi = $r->visi;
        $d->misi = $r->misi;
        $d->maklumat = $r->maklumat;
        $d->layanan = $r->layanan;
        $d->user_id = $r->user_id;
        $d->selayang = uploadfile('selayang', 'theme/content');
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
            'tentang' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'maklumat' => 'required',
            'selayang' => 'mimes:jpg,bmp,png|max:5024',
            'layanan' => 'required',
        ]);

        $d = Content::find($id);
        $d->judul = $r->judul;
        $d->tentang = $r->tentang;
        $d->visi = $r->visi;
        $d->misi = $r->misi;
        $d->maklumat = $r->maklumat;
        $d->layanan = $r->layanan;
        $d->user_id = $r->user_id;
        $c = $d->save();

        if (request()->hasFile('selayang')) {
            $url = updateFile('selayang', 'theme/content', $d->selayang);
            $d->selayang = $url;
            $c = $d->save();
        }

        if ($c) {
            return response()->json(["message" => 'Data Berhasil diUpdate']);
        }
        return response()->json(["danger" => 'Data Gagal diUpdate !']);
    }

    function destroy($id)
    {
        $a = Content::findorfail($id);
        $a->delete();
        $d = $a->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }
}
