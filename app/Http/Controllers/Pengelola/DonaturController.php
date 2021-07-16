<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonaturRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DonaturController extends Controller
{
    public function index()
    {
        return view('pengelola.donatur.index');
    }

    public function create()
    {
        return view('pengelola.donatur.create');
    }

    public function show(User $donatur)
    {
        return view('pengelola.donatur.show', [
            'donatur' => $donatur
        ]);
    }

    public function edit(User $donatur)
    {
        return view('pengelola.donatur.edit', [
            'donatur' => $donatur
        ]);
    }

    public function update(DonaturRequest $request, User $donatur)
    {
        $donatur->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back();
    }

    public function store(DonaturRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        return redirect()->route('donatur.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('donatur.index');
    }
}
