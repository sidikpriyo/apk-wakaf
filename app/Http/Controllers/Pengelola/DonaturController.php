<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function show()
    {
        return view('pengelola.donatur.show');
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->back();
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->to('donatur.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->to('donatur.index');
    }
}
