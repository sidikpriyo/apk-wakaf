<?php

namespace App\Http\Controllers\Pengelola;

use App\Events\DonasiEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonasiRequest;
use App\Jobs\DonasiJobs;
use App\Models\Donasi;
use App\Models\Kampanye;
use App\Models\MetodePembayaran;
use App\Models\RekeningDonasi;
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

        return view('pengelola.donasi.show', $data);
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
        event(new DonasiEvent($donasi));

        DonasiJobs::dispatch($donasi);

        return redirect()->route('pengelola-donasi.index');
    }

    public function destroy(Donasi $donasi)
    {
        $donasi->delete();

        return redirect()->route('pengelola-donasi.index');
    }

    public function verifikasi(Donasi $donasi)
    {
        if (!is_null($donasi->completed_at) || !is_null($donasi->expired_at)) {
            abort(404);
        }

        $donasi->update([
            'status_pembayaran_id' => 2,
            'completed_at' => now()
        ]);

        event(new DonasiEvent($donasi));

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
