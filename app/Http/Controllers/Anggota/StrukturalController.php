<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Struktural;
use Illuminate\Http\Request;
use Illuminate\Support\Str ;

class StrukturalController extends Controller
{
    public function index()
    {
        return view('anggota.struktural.index', ['list_struktural' => Struktural::latest()->get()]);
    }
    public function create()
    {
        return view('anggota.struktural.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|mimes:jpg,bmp,png',
            'jabatan' => 'required',
            'spesialis' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
        ]);

        $struktural = new Struktural();
        $struktural->nama = request('nama');
        $struktural->jabatan = request('jabatan');
        $struktural->alamat = request('alamat');
        $struktural->email = request('email');
        $struktural->telepon = request('telepon');
        $struktural->spesialis = request('spesialis');
        if (request()->hasFile('foto')) {
            $folder = 'anggota/struktural' . date("y");
            $extension = request()->file('foto')->extension();
            $string = Str::random(5);
            $url = request()->file('foto')->storeAs($folder, "$string." . $extension);
            $struktural->foto = $url;
            $struktural->save();
        }

        return redirect('struktural')->with('success', 'berhasil menambahkan postingan baru');
    }

    public function show(Struktural $struktural){
        $data['struktural'] = $struktural;
        return view('anggota.struktural.show', $data);
    }

    public function edit(Struktural $struktural)
    {
        $data['struktural'] = $struktural;
        return view('anggota.struktural.edit', $data);
    }

    public function update(Struktural $struktural, Request $request)
    {
        $request->validate([
            'foto' => 'mimes:jpg,bmp,png',
        ]);

        $struktural->nama = request('nama');
        $struktural->jabatan = request('jabatan');
        $struktural->alamat = request('alamat');
        $struktural->email = request('email');
        $struktural->telepon = request('telepon');
        $struktural->spesialis = request('spesialis');
        $struktural->save();
        if (request()->hasFile('foto')) {
            $file = $struktural->foto;
            $this->deleteFoto($file);
            $folder = 'anggota/struktural' . date("y");
            $extension = request()->file('foto')->extension();
            $string = Str::random(5);
            $url = request()->file('foto')->storeAs($folder, "$string." . $extension);
            $struktural->foto = $url;
            $struktural->save();
        }

        return redirect('struktural')->with('success', 'Data Berhasil Di Edit');
    }

    public function destroy(Struktural $struktural){
        
            $struktural->delete();
            $data = $struktural->poto;
            $this->deleteFoto($data);
    
            return redirect('struktural')->with('danger', 'berhasil delete berita');
        
    }

    public function deleteFoto($file)
    {
        if ($file) {
            $path = public_path($file);
            if (file_exists($path)) {
                unlink($path);
                return true;
            }
        }
    }
}
