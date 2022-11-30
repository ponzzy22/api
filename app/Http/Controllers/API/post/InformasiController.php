<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\InformasiResource;
use App\Models\Post\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $data = Informasi::where('user_id', auth()->user()->id)->get();
        $result = InformasiResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Informasi::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new InformasiResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }


    public function store(Request $request)
    {
        $informasi = new Informasi();
        $informasi->user_id = auth()->user()->id;
        $informasi->judul_informasi = request('judul_informasi');
        $informasi->category_informasi = request('category_informasi');
        $informasi->isi_informasi = request('isi_informasi');
        $req = 'gambar_informasi';
        $namefolder = 'post/informasi';
        $url = uploadfile($req, $namefolder);
        $informasi->gambar_informasi = $url;
        $informasi->save();
        return $this->sendResponse($informasi, "Successfull store");
    }


    public function update(Request $request, $id)
    {
        $informasi = Informasi::find($id);
        $informasi->user_id = auth()->user()->id;
        $informasi->judul_informasi = request('judul_informasi');
        $informasi->category_informasi = request('category_informasi');
        $informasi->isi_informasi = request('isi_informasi');
        $informasi->save();
        $req = 'gambar_informasi';
        $namefolder = 'post/informasi';
        $data = $informasi->gambar_informasi;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $informasi->gambar_informasi = $url;
            $informasi->save();
        }

        return $this->sendResponse($informasi, "Successfull Update");
    }

    public function destroy($id)
    {
        $file = Informasi::findorfail($id);
        $file->delete();
        $data = $file->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
