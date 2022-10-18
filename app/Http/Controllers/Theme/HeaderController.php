<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Models\Theme\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        return view('theme.header.index', [
            'list_header' => auth()->user()->header
        ]);
    }

    public function create()
    {
        return view('theme.header.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'favicon' => 'required|mimes:jpg,bmp,png|max:5024',
            'nama_website' => 'required',
            'singkatan_website' => 'required',
            'tag_line_website' => 'required',
            'alamat' => 'required',
            'phone' => 'required',
            'deskripsi_singkat' => 'required',
            'logo' => 'required|mimes:jpg,bmp,png',
            'img_background_utama' => 'required|mimes:jpg,bmp,png|max:5024',
            'img_background_1' => 'required|mimes:jpg,bmp,png|max:5024',
            'img_background_2' => 'required|mimes:jpg,bmp,png|max:5024',
            'img_background_3' => 'required|mimes:jpg,bmp,png|max:5024',
            'text_utama' => 'required',
        ]);

        $header = new Header();
        $header->user_id = auth()->user()->id;
        $header->nama_website = request('nama_website');
        $header->favicon = uploadfile('favicon', 'theme/header');
        $header->singkatan_website = request('singkatan_website');
        $header->tag_line_website = request('tag_line_website');
        $header->alamat = request('alamat');
        $header->phone = request('phone');
        $header->deskripsi_singkat = request('deskripsi_singkat');
        $header->logo = uploadfile('logo', 'theme/header');
        $header->img_background_utama = uploadfile('img_background_utama', 'theme/header');
        $header->img_background_1 = uploadfile('img_background_1', 'theme/header');
        $header->img_background_2 = uploadfile('img_background_2', 'theme/header');
        $header->img_background_3 = uploadfile('img_background_3', 'theme/header');
        $header->text_utama = request('text_utama');
        $header->save();

        return redirect('header')->with('success', 'berhasil menambahkan header');
    }

    public function show(Header $header)
    {
        return view('theme.header.show', [
            'header' => $header,
        ]);
    }

    public function edit(Header $header)
    {
        return view('theme.header.edit', [
            'header' => $header,
        ]);
    }

    public function update(Request $request, Header $header)
    {
        $request->validate([
            'favicon' => 'mimes:jpg,bmp,png',
            'nama_website' => 'required',
            'singkatan_website' => 'required',
            'tag_line_website' => 'required',
            'alamat' => 'required',
            'phone' => 'required',
            'deskripsi_singkat' => 'required',
            'logo' => 'mimes:jpg,bmp,png',
            'img_background_utama' => 'mimes:jpg,bmp,png',
            'img_background_1' => 'mimes:jpg,bmp,png',
            'img_background_2' => 'mimes:jpg,bmp,png',
            'img_background_3' => 'mimes:jpg,bmp,png',
            'text_utama' => 'required',
        ]);

        $header->nama_website = request('nama_website');


        if (request()->hasFile('favicon')) {
            $url = updateFile('favicon', 'theme/header', $header->favicon);
            $header->favicon = $url;
            $header->save();
        }


        $header->user_id = auth()->user()->id;
        $header->singkatan_website = request('singkatan_website');
        $header->tag_line_website = request('tag_line_website');
        $header->alamat = request('alamat');
        $header->phone = request('phone');
        $header->deskripsi_singkat = request('deskripsi_singkat');
        if (request()->hasFile('logo')) {
            $url = updateFile('logo', 'theme/header', $header->logo);
            $header->logo = $url;
            $header->save();
        }
        if (request()->hasFile('img_background_utama')) {
            $url = updateFile('img_background_utama', 'theme/header', $header->img_background_utama);
            $header->img_background_utama = $url;
            $header->save();
        }
        if (request()->hasFile('img_background_1')) {
            $url = updateFile('img_background_1', 'theme/header', $header->img_background_1);
            $header->img_background_1 = $url;
            $header->save();
        }
        if (request()->hasFile('img_background_2')) {
            $url = updateFile('img_background_2', 'theme/header', $header->img_background_2);
            $header->img_background_2 = $url;
            $header->save();
        }
        if (request()->hasFile('img_background_3')) {
            $url = updateFile('img_background_3', 'theme/header', $header->img_background_3);
            $header->img_background_3 = $url;
            $header->save();
        }
        $header->text_utama = request('text_utama');
        $header->save();

        return redirect('header')->with('warning', 'berhasil edit header');
    }

    public function destroy(Header $header)
    {
        $header->delete();
        $img1 = $header->img_background_1;
        deleteFIle($img1);
        $img2 = $header->img_background_2;
        deleteFIle($img2);
        $img3 = $header->img_background_3;
        deleteFIle($img3);
        $favicon = $header->favicon;
        deleteFIle($favicon);
        $logo = $header->logo;
        deleteFIle($logo);
        $header = $header->img_background_utama;
        deleteFIle($header);


        return back()->with('danger', 'berhasil delete');
    }
}
