<?php

namespace App\Http\Controllers\API\theme;

use App\Http\Controllers\Controller;
use App\Http\Resources\theme\ContentResource;
use App\Models\Theme\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $data = Content::where('user_id', auth()->user()->id)->get();
        $result = ContentResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Content::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new ContentResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }


    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'tentang' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'maklumat' => 'required',
            'selayang' => 'required|mimes:jpg,bmp,png|max:5024',
            'layanan' => 'required',
        ]);

        $content = new Content();
        $content->judul = Request('judul');
        $content->tentang = Request('tentang');
        $content->visi = Request('visi');
        $content->misi = Request('misi');
        $content->maklumat = Request('maklumat');
        $content->selayang = uploadfile('selayang', 'theme/content');
        $content->layanan = Request('layanan');
        $content->user_id = auth()->user()->id;
        $content->save();

        return $this->sendResponse($content, "Successfull store");
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'judul' => 'required',
            'tentang' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'maklumat' => 'required',
            'selayang' => 'mimes:jpg,bmp,png|max:5024',
            'layanan' => 'required',
        ]);

        $content = Content::find($id);
        $content->judul = Request('judul');
        $content->tentang = Request('tentang');
        $content->visi = Request('visi');
        $content->misi = Request('misi');
        $content->maklumat = Request('maklumat');
        $content->layanan = Request('layanan');
        $content->save();
        if (request()->hasFile('selayang')) {
            $url = updateFile('selayang', 'theme/content', $content->selayang);
            $content->selayang = $url;
            $content->save();
        }

        return $this->sendResponse($content, "Successfull Update");
    }

    public function destroy($id)
    {
        $file = Content::findorfail($id);
        $file->delete();
        $data = $file->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
