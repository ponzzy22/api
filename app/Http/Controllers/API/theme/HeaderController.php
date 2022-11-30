<?php

namespace App\Http\Controllers\API\theme;

use App\Http\Controllers\Controller;
use App\Http\Resources\theme\HeaderResource;
use App\Models\Theme\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $data = Header::where('user_id', auth()->user()->id)->get();
        $result = HeaderResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = Header::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new HeaderResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }

    public function store(Request $request)
    {
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

        return $this->sendResponse($header, "Successfull store");
    }


    public function update(Request $request, $id)
    {
        $header = Header::find($id);
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
        $header->update();

        return $this->sendResponse($header, "Successfull Update");
    }

    public function destroy($id)
    {
        $file = Header::findorfail($id);
        $file->delete();
        $data = $file->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
