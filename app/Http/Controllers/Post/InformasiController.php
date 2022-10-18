<?php

namespace App\Http\Controllers\Post;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post\Informasi;
use App\Http\Controllers\Controller;

class InformasiController extends Controller
{
    public function index()
    {
        return view('post.informasi.index', [
            'list_informasi' => auth()->user()->informasi
        ]);
    }

    public function create()
    {
        return view('post.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_informasi' => 'required',
            'category_informasi' => 'required',
            'gambar_informasi' => 'required|mimes:jpg,bmp,png|max:5024',
            'isi_informasi' => 'required',
        ]);

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

        return redirect('informasi')->with('success', 'berhasil menambahkan informasi baru');
    }

    public function show(Informasi $informasi)
    {
        return view('post.informasi.show', [
            'informasi' => $informasi
        ]);
    }
    public function edit(Informasi $informasi)
    {
        return view('post.informasi.edit', [
            'informasi' => $informasi
        ]);
    }

    public function update(Informasi $informasi, Request $request)
    {

        $request->validate([
            'judul_informasi' => 'required',
            'category_informasi' => 'required',
            'gambar_informasi' => 'mimes:jpg,bmp,png',
            'isi_informasi' => 'required',
        ]);

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

        return redirect('informasi')->with('warning', 'edit data informasi');
    }

    public function destroy(Informasi $informasi)
    {
        $informasi->delete();
        $data = $informasi->gambar_informasi;
        deleteFIle($data);

        return redirect('informasi')->with('danger', 'delete data informasi');
    }
}
