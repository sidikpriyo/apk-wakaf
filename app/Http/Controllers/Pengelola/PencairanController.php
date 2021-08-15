<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\PencairanRequest;
use App\Models\Kampanye;
use App\Models\Lembaga;
use App\Models\Pencairan;
use Exception;
use Illuminate\Http\Request;

class PencairanController extends Controller
{
    public function index()
    {
        return view('pengelola.pencairan.index');
    }

    public function show(Pencairan $pencairan)
    {
        return view('pengelola.pencairan.show', [
            'pencairan' => $pencairan
        ]);
    }

    public function edit(Pencairan $pencairan)
    {
        $user_id = $pencairan->kampanye->lembaga_id;
        $lembaga = Lembaga::where('user_id', $user_id)->first();

        return view('pengelola.pencairan.edit', [
            'pencairan' => $pencairan,
            'lembaga' => $lembaga,
        ]);
    }

    public function update(PencairanRequest $request, Pencairan $pencairan)
    {
        if (!is_null($pencairan->completed_at)) {
            throw new Exception('Sudah selesai diproses');
        }

        $request->merge([
            'completed_at' => now()
        ]);

        $pencairan->update($request->all());

        Kampanye::find($pencairan->kampanye_id)->increment('dicairkan', $pencairan->nominal);

        return redirect()->route('pencairan-pengelola.index');
    }

    public function destroy(Pencairan $pencairan)
    {
        $pencairan->delete();

        return redirect()->route('pengelola-pencairan.index');
    }
}
