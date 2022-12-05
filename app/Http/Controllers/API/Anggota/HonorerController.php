<?php

namespace App\Http\Controllers\API\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHonorerRequest;
use App\Http\Resources\Anggota\HonorerResource;
use App\Models\Anggota\Honorer;
use Illuminate\Http\Request;

class HonorerController extends Controller
{
    function index()
    {
        $d = Honorer::where('user_id', auth()->user()->id)->get();
        $r = HonorerResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function store(Request $r)
    {
        $r->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'pegawai_email' => 'required',
            'nip' => 'required',
            'pin' => 'required',
            'gol' => 'required',
            'status' => 'required',
            'opd' => 'required',
            'kec' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
        ]);

        $d = new Honorer();
        $d->user_id = $r->user_id;
        $d->nama = $r->nama;
        $d->jabatan = $r->jabatan;
        $d->pegawai_email = $r->pegawai_email;
        $d->nip = $r->nip;
        $d->pin = $r->pin;
        $d->gol = $r->gol;
        $d->status = $r->status;
        $d->opd = $r->opd;
        $d->kec = $r->kec;
        $d->tempat_lahir = $r->tempat_lahir;
        $d->agama = $r->agama;
        $c = $d->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil Tersimpan']);
        }
        return response()->json(["danger" => 'Data Gagal Tersimpan!']);
    }


    function show($id)
    {
        $c = Honorer::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new HonorerResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }


    function update(Request $r, $id)
    {
        $d = Honorer::find($id);
        $d->user_id = $r->user_id;
        $d->nama = $r->nama;
        $d->jabatan = $r->jabatan;
        $d->pegawai_email = $r->pegawai_email;
        $d->nip = $r->nip;
        $d->pin = $r->pin;
        $d->gol = $r->gol;
        $d->status = $r->status;
        $d->opd = $r->opd;
        $d->kec = $r->kec;
        $d->tempat_lahir = $r->tempat_lahir;
        $d->agama = $r->agama;
        $c = $d->save();

        if ($c) {
            return response()->json(["message" => 'Data Berhasil diUpdate']);
        }
        return response()->json(["danger" => 'Data Gagal diUpdate !']);
    }


    function destroy($id)
    {
        $a = Honorer::findorfail($id);
        $a->delete();
        $d = $a->image;
        deleteFIle($d);
        return response()->json(["message" => 'Data Berhasil diHapus']);
    }
}
