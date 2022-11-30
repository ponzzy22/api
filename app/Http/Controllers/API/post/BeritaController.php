<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\BeritaResource;
use App\Models\Post\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::where('user_id', auth()->user()->id)->get();
        $result = BeritaResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Berita::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new BeritaResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }


    public function store(Request $request)
    {
        $berita = new Berita();
        $berita->user_id = auth()->user()->id;
        $berita->judul = request('judul');
        $berita->isi = request('isi');
        $req = "poto";
        $namefolder = 'post/berita';
        $url = uploadfile($req, $namefolder);
        $berita->poto = $url;
        $berita->save();

        return $this->sendResponse($berita, "Successfull store");
    }


    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        $berita->judul = request('judul');
        $berita->user_id = auth()->user()->id;
        $berita->isi = request('isi');
        $berita->save();
        $req = "poto";
        $namefolder = 'post/berita';
        $data = $berita->poto;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $berita->poto = $url;
            $berita->save();
        }

        return $this->sendResponse($berita, "Successfull Update");
    }

    public function destroy($id)
    {
        $berita = Berita::findorfail($id);
        $berita->delete();
        $data = $berita->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
