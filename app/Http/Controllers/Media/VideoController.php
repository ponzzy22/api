<?php

namespace App\Http\Controllers\Media;

use App\Models\Media\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video = Video::where('user_id', auth()->user()->id)->get();
        return view('media.video.index', compact('video'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required'],
            'image' => ['required', 'max:10000']
        ]);

        $video = new Video();
        $video->judul = request('judul');
        $video->image = uploadfile('image', 'media/video');
        $video->user_id = auth()->user()->id;
        $video->save();
        return back()->with('success', 'Video anda berhasil di diposting');
    }


    public function update(Request $request, Video $video, $id)
    {
        // dd($request->all());
        $video = Video::find($id);
        $video->user_id = auth()->user()->id;
        $video->judul = request('judul');
        // $video->user = request('user');
        $video->save();
        $req = "image";
        $namefolder = 'media/video';
        $data = $video->image;
        $url = updateFile($req, $namefolder, $data);
        if (request()->hasFile($req)) {
            $video->image = $url;
            $video->save();
        }

        return back()->with('success', 'Video Anda berhasil diubah');
    }


    public function destroy($id)
    {
        $gambar = Video::findorfail($id);
        $gambar->delete();
        $data = $gambar->image;
        deleteFIle($data);
        return back()->with('success', 'Gambar Anda berhasil diHapus');
    }
}
