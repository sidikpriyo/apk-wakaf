<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\RekeningDonasi;
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

    public function pembayaran(Donasi $donasi)
    {
        $rekening = RekeningDonasi::selectRaw('rekening.nama as nama, rekening.nomor as nomor, bank.nama as bank')->join('rekening', 'rekening.id', 'rekening_donasi.rekening_id')->join('bank', 'bank.id', 'rekening.bank_id')->where('donasi_id', $donasi->id)->first();
        return view('donatur.donasi.pembayaran', [
            'donasi' => $donasi,
            'rekening' => $rekening,
        ]);
    }
}
