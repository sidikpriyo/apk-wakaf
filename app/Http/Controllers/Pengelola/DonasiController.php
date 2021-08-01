<?php

namespace App\Http\Controllers\Pengelola;

use App\Events\DonasiDibuat;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonasiRequest;
use App\Models\Donasi;
use App\Models\Kampanye;
use App\Models\User;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        return view('pengelola.donasi.index');
    }

    public function create()
    {
        // Init Data
        $kampanye = Kampanye::get(['id', 'nama']);
        $donatur = User::donatur()->get(['id', 'name']);

        return view('pengelola.donasi.create', [
            'kampanye' => $kampanye,
            'donatur' => $donatur,
        ]);
    }

    public function show(Donasi $donasi)
    {
        return view('pengelola.donasi.show', [
            'donasi' => $donasi
        ]);
    }

    public function edit(Donasi $donasi)
    {
        // Init Data
        $kampanye = Kampanye::get(['id', 'nama']);
        $donatur = User::donatur()->get(['id', 'name']);

        return view('pengelola.donasi.edit', [
            'donasi' => $donasi,
            'kampanye' => $kampanye,
            'donatur' => $donatur,
        ]);
    }

    public function update(DonasiRequest $request, Donasi $donasi)
    {
        $donasi->update($request->all());

        return redirect()->back();
    }

    public function store(DonasiRequest $request)
    {
        $donasi = Donasi::create($request->all());
        event(new DonasiDibuat($donasi));

        return redirect()->route('pengelola-donasi.index');
    }

    public function destroy(Donasi $donasi)
    {
        $donasi->delete();

        return redirect()->route('pengelola-donasi.index');
    }
}
