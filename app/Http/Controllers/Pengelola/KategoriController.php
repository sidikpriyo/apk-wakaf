<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('pengelola.kategori.index');
    }

    public function create()
    {
        return view('pengelola.kategori.create');
    }

    public function show(Kategori $kategori)
    {
        return view('pengelola.kategori.show', [
            'kategori' => $kategori
        ]);
    }

    public function edit(Kategori $kategori)
    {
        return view('pengelola.kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $kategori->update($request->all());

        return redirect()->back();
    }

    public function store(KategoriRequest $request)
    {
        Kategori::create($request->all());

        return redirect()->route('kategori.index');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index');
    }
}
