<?php

namespace App\Http\Controllers\Lembaga;

use App\Http\Controllers\Controller;
use App\Models\Donasi;

class DonasiController extends Controller
{
    public function index()
    {
        return view('lembaga.donasi.index');
    }

    public function show(Donasi $donasi)
    {
        if ($donasi->kampanye()->first()->lembaga_id !== auth()->id()) {
            return redirect()->route('lembaga-kampanye.index');
        }

        return view('lembaga.donasi.show', [
            'donasi' => $donasi
        ]);
    }
}
