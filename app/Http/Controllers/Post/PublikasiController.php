<?php

namespace App\Http\Controllers\Post;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post\Publikasi;
use App\Http\Controllers\Controller;

class PublikasiController extends Controller
{
    public function index()
    {
        return view('post.publikasi.index', [
            'list_publikasi' => auth()->user()->publikasi
        ]);
    }

    public function create()
    {
        return view('post.publikasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_publikasi' => 'required',
            'gambar_publikasi' => 'required|mimes:jpg,bmp,png|max:5024',
            'asset_publikasi' => 'required|max:5024',
            'asset_publikasi*' => 'required|max:5024',
        ]);



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

        return redirect('publikasi')->with('success', 'berhasil menambahkan data');
    }

    public function show(Publikasi $publikasi)
    {
        $data = json_decode($publikasi->asset_publikasi);
        return view('post.publikasi.show', [
            'publikasi' => $publikasi,
            'data' => $data
        ]);
    }

    public function edit(Publikasi $publikasi)
    {
        return view('post.publikasi.edit', [
            'publikasi' => $publikasi
        ]);
    }

    public function update(Publikasi $publikasi, Request $request)
    {
        $request->validate([
            'judul_publikasi' => 'required',
        ]);


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

        return redirect('publikasi')->with('warning', 'berhasil edit data');
    }

    public function destroy(Publikasi $publikasi)
    {
        $publikasi->delete();
        $data = $publikasi->gambar_publikasi;
        deleteFIle($data);
        // delete multi file isi masih bug

        return redirect('publikasi')->with('danger', 'berhasil hapus data');
    }
}
