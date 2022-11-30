<?php

namespace App\Http\Controllers\API\media;

use App\Http\Controllers\Controller;
use App\Http\Resources\media\DokumenResource;
use App\Models\Media\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $data = Dokumen::where('user_id', auth()->user()->id)->get();
        $result = DokumenResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Dokumen::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new DokumenResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }

    public function store(Request $request)
    {
        $prof = new Dokumen();
        $prof->user_id = auth()->user()->id;
        $prof->judul = request('judul');
        $prof->user = request('user');
        $prof->image = uploadfile('image', 'media/dokumen');
        $prof->save();

        return $this->sendResponse($prof, "Successfull store");
    }

    public function update(Request $request, $id)
    {
        $dokumen = Dokumen::find($id);
        $dokumen->user_id = auth()->user()->id;
        $dokumen->judul = request('judul');
        $dokumen->user = request('user');
        $dokumen->save();
        $req = "image";
        $namefolder = 'media/dokumen';
        $data = $dokumen->image;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $dokumen->image = $url;
            $dokumen->save();
        }

        return $this->sendResponse($dokumen, "Successfull Update");
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::findorfail($id);
        $dokumen->delete();
        $data = $dokumen->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
