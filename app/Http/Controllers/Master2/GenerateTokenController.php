<?php

namespace App\Http\Controllers\Master2;

use App\Http\Controllers\Controller;
use App\Models\Master2\Key;
use Illuminate\Http\Request;

class GenerateTokenController extends Controller
{
    public function index()
    {
        $data['key'] = auth()->user()->key;
        return view('master2.generateToken.index', $data);
    }

    public function create()
    {
        return view('master2.generateToken.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'intansi' => 'required'
        ]);


        $user = auth()->user();
        $name = request('intansi');
        $token = $user->createToken($name)->plainTextToken;

        $key = new Key();
        $key->nama = auth()->user()->username;
        $key->user_id = auth()->user()->id;
        $key->intansi = $name;
        $key->key = $token;
        $key->save();

        return redirect('generate')->with('sucess', 'berhasil genrate key api for ' . $name);
    }

    public function destroy(Key $key)
    {
        $key->delete();
        return back()->with('danger', 'berhasil delete key api');
    }
}
