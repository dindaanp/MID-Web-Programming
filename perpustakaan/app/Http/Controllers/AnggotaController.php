<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required', 'alamat' => 'required', 'telepon' => 'required']);
        Anggota::create($request->all());
        return redirect()->route('anggota.index');
    }

    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama' => 'required', 'alamat' => 'required', 'telepon' => 'required']);
        Anggota::find($id)->update($request->all());
        return redirect()->route('anggota.index');
    }

    public function destroy($id)
    {
        Anggota::destroy($id);
        return redirect()->route('anggota.index');
    }

    public function history($id)
    {
        $anggota = Anggota::findOrFail($id);
        $peminjaman = $anggota->peminjaman()->with('buku')->get();

        return view('anggota.history', compact('anggota', 'peminjaman'));
    }
}
