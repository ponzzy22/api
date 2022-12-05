<?php

namespace App\Http\Controllers\API\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Resources\Anggota\AsnResource;
use App\Models\Anggota\Asn;
use App\Models\User;
use Illuminate\Http\Request;

class AsnController extends Controller
{
    function index()
    {
        $d = User::all();
        $r = AsnResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = User::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new AsnResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }

}
