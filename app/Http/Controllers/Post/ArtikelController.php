<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('post.artikel.index', [
            'list_artikel' => auth()->user()->artikel
        ]);
    }

    public function create()
    {
        return view('post.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_artikel' => 'required',
            'gambar_artikel' => 'required|mimes:jpg,bmp,png|max:5024',
            'isi_artikel' => 'required',
        ]);

        $artikel = new Artikel();
        $artikel->user_id = auth()->user()->id;
        $artikel->judul_artikel = request('judul_artikel');
        $artikel->isi_artikel = request('isi_artikel');
        $req = 'gambar_artikel';
        $namefolder = 'post/artikel';
        $data = uploadfile($req, $namefolder);
        $artikel->gambar_artikel = $data;
        $artikel->save();

        return redirect('artikel')->with('success', 'berhasil tambah artikel');
    }

    public function show(Artikel $artikel)
    {
        return view('post.artikel.show', [
            'artikel' => $artikel
        ]);
    }

    public function edit(Artikel $artikel)
    {
        return view('post.artikel.edit', [
            'artikel' => $artikel
        ]);
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul_artikel' => 'required',
            'gambar_artikel' => 'mimes:jpg,bmp,png',
            'isi_artikel' => 'required',
        ]);

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

        return redirect('artikel')->with('warning', 'berhasil edit artikel');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        $data = $artikel->gambar_artikel;
        deleteFIle($data);

        return redirect('artikel')->with('danger', 'berhasil delete artikel');
    }
}
