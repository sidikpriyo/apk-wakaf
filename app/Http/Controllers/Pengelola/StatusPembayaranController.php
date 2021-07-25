<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusPembayaranRequest;
use App\Models\StatusPembayaran;
use Illuminate\Http\Request;

class StatusPembayaranController extends Controller
{
    public function index()
    {
        return view('pengelola.status-pembayaran.index');
    }

    public function create()
    {
        return view('pengelola.status-pembayaran.create');
    }

    public function show(StatusPembayaran $status_pembayaran)
    {
        return view('pengelola.status-pembayaran.show', [
            'status_pembayaran' => $status_pembayaran
        ]);
    }

    public function edit(StatusPembayaran $status_pembayaran)
    {
        return view('pengelola.status-pembayaran.edit', [
            'status_pembayaran' => $status_pembayaran
        ]);
    }

    public function update(StatusPembayaranRequest $request, StatusPembayaran $status_pembayaran)
    {
        $status_pembayaran->update($request->all());

        return redirect()->back();
    }

    public function store(StatusPembayaranRequest $request)
    {
        StatusPembayaran::create($request->all());

        return redirect()->route('status-pembayaran.index');
    }

    public function destroy(StatusPembayaran $status_pembayaran)
    {
        $status_pembayaran->delete();

        return redirect()->route('status-pembayaran.index');
    }
}
