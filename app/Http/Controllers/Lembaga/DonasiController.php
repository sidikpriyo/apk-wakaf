<?php

namespace App\Http\Controllers\Lembaga;

use App\Events\DonasiEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonasiRequest;
use App\Jobs\DonasiJobs;
use App\Models\Donasi;
use App\Models\Kampanye;
use App\Models\User;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        return view('lembaga.donasi.index');
    }

    public function create()
    {
        // Init Data
        $kampanye = Kampanye::where('lembaga_id', auth()->id())->get(['id', 'nama']);
        $donatur = User::donatur()->get(['id', 'name']);

        return view('lembaga.donasi.create', [
            'kampanye' => $kampanye,
            'donatur' => $donatur,
        ]);
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

    public function edit(Donasi $donasi)
    {
        if ($donasi->kampanye()->first()->lembaga_id !== auth()->id()) {
            return redirect()->route('lembaga-kampanye.index');
        }

        // Init Data
        $kampanye = Kampanye::where('lembaga_id', auth()->id())->get(['id', 'nama']);
        $donatur = User::donatur()->get(['id', 'name']);

        return view('lembaga.donasi.edit', [
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

        return redirect()->route('lembaga-donasi.index');
    }

    public function destroy(Donasi $donasi)
    {
        $donasi->delete();

        return redirect()->route('lembaga-donasi.index');
    }
}
