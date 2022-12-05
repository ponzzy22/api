<?php

namespace App\Http\Controllers\API\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Resources\Anggota\StrukturalResource;
use App\Models\Anggota\Struktural;
use Illuminate\Http\Request;

class StrukturalController extends Controller
{
    function index()
    {
        $d = Struktural::latest()->get();
        $r = StrukturalResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Struktural::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new StrukturalResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }
}
