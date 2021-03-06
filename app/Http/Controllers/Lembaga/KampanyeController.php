<?php

namespace App\Http\Controllers\Lembaga;

use App\Events\KampanyeDibuat;
use App\Http\Controllers\Controller;
use App\Http\Requests\KampanyeRequest;
use App\Models\Kampanye;
use App\Models\Kategori;
use App\Models\Laporan;
use App\Models\Pencairan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class KampanyeController extends Controller
{
    public function index()
    {
        return view('lembaga.kampanye.index');
    }

    public function create()
    {
        $kategori = Kategori::get(['id', 'nama']);

        return view('lembaga.kampanye.create', [
            'kategori' => $kategori,
        ]);
    }

    public function show(Kampanye $kampanye)
    {
        if ($kampanye->lembaga_id !== auth()->id()) {
            return redirect()->route('lembaga-kampanye.index');
        }

        return view('lembaga.kampanye.show', [
            'kampanye' => $kampanye
        ]);
    }

    public function edit(Kampanye $kampanye)
    {
        if ($kampanye->lembaga_id !== auth()->id()) {
            return redirect()->route('lembaga-kampanye.index');
        }

        if (!is_null($kampanye->tanggal_publikasi)) {
            abort(404);
        }

        // Init Data
        $lembaga = User::lembaga()->get(['id', 'name']);
        $kategori = Kategori::get(['id', 'nama']);

        return view('lembaga.kampanye.edit', [
            'kampanye' => $kampanye,
            'lembaga' => $lembaga,
            'kategori' => $kategori,
        ]);
    }

    public function update(KampanyeRequest $request, Kampanye $kampanye)
    {
        try {
            $data = $request->only([
                'nama',
                'keterangan',
                'deskripsi',
                'kebutuhan',
                'tanggal_berakhir',
                'kategori_id',
            ]);

            $data = array_merge([
                'lembaga_id' => auth()->id()
            ], $data);

            if ($request->file('gambar')) {
                $path = $request->file('gambar')->storePubliclyAs(
                    'kampanye',
                    $request->user()->id . "-" . time(),
                    'public'
                );

                $data = array_merge([
                    'gambar' => $path
                ], $data);
            }

            $kampanye->update($data);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->back();
    }

    public function store(KampanyeRequest $request)
    {
        $lembaga = auth()->user();
        $data = $request->only([
            'nama',
            'keterangan',
            'deskripsi',
            'kebutuhan',
            'tanggal_berakhir',
            'kategori_id',
        ]);

        $path = $request->file('gambar')->storePubliclyAs(
            'kampanye',
            $lembaga->id . "-" . time(),
            'public'
        );

        $data = array_merge([
            'lembaga_id' => $lembaga->id,
            'gambar' => $path
        ], $data);

        $kampanye = Kampanye::create($data);
        event(new KampanyeDibuat($kampanye));

        return redirect()->route('lembaga-kampanye.index');
    }

    public function destroy(Kampanye $kampanye)
    {

        // Check if active
        if (!is_null($kampanye->tanggal_publikasi)) {
            abort(404);
        }

        $kampanye->delete();

        return redirect()->route('lembaga-kampanye.index');
    }

    public function pencairan(Kampanye $kampanye)
    {

        if ($kampanye->dicairkan >= $kampanye->terkumpul) {
            throw new Exception("Tidak ada dana yang perlu dicairkan");
        }

        $count = Pencairan::where('kampanye_id', $kampanye->id)->menunggu()->count();
        if ($count > 0) {
            throw new Exception("Pengajuan pencairan masih dalam proses");
        }

        $nominal = $kampanye->terkumpul - $kampanye->dicairkan;
        Pencairan::create([
            'kampanye_id' => $kampanye->id,
            'nominal' => $nominal
        ]);

        return redirect()->back();
    }

    public function laporan(Kampanye $kampanye)
    {
        return view('lembaga.kampanye.laporan', [
            'kampanye' => $kampanye
        ]);
    }

    public function storeLaporan(Kampanye $kampanye, Request $request)
    {
        Laporan::create([
            'kampanye_id' => $kampanye->id,
            'body' => $request->get('body')
        ]);

        return redirect()->route('lembaga-kampanye.index');
    }
}
