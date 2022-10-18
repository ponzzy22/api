<?php

namespace App\Http\Controllers\Post;

use App\Models\Post\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index()
    {
        return view('post.berita.index', [
            'list_berita' => auth()->user()->berita
        ]);
    }

    public function create()
    {
        return view('post.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'poto' => 'required|mimes:jpg,bmp,png|max:5024',
            'isi' => 'required',
        ]);

        $berita = new Berita();
        $berita->user_id = auth()->user()->id;
        $berita->judul = request('judul');
        $berita->isi = request('isi');
        $req = "poto";
        $namefolder = 'post/berita';
        $url = uploadfile($req, $namefolder);
        $berita->poto = $url;
        $berita->save();

        return redirect('berita')->with('success', 'berhasil menambahkan postingan baru');
    }

    public function show(Berita $berita)
    {
        return view('post.berita.show', [
            'berita' => $berita
        ]);
    }

    public function edit(Berita $berita)
    {
        return view('post.berita.edit', [
            'berita' => $berita
        ]);
    }

    public function update(Berita $berita, Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'poto' => 'mimes:jpg,bmp,png',
            'isi' => 'required',
        ]);

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

        return redirect('berita')->with('warning', 'berhasil edit berita');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();
        $data = $berita->poto;
        deleteFIle($data);

        return redirect('berita')->with('danger', 'berhasil delete berita');
    }


}
