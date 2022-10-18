<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Honorer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HonorerController extends Controller
{
    public function index()
    {
        return view('anggota.honorer.index', ['list_honorer' => auth()->user()->honorer]);
    }
    public function create()
    {
        return view('anggota.honorer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
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

        $honorer = new Honorer();
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

        // if (request()->hasFile('foto')) {
        //     $folder = 'anggota/honorer' . date("y");
        //     $extension = request()->file('foto')->extension();
        //     $string = Str::random(5);
        //     $url = request()->file('foto')->storeAs($folder, "$string." . $extension);
        //     $honorer->foto = $url;
        //     $honorer->save();
        // }

        return redirect('honorer')->with('success', 'berhasil menambahkan postingan baru');
    }

    public function show(Honorer $honorer)
    {
        $data['honorer'] = $honorer;
        return view('anggota.honorer.show', $data);
    }

    public function edit(Honorer $honorer)
    {
        $data['honorer'] = $honorer;
        return view('anggota.honorer.edit', $data);
    }

    public function update(Honorer $honorer, Request $request)
    {
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

        return redirect('honorer')->with('success', 'Data Berhasil Di Edit');
    }

    public function destroy(Honorer $honorer)
    {

        $honorer->delete();
        // $data = $honorer->poto;
        // $this->deleteFoto($data);

        return redirect('honorer')->with('danger', 'berhasil delete berita');
    }

    // public function deleteFoto($file)
    // {
    //     if ($file) {
    //         $path = public_path($file);
    //         if (file_exists($path)) {
    //             unlink($path);
    //             return true;
    //         }
    //     }
    // }
}
