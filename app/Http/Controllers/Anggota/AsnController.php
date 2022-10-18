<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Asn;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AsnController extends Controller
{
    public function index()
    {
        $data['list_asn'] = User::all();
        return view('anggota.asn.index', $data);
    }
    // public function create()
    // {
    //     return view('anggota.asn.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'jabatan' => 'required',
    //         'jabatan_baru' => 'required',
    //         'pegawai_email' => 'required',
    //         'nip' => 'required',
    //         'pin' => 'required',
    //         'gol' => 'required',
    //         'tmt_gol' => 'required',
    //         'status' => 'required',
    //         'jenis_jabatan' => 'required',
    //         'opd' => 'required',
    //         'kec' => 'required',
    //         'masa_kerja' => 'required',
    //         'thn' => 'required',
    //         'jurursan_pendidikan' => 'required',
    //         'tahun_lulus' => 'required',
    //         'tinggat_pendidikan' => 'required',
    //         'kontrol_ijazah' => 'required',
    //         'tempat_lahir' => 'required',
    //         'agama' => 'required',
    //     ]);

    //     $asn = new Asn();
    //     $asn->nama = request('nama');
    //     $asn->jabatan = request('jabatan');
    //     $asn->alamat = request('alamat');
    //     $asn->email = request('email');
    //     $asn->telepon = request('telepon');
    //     $asn->spesialis = request('spesialis');
    //     if (request()->hasFile('foto')) {
    //         $folder = 'anggota/asn' . date("y");
    //         $extension = request()->file('foto')->extension();
    //         $string = Str::random(5);
    //         $url = request()->file('foto')->storeAs($folder, "$string." . $extension);
    //         $asn->foto = $url;
    //         $asn->save();
    //     }

    //     return redirect('asn')->with('success', 'berhasil menambahkan postingan baru');
    // }

    public function show(User $asn)
    {
        $data['asn'] = $asn;
        return view('anggota.asn.show', $data);
    }

    // public function edit(Asn $asn)
    // {
    //     $data['asn'] = $asn;
    //     return view('anggota.asn.edit', $data);
    // }

    // public function update(Asn $asn, Request $request)
    // {
    //     $request->validate([
    //         'foto' => 'mimes:jpg,bmp,png',
    //     ]);

    //     $asn->nama = request('nama');
    //     $asn->jabatan = request('jabatan');
    //     $asn->alamat = request('alamat');
    //     $asn->email = request('email');
    //     $asn->telepon = request('telepon');
    //     $asn->spesialis = request('spesialis');
    //     $asn->save();
    //     if (request()->hasFile('foto')) {
    //         $file = $asn->foto;
    //         $this->deleteFoto($file);
    //         $folder = 'anggota/asn' . date("y");
    //         $extension = request()->file('foto')->extension();
    //         $string = Str::random(5);
    //         $url = request()->file('foto')->storeAs($folder, "$string." . $extension);
    //         $asn->foto = $url;
    //         $asn->save();
    //     }

    //     return redirect('asn')->with('success', 'Data Berhasil Di Edit');
    // }

    // public function destroy(Asn $asn)
    // {

    //     $asn->delete();
    //     $data = $asn->poto;
    //     $this->deleteFoto($data);

    //     return redirect('asn')->with('danger', 'berhasil delete berita');
    // }

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
