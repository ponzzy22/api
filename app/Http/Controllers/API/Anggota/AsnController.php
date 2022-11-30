<?php

namespace App\Http\Controllers\API\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Resources\Anggota\AsnResource;
use App\Models\Anggota\Asn;
use App\Models\User;
use Illuminate\Http\Request;

class AsnController extends Controller
{
    public function index()
    {
        $data = User::all();
        $result = AsnResource::collection($data);
        return $this->sendResponse($result, 'Successfull get data');
    }


    public function show($id)
    {
        $cek = User::find($id);
        if (!$cek) {
            abort(404, 'Object not found');
        }
        $data = new AsnResource($cek);

        return $this->sendResponse($data, "Successfull get detail data");
    }

}
