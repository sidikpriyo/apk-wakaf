<?php

namespace App\Http\Controllers\Pengelola;

use App\Events\KampanyeDibuat;
use App\Events\KampanyeDipublikasi;
use App\Http\Controllers\Controller;
use App\Http\Requests\KampanyeRequest;
use App\Models\Kampanye;
use App\Models\Kategori;
use App\Models\User;

class KampanyeController extends Controller
{
    public function index()
    {
        return view('pengelola.kampanye.index');
    }

    public function create()
    {
        // Init Data
        $lembaga = User::lembaga()->get(['id', 'name']);
        $kategori = Kategori::get(['id', 'nama']);

        return view('pengelola.kampanye.create', [
            'lembaga' => $lembaga,
            'kategori' => $kategori,
        ]);
    }

    public function show(Kampanye $kampanye)
    {
        return view('pengelola.kampanye.show', [
            'kampanye' => $kampanye
        ]);
    }

    public function edit(Kampanye $kampanye)
    {
        // Init Data
        $lembaga = User::lembaga()->get(['id', 'name']);
        $kategori = Kategori::get(['id', 'nama']);

        return view('pengelola.kampanye.edit', [
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
                'lembaga_id',
                'kategori_id',
            ]);

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
        $data = $request->only([
            'nama',
            'keterangan',
            'deskripsi',
            'kebutuhan',
            'tanggal_berakhir',
            'lembaga_id',
            'kategori_id',
        ]);

        $path = $request->file('gambar')->storePubliclyAs(
            'kampanye',
            $request->user()->id . "-" . time(),
            'public'
        );

        $data = array_merge([
            'gambar' => $path
        ], $data);

        $kampanye = Kampanye::create($data);
        event(new KampanyeDibuat($kampanye));

        return redirect()->route('pengelola-kampanye.index');
    }

    public function destroy(Kampanye $kampanye)
    {
        $kampanye->delete();

        return redirect()->route('pengelola-kampanye.index');
    }

    public function publikasi(Kampanye $kampanye)
    {
        if (!is_null($kampanye->tanggal_publikasi)) {
            abort(404, 'Kampanye sudah dipublikasi');
        }


        $kampanye->update([
            'tanggal_publikasi' => now()
        ]);

        event(new KampanyeDipublikasi($kampanye));

        return redirect()->route('pengelola-kampanye.index');
    }
}
