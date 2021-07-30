<?php

namespace App\Http\Controllers\Lembaga;

use App\Http\Controllers\Controller;
use App\Models\Lembaga;
use App\Models\User;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $lembaga = Lembaga::where('user_id', $user->id)->first();

        return view('lembaga.profil.index', [
            'profil' => $user,
            'lembaga' => $lembaga
        ]);
    }

    public function edit()
    {
        $user = auth()->user();
        return view('lembaga.profil.edit', [
            'profil' => $user
        ]);
    }

    public function update(User $profil, Request $request)
    {
        $profil->update($request->all());

        return redirect()->route('lembaga-profil.index');
    }

    public function store(Request $request)
    {
        Lembaga::where('user_id', auth()->id())->update($request->except(['_token']));
        return redirect()->route('lembaga-profil.index');
    }

    public function lembaga(User $profil, Lembaga $lembaga)
    {
        if ($profil->id !== $lembaga->user_id) {
            abort(404);
        }

        return view('lembaga.profil.lembaga', [
            'lembaga' => $lembaga
        ]);
    }
}
