<?php

namespace App\Http\Controllers\Lembaga;

use App\Http\Controllers\Controller;
use App\Http\Requests\KampanyeRequest;
use App\Models\Kampanye;
use App\Models\Kategori;
use App\Models\User;
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

            $path = $request->file('gambar')->storePubliclyAs(
                'kampanye',
                $request->user()->id . "-" . time(),
                'public'
            );

            $data = array_merge([
                'gambar' => $path
            ], $data);

            Kampanye::create($data);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('lembaga-kampanye.index');
    }

    public function destroy(Kampanye $kampanye)
    {

        // Check if active
        if (!is_null($kampanye->tanggal_publikasi)) {
            abort(400, 'Kampanye aktif tidak bisa dihapus');
        }

        $kampanye->delete();

        return redirect()->route('lembaga-kampanye.index');
    }
}
