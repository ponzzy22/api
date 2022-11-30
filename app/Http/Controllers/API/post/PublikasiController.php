<?php

namespace App\Http\Controllers\API\post;

use App\Http\Controllers\Controller;
use App\Http\Resources\post\PublikasiResource;
use App\Models\Post\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index()
    {
        $data = Publikasi::where('user_id', auth()->user()->id)->get();
        $result = PublikasiResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Publikasi::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new PublikasiResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }


    public function store(Request $request)
    {
        $publikasi = new Publikasi();
        $publikasi->user_id = auth()->user()->id;
        $publikasi->judul_publikasi = request('judul_publikasi');
        $req = "gambar_publikasi";
        $namefolder = 'post/publikasi/gambar_publikasi';
        $url = uploadfile($req, $namefolder);
        $publikasi->gambar_publikasi = $url;

        $files = [];
        if ($request->hasFile('asset_publikasi')) {
            foreach ($request->file('asset_publikasi') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('post/publikasi', $name);
                $files[] = $name;
            }
        }
        $publikasi->asset_publikasi = json_encode($files);
        $publikasi->save();

        return $this->sendResponse($publikasi, "Successfull store");
    }

    public function update(Request $request, $id)
    {
        $publikasi = Publikasi::find($id);
        $publikasi->judul_publikasi = request('judul_publikasi');
        $publikasi->save();
        $publikasi->user_id = auth()->user()->id;
        $req = "gambar_publikasi";
        $namefolder = 'post/publikasi/gambar_publikasi';
        $data = $publikasi->gambar_publikasi;
        if (request()->hasFile($req)) {
            $url = updateFile($req, $namefolder, $data);
            $publikasi->gambar_publikasi = $url;
            $publikasi->save();
        }

        $files = [];
        if ($request->hasFile('asset_publikasi')) {
            // delete multi file bug
            foreach ($request->file('asset_publikasi') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('post/publikasi', $name);
                $files[] = $name;
            }
            $publikasi->asset_publikasi = json_encode($files);
            $publikasi->save();
        }

        return $this->sendResponse($publikasi, "Successfull Update");
    }


    public function destroy($id)
    {
        $file = Publikasi::findorfail($id);
        $file->delete();
        $data = $file->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
