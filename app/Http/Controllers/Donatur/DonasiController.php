<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        return view('donatur.donasi.index');
    }

    public function show(Donasi $donasi)
    {
        if ($donasi->donatur_id !== auth()->id()) {
            return redirect()->route('donatur-kampanye.index');
        }

        return view('donatur.donasi.show', [
            'donasi' => $donasi
        ]);
    }
}
