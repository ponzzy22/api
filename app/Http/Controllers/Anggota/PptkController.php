<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Pptk;

class PptkController extends Controller
{
    public function index()
    {
        return view('anggota.pptk.index', ['list_pptk' => Pptk::latest()->get()]);
    }

    public function show(Pptk $pptk){
        $data['pptk'] = $pptk;
        return view('anggota.pptk.show', $data);
    }
}
