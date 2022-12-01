<?php

namespace App\Http\Controllers\API\theme;

use App\Http\Controllers\Controller;
use App\Http\Resources\theme\FooterResource;
use App\Models\Theme\footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $data = footer::where('user_id', auth()->user()->id)->get();
        $result = FooterResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = footer::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new FooterResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'posisi' => 'required',
        ]);

        $footer = new footer();
        $footer->user_id = auth()->user()->id;
        $footer->nama = Request('nama');
        $footer->alamat = Request('alamat');
        $footer->telepon = Request('telepon');
        $footer->email = Request('email');
        $footer->posisi = Request('posisi');
        $footer->save();
        return $this->sendResponse($footer, "Successfull store");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
        ]);

        $footer = footer::find($id);
        $footer->user_id = auth()->user()->id;
        $footer->nama = Request('nama');
        $footer->alamat = Request('alamat');
        $footer->telepon = Request('telepon');
        $footer->email = Request('email');
        if (request('posisi')) $footer->posisi = Request('posisi');
        $footer->save();

        return $this->sendResponse($footer, "Successfull Update");
    }

    public function destroy($id)
    {
        $file = footer::findorfail($id);
        $file->delete();
        $data = $file->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
