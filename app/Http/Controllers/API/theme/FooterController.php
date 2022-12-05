<?php

namespace App\Http\Controllers\API\theme;

use App\Http\Controllers\Controller;
use App\Http\Resources\theme\FooterResource;
use App\Models\Theme\footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    function index()
    {
        $d = footer::where('user_id', auth()->user()->id)->get();
        $r = FooterResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = footer::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new FooterResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }


    function store(Request $r)
    {
        $r->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'posisi' => 'required',
        ]);

        $d = new footer();
        $d->user_id = $r->user_id;
        $d->nama = $r->nama;
        $d->alamat = $r->alamat;
        $d->telepon = $r->telepon;
        $d->email = $r->email;
        $d->posisi = $r->posisi;
        $c = $d->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil Tersimpan']);
        }
        return response()->json(["danger" => 'Data Gagal Tersimpan!']);
    }


    function update(Request $r, $id)
    {
        $r->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
        ]);

        $d = footer::find($id);
        $d->user_id = $r->user_id;
        $d->nama = $r->nama;
        $d->alamat = $r->alamat;
        $d->telepon = $r->telepon;
        $d->email = $r->email;
        if (request('posisi')) $d->posisi = $r->posisi;
        $c = $d->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil diUpdate']);
        }
        return response()->json(["danger" => 'Data Gagal diUpdate !']);
    }


    function destroy($id)
    {
        $a = footer::findorfail($id);
        $a->delete();
        $d = $a->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }
}
