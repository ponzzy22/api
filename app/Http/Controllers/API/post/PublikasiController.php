<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\PublikasiResource;
use App\Models\Post\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    function index()
    {
        $d = Publikasi::where('user_id', auth()->user()->id)->get();
        $r = PublikasiResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Publikasi::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new PublikasiResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }


    function store(Request $r)
    {
        $r->validate([
            'judul_publikasi' => 'required',
            'gambar_publikasi' => 'required|mimes:jpg,bmp,png|max:5024',
            'asset_publikasi' => 'required|max:5024',
            'asset_publikasi*' => 'required|max:5024',
        ]);

        $d = new Publikasi();
        $d->user_id = $r->user_id;
        $d->judul_publikasi = $r->judul_publikasi;
        $req = "gambar_publikasi";
        $namefolder = 'post/publikasi/gambar_publikasi';
        $url = uploadfile($req, $namefolder);
        $d->gambar_publikasi = $url;

        $files = [];
        if ($r->hasFile('asset_publikasi')) {
            foreach ($r->file('asset_publikasi') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('post/publikasi', $name);
                $files[] = $name;
            }
        }
        $d->asset_publikasi = json_encode($files);
        $c = $d->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil Tersimpan']);
        }
        return response()->json(["danger" => 'Data Gagal Tersimpan!']);
    }

    function update(Request $r, $id)
    {
        $r->validate([
            'judul_publikasi' => 'required',
        ]);

        $d = Publikasi::find($id);
        $d->judul_publikasi = $r->judul_publikasi;
        $d->save();
        $d->user_id = $r->user_id;
        $req = "gambar_publikasi";
        $namefolder = 'post/publikasi/gambar_publikasi';
        $data = $d->gambar_publikasi;
        if (request()->hasFile($req)) {
            $url = updateFile($req, $namefolder, $data);
            $d->gambar_publikasi = $url;
            $c = $d->save();
        }

        $files = [];
        if ($r->hasFile('asset_publikasi')) {
            // delete multi file bug
            foreach ($r->file('asset_publikasi') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('post/publikasi', $name);
                $files[] = $name;
            }
            $d->asset_publikasi = json_encode($files);
            $c = $d->save();
        }

        if ($c) {
            return response()->json(["message" => 'Data Berhasil diUpdate']);
        }
        return response()->json(["danger" => 'Data Gagal diUpdate !']);
    }


    function destroy($id)
    {
        $a = Publikasi::findorfail($id);
        $a->delete();
        $d = $a->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }
}
