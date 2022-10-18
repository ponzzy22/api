<?php

namespace App\Http\Controllers\Theme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content as ModelsContent;
use App\Models\Theme\Content;

class ContentController extends Controller
{

    public function index()
    {
        $content = Content::where('user_id', auth()->user()->id)->get();
        return view('theme.content.index', compact('content'));
    }


    public function create()
    {
        return view('theme.content.create');
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
        $content->user_id = Request('user_id');
        $content->save();


        return redirect('content')->with('success', 'berhasil menambahkan Konten baru');
    }


    public function show($id)
    {
        $content = Content::findorfail($id);
        return view('theme.content.show', compact('content'));
    }


    public function edit($id)
    {
        $content = Content::findorfail($id);
        return view('theme.content.edit', compact('content'));
    }


    public function update(Content $content, Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tentang' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'maklumat' => 'required',
            'selayang' => 'required',
            'layanan' => 'required',
        ]);

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


        return redirect('content')->with('success', 'berhasil mengubah Konten baru');
    }


    public function destroy($id)
    {
        $content = Content::findorfail($id);
        $content->delete();
        $data = $content->selayang;
        deleteFIle($data);
        return back()->with('success', 'Konten Anda berhasil diHapus');
    }
}
