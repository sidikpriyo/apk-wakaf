<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\MetodePembayaran;
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
        $metode = $this->getMetodePembayaran($donasi->pembayaran_id);
        $data = [
            'donasi' => $donasi,
            'metode' => $metode,
        ];

        switch ($metode) {
            case 'transfer':
                $rekening = $this->getRekening($donasi->id);
                $data = array_merge([
                    'rekening' => $rekening
                ], $data);
                break;

            case 'gateway':

                break;

            default:
                # code...
                break;
        }

        return view('donatur.donasi.pembayaran', $data);
    }

    public function bukti(Donasi $donasi, Request $request)
    {
        if ($request->file('bukti')) {
            $path = $request->file('bukti')->storePubliclyAs(
                'bukti',
                $donasi->id . "-" . time(),
                'public'
            );

            RekeningDonasi::where('donasi_id', $donasi->id)->update([
                'bukti' => $path
            ]);
        }

        return redirect()->back();
    }

    private function getMetodePembayaran($pembayaran_id)
    {
        return MetodePembayaran::join('jenis_pembayaran', 'jenis_pembayaran.id', 'pembayaran.jenis_pembayaran_id')->where('pembayaran.id', $pembayaran_id)->value('jenis_pembayaran.kode');
    }

    private function getRekening($donasi_id)
    {
        return RekeningDonasi::selectRaw('rekening.nama as nama, rekening.nomor as nomor, bank.nama as bank, rekening_donasi.bukti')->join('rekening', 'rekening.id', 'rekening_donasi.rekening_id')->join('bank', 'bank.id', 'rekening.bank_id')->where('donasi_id', $donasi_id)->first();
    }
}
