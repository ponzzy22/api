<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Token;
use App\Models\User;
use App\Models\Master\Website;
use Illuminate\Http\Request;

class UserMasterController extends Controller
{
    public function master_index()
    {
        return view('master.welcome');
    }


    public function generate_index()
    {
        $user = Token::all();
        return view('master/generate_index', compact('user'));
    }


    public function generate_new_index()
    {
        return view('master/generate_new');
    }


    public function generate_update_index()
    {
        $user = User::all();
        return view('master/generate_update', compact('user'));
    }


    public function user_index()
    {
        $user = Token::all();
        return view('master/user_index', compact('user'));
    }


    public function user_store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'password' => 'required',
            'token' => 'required',
        ]);
        $user = Token::create([
            'username' => $request->username,
            'email' => $request->email,
            'nip' => $request->nip,
            'password' => $request->password,
            'token' => $request->token,
        ]);
        return back()->with('success', 'User berhasil di Tambah');
    }


    public function user_update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'password' => 'required',
            'token' => 'required',
        ]);
        $user = [
            'username' => $request->username,
            'email' => $request->email,
            'nip' => $request->nip,
            'password' => $request->password,
            'token' => $request->token,
        ];
        Token::whereId($id)->update($user);
        return back()->with('success', 'User berhasil di Ubah');
    }


    public function user_destroy($id)
    {
        $user = Token::findorfail($id);
        $user->delete();
        return back()->with('success', 'User berhasil diHapus');
    }


    public function web_index()
    {
        $web = Website::all();
        $token = Token::all();
        return view('master/website_index', compact('web', 'token'));
    }


    public function web_store(Request $request)
    {
        $request->validate([
            'nama_web' => 'required',
            'token_id' => 'required',
            'link_web' => 'required',
            'status_web' => 'required',
        ]);
        $web = Website::create([
            'nama_web' => $request->nama_web,
            'token_id' => $request->token_id,
            'link_web' => $request->link_web,
            'status_web' => $request->status_web,
        ]);
        return back()->with('success', 'Website berhasil di Tambah');
    }


    public function web_update(Request $request, $id)
    {
        $request->validate([
            'nama_web' => 'required',
            'token_id' => 'required',
            'link_web' => 'required',
            'status_web' => 'required',
        ]);
        $web = [
            'nama_web' => $request->nama_web,
            'token_id' => $request->token_id,
            'link_web' => $request->link_web,
            'status_web' => $request->status_web,
        ];
        Website::whereId($id)->update($web);
        return back()->with('success', 'Website berhasil di Ubah');
    }


    public function web_destroy($id)
    {
        $web = Website::findorfail($id);
        $web->delete();
        return back()->with('success', 'Website berhasil diHapus');
    }
}
