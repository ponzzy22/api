<?php

namespace App\Http\Controllers\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Media\Gambar;

class GambarController extends Controller
{

    public function index()
    {
        $gambar = Gambar::where('user_id', auth()->user()->id)->get();
        return view('media.gambar.index', compact('gambar'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'judul' => 'required',
            'image' => 'required|mimes:jpg,bmp,png|max:5024'
        ]);
        $gambar = new Gambar();
        $gambar->user_id = auth()->user()->id;
        $gambar->judul = request('judul');
        $gambar->image = uploadfile('image', 'media/gambar');
        $gambar->save();
        // $new_image = time().$image->getClientOriginalName();
        // $gambar = Gambar::create([
        //     'judul' =>$request->judul,
        //     'user_id' =>$request->user_id,
        //     'image' => 'media/gambar22/'.$new_image,
        // ]);
        // $image->move('media/gambar22/', $new_image);
        return back()->with('success', 'Gambar anda berhasil di diposting');
    }


    public function update(Request $request, Gambar $gambar, $id)
    {
        // dd($request->all());
        $gambar = Gambar::find($id);
        $gambar->user_id = auth()->user()->id;
        $gambar->judul = request('judul');
        // $gambar->user = request('user');
        $gambar->save();
        $req = "image";
        $namefolder = 'media/gambar';
        $data = $gambar->image;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $gambar->image = $url;
            $gambar->save();
        }

        return back()->with('success', 'Gambar Anda berhasil diubah');
    }


    public function destroy($id)
    {
        $gambar = Gambar::findorfail($id);
        $gambar->delete();
        $data = $gambar->image;
        deleteFIle($data);
        return back()->with('success', 'Gambar Anda berhasil diHapus');
    }
}
