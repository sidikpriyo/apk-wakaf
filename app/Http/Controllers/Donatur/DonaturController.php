<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('donatur.profil.index', [
            'profil' => $user
        ]);
    }

    public function edit()
    {
        $user = auth()->user();
        return view('donatur.profil.edit', [
            'profil' => $user
        ]);
    }

    public function update(User $profil, Request $request)
    {
        $profil->update($request->all());

        return redirect()->route('donatur-profil.index');
    }
}
