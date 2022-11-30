<?php

namespace App\Http\Controllers\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Media\Dokumen;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::where('user_id', auth()->user()->id)->get();
        return view('media.dokumen.index', compact('dokumen'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'judul' => 'required',
            'user' => 'required',
            'image' => 'required'
        ]);
        // $image = $request->image;
        // $new_image = time().$image->getClientOriginalName();
        // $gambar = Dokumen::create([
        //     'judul' =>$request->judul,
        //     'user_id' =>$request->user_id,
        //     'image' => 'media/dokumen22/'.$new_image,
        // ]);
        // $image->move('media/dokumen22/', $new_image);

        $dokumen = new Dokumen();
        $dokumen->user_id = auth()->user()->id;
        $dokumen->judul = request('judul');
        $dokumen->user = request('user');
        $dokumen->image = uploadfile('image', 'media/dokumen');
        $dokumen->save();
        return back()->with('success', 'Dokumen anda berhasil di diposting');
    }

    public function show($id)
    {
        $dokumen = Dokumen::findorfail($id);
        return view('media.dokumen.show');
    }


    public function update(Request $request, Dokumen $dokumen, $id)
    {
        // dd($request->all());
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

        return back()->with('success', 'Dokumen Anda berhasil diubah');
    }


    public function destroy($id)
    {
        $dokummen = Dokumen::findorfail($id);
        $dokummen->delete();
        $data = $dokummen->image;
        deleteFIle($data);
        return back()->with('success', 'Dokumen Anda berhasil diHapus');
    }
}
