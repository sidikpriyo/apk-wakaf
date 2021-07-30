<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\LembagaRequest;
use App\Models\Lembaga;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LembagaController extends Controller
{
    public function index()
    {
        return view('pengelola.lembaga.index');
    }

    public function create()
    {
        return view('pengelola.lembaga.create');
    }

    public function show(User $lembaga)
    {
        return view('pengelola.lembaga.show', [
            'lembaga' => $lembaga
        ]);
    }

    public function edit(User $lembaga)
    {
        return view('pengelola.lembaga.edit', [
            'lembaga' => $lembaga
        ]);
    }

    public function update(LembagaRequest $request, User $lembaga)
    {
        $lembaga->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back();
    }

    public function store(LembagaRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'lembaga'
        ]);

        // event(new Registered($user));

        Lembaga::create([
            'nama' => $request->name,
            'user_id' => $user->id
        ]);

        return redirect()->route('lembaga.index');
    }

    public function destroy(User $lembaga)
    {
        $lembaga->delete();

        return redirect()->route('lembaga.index');
    }
}
