<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Models\Theme\footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        return view('theme.footer.index', ['list_footer' => auth()->user()->footer]);
    }
    public function create()
    {
        return view('theme.footer.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'posisi' => 'required',
        ]);

        $footer = new footer();
        $footer->user_id = auth()->user()->id;
        $footer->nama = Request('nama');
        $footer->alamat = Request('alamat');
        $footer->telepon = Request('telepon');
        $footer->email = Request('email');
        $footer->posisi = Request('posisi');
        $footer->save();
        // dd($footer);

        return redirect('footer')->with('success', 'berhasil menambahkan postingan baru');
    }
    public function show(footer $footer)
    {
        $data['footer'] = $footer;
        return view('theme.footer.show', $data);
    }

    public function edit(footer $footer)
    {
        $data['footer'] = $footer;
        return view('theme.footer.edit', $data);
    }

    public function update(Request $request, footer $footer)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
        ]);

        $footer->user_id = auth()->user()->id;
        $footer->nama = Request('nama');
        $footer->alamat = Request('alamat');
        $footer->telepon = Request('telepon');
        $footer->email = Request('email');
        if (request('posisi')) $footer->posisi = Request('posisi');
        $footer->save();

        return redirect('footer')->with('warning', 'berhasil edit alamat');
    }

    public function destroy(footer $footer)
    {
        $footer->delete();
        return redirect('danger', 'berhasil delete alamat');
    }
}
