<?php

namespace App\Http\Controllers\API\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Resources\Anggota\PptkResource;
use App\Models\Anggota\Pptk;
use Illuminate\Http\Request;

class PptkController extends Controller
{
    function index()
    {
        $d = Pptk::latest()->get();
        $r = PptkResource::collection($d);
        return $this->sendResponse($r, 'Berhasil Ambil Data');
    }


    function show($id)
    {
        $c = Pptk::find($id);
        if (!$c) {
            abort(404, 'Data Tidak ditemukan');
        }
        $d = new PptkResource($c);

        return $this->sendResponse($d, "Berhasil Ambil Detail Data");
    }
}
