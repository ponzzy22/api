<?php

namespace App\Http\Controllers\API\theme;

use App\Http\Controllers\Controller;
use App\Http\Resources\theme\HeaderResource;
use App\Models\Theme\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    function index()
    {
        $d = Header::where('user_id', auth()->user()->id)->get();
        $r = HeaderResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Header::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new HeaderResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }

    function store(Request $request)
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
        $header->user_id = request('user_id');
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
        $c = $header->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil Tersimpan']);
        }
        return response()->json(["danger" => 'Data Gagal Tersimpan!']);
    }


    function update(Request $request, $id)
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

        $header = Header::find($id);
        $header->nama_website = request('nama_website');


        if (request()->hasFile('favicon')) {
            $url = updateFile('favicon', 'theme/header', $header->favicon);
            $header->favicon = $url;
            $header->save();
        }


        $header->user_id = request('user_id');
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
        $c = $header->update();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil diUpdate']);
        }
        return response()->json(["danger" => 'Data Gagal diUpdate !']);
    }

    function destroy($id)
    {
        $a = Header::findorfail($id);
        $a->delete();
        $d = $a->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }
}
