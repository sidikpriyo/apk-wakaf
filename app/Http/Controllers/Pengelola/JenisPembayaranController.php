<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\JenisPembayaranRequest;
use App\Models\JenisPembayaran;
use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    public function index()
    {
        return view('pengelola.jenis-pembayaran.index');
    }

    public function create()
    {
        return view('pengelola.jenis-pembayaran.create');
    }

    public function show(JenisPembayaran $jenis_pembayaran)
    {
        return view('pengelola.jenis-pembayaran.show', [
            'jenis_pembayaran' => $jenis_pembayaran
        ]);
    }

    public function edit(JenisPembayaran $jenis_pembayaran)
    {
        return view('pengelola.jenis-pembayaran.edit', [
            'jenis_pembayaran' => $jenis_pembayaran
        ]);
    }

    public function update(JenisPembayaranRequest $request, JenisPembayaran $jenis_pembayaran)
    {
        $jenis_pembayaran->update($request->all());

        return redirect()->back();
    }

    public function store(JenisPembayaranRequest $request)
    {
        JenisPembayaran::create($request->all());

        return redirect()->route('jenis-pembayaran.index');
    }

    public function destroy(JenisPembayaran $jenis_pembayaran)
    {
        $jenis_pembayaran->delete();

        return redirect()->route('jenis-pembayaran.index');
    }
}
