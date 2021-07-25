<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\MetodePembayaranRequest;
use App\Models\JenisPembayaran;
use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        return view('pengelola.metode-pembayaran.index');
    }

    public function create()
    {
        $jenis_pembayaran = JenisPembayaran::get(['id', 'nama']);

        return view('pengelola.metode-pembayaran.create', [
            'jenis_pembayaran' => $jenis_pembayaran
        ]);
    }

    public function show(MetodePembayaran $metode_pembayaran)
    {
        return view('pengelola.metode-pembayaran.show', [
            'metode_pembayaran' => $metode_pembayaran
        ]);
    }

    public function edit(MetodePembayaran $metode_pembayaran)
    {
        $jenis_pembayaran = JenisPembayaran::get(['id', 'nama']);

        return view('pengelola.metode-pembayaran.edit', [
            'metode_pembayaran' => $metode_pembayaran,
            'jenis_pembayaran' => $jenis_pembayaran
        ]);
    }

    public function update(MetodePembayaranRequest $request, MetodePembayaran $metode_pembayaran)
    {
        $metode_pembayaran->update($request->all());

        return redirect()->back();
    }

    public function store(MetodePembayaranRequest $request)
    {
        MetodePembayaran::create($request->all());

        return redirect()->route('metode-pembayaran.index');
    }

    public function destroy(MetodePembayaran $metode_pembayaran)
    {
        $metode_pembayaran->delete();

        return redirect()->route('metode-pembayaran.index');
    }
}
