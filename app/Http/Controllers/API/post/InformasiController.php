<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\InformasiResource;
use App\Models\Post\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    function index()
    {
        $d = Informasi::where('user_id', auth()->user()->id)->get();
        $r = InformasiResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Informasi::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new InformasiResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }


    function store(Request $r)
    {
        $r->validate([
            'judul_informasi' => 'required',
            'category_informasi' => 'required',
            'gambar_informasi' => 'required|mimes:jpg,bmp,png|max:5024',
            'isi_informasi' => 'required',
        ]);

        $d = new Informasi();
        $d->user_id = $r->user_id;
        $d->judul_informasi = $r->judul_informasi;
        $d->category_informasi = $r->category_informasi;
        $d->isi_informasi = $r->isi_informasi;
        $req = 'gambar_informasi';
        $namefolder = 'post/informasi';
        $url = uploadfile($req, $namefolder);
        $d->gambar_informasi = $url;
        $c = $d->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil Tersimpan']);
        }
        return response()->json(["danger" => 'Data Gagal Tersimpan!']);
    }


    function update(Request $r, $id)
    {
        $r->validate([
            'judul_informasi' => 'required',
            'category_informasi' => 'required',
            'gambar_informasi' => 'mimes:jpg,bmp,png',
            'isi_informasi' => 'required',
        ]);

        $d = Informasi::find($id);
        $d->user_id = $r->user_id;
        $d->judul_informasi = $r->judul_informasi;
        $d->category_informasi = $r->category_informasi;
        $d->isi_informasi = $r->isi_informasi;
        $c = $d->save();

        $req = 'gambar_informasi';
        $namefolder = 'post/informasi';
        $data = $d->gambar_informasi;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $d->gambar_informasi = $url;
            $c = $d->save();
        }

        if ($c) {
            return response()->json(["message" => 'Data Berhasil diUpdate']);
        }
        return response()->json(["danger" => 'Data Gagal diUpdate !']);
    }

    function destroy($id)
    {
        $a = Informasi::findorfail($id);
        $a->delete();
        $d = $a->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }

}
