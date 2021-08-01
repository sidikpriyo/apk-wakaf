<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\RekeningRequest;
use App\Models\Bank;
use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    public function index()
    {
        return view('pengelola.rekening.index');
    }

    public function create()
    {
        $bank = Bank::select('id', 'nama')->get();

        return view('pengelola.rekening.create', [
            'bank' => $bank,
        ]);
    }

    public function show(Rekening $rekening)
    {
        return view('pengelola.rekening.show', [
            'rekening' => $rekening
        ]);
    }

    public function edit(Rekening $rekening)
    {
        $bank = Bank::select('id', 'nama')->get();

        return view('pengelola.rekening.edit', [
            'bank' => $bank,
            'rekening' => $rekening
        ]);
    }

    public function update(RekeningRequest $request, Rekening $rekening)
    {
        $rekening->update($request->all());

        return redirect()->back();
    }

    public function store(RekeningRequest $request)
    {
        Rekening::create($request->all());

        return redirect()->route('rekening.index');
    }

    public function destroy(Rekening $rekening)
    {
        $rekening->delete();

        return redirect()->route('rekening.index');
    }
}
