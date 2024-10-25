<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required']);
        Kategori::create($request->all());
        return redirect()->route('kategori.index');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama' => 'required']);
        Kategori::find($id)->update($request->all());
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect()->route('kategori.index');
    }
}
