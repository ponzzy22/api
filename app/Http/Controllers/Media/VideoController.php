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
        // dd($request->all());
        // $image = $request->image;
        // $new_image = time().$image->getClientOriginalName();
        // $video = Video::create([
        //     'judul' =>$request->judul,
        //     'user_id' =>$request->user_id,
        //     'image' => 'media/video22/'.$new_image,
        // ]);
        // $image->move('media/video22/', $new_image);
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


    public function update(Request $request, Video $video)
    {
        // // dd($request->all());
        // if ($request->has('image')) {
        //     $image = $request->image;
        //     $new_image = time() . $image->getClientOriginalName();
        //     $image->move('media/gambar22/', $new_image);
        //     $ganbar_data = [
        //         'judul' => $request->judul,
        //         'image' => 'media/gambar22/' . $new_image,
        //     ];
        // } else {
        //     $ganbar_data = [
        //         'judul' => $request->judul
        //     ];
        // }

        // Video::whereId($id)->update($ganbar_data);

        $video->judul = request('judul');
        $video->user_id = auth()->user()->id;
        $video->save();
        if (request()->hasFile('image')) {
            $url = updateFile('image', 'media/video', $video->image);
            $video->image = $url;
            $video->save();
        }
        return back()->with('success', 'Gambar Anda berhasil diubah');
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
