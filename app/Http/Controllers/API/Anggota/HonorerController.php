<?php

namespace App\Http\Controllers\API\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHonorerRequest;
use App\Http\Resources\Anggota\HonorerResource;
use App\Models\Anggota\Honorer;
use Illuminate\Http\Request;

class HonorerController extends Controller
{

    public function index()
    {
        $data = Honorer::where('user_id', auth()->user()->id)->get();
        $result = HonorerResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function store(Request $request)
    {
        $data = new Honorer();
        $data->user_id = auth()->user()->id;
        $data->nama = Request('nama');
        $data->jabatan = Request('jabatan');
        $data->pegawai_email = Request('pegawai_email');
        $data->nip = Request('nip');
        $data->pin = Request('pin');
        $data->gol = Request('gol');
        $data->status = Request('status');
        $data->opd = Request('opd');
        $data->kec = Request('kec');
        $data->tempat_lahir = Request('tempat_lahir');
        $data->agama = Request('agama');
        $data->save();

        return $this->sendResponse($data, "Successfull store");
    }


    public function show($id)
    {
        $cek = Honorer::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new HonorerResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }


    public function update(Request $request, $id)
    {
        $honorer = Honorer::find($id);
        $honorer->user_id = auth()->user()->id;
        $honorer->nama = Request('nama');
        $honorer->jabatan = Request('jabatan');
        $honorer->pegawai_email = Request('pegawai_email');
        $honorer->nip = Request('nip');
        $honorer->pin = Request('pin');
        $honorer->gol = Request('gol');
        $honorer->status = Request('status');
        $honorer->opd = Request('opd');
        $honorer->kec = Request('kec');
        $honorer->tempat_lahir = Request('tempat_lahir');
        $honorer->agama = Request('agama');
        $honorer->save();

        return $this->sendResponse($honorer, "Successfull Update");
    }


    public function destroy($id)
    {
        $honorer = Honorer::findorfail($id);
        $honorer->delete();
        $data = $honorer->image;
        deleteFIle($data);
        return response()->noContent();
    }
}
