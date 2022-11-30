<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\ArtikelResource;
use App\Models\Post\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::where('user_id', auth()->user()->id)->get();
        $result = ArtikelResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Artikel::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new ArtikelResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }


    public function store(Request $request)
    {
        $data = new Artikel();
        $data->user_id = auth()->user()->id;
        $data->judul_artikel = request('judul_artikel');
        $data->isi_artikel = request('isi_artikel');
        $req = 'gambar_artikel';
        $namefolder = 'post/artikel';
        $file = uploadfile($req, $namefolder);
        $data->gambar_artikel = $file;
        $data->save();

        return $this->sendResponse($data, "Successfull store");
    }


    public function update(Request $request, $id)
    {
        $artikel = Artikel::find($id);
        $artikel->user_id = auth()->user()->id;
        $artikel->judul_artikel = request('judul_artikel');
        $artikel->isi_artikel = request('isi_artikel');
        $artikel->save();
        $req = 'gambar_artikel';
        $namefolder = 'post/artikel';
        $data = $artikel->gambar_artikel;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $artikel->gambar_artikel = $url;
            $artikel->save();
        };

        return $this->sendResponse($artikel, "Successfull Update");
    }

    public function destroy($id)
    {
        $artikel = Artikel::findorfail($id);
        $artikel->delete();
        $data = $artikel->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
