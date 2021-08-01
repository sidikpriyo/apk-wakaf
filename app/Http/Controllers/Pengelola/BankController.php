<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        return view('pengelola.bank.index');
    }

    public function create()
    {
        return view('pengelola.bank.create');
    }

    public function show(Bank $bank)
    {
        return view('pengelola.bank.show', [
            'bank' => $bank
        ]);
    }

    public function edit(Bank $bank)
    {
        return view('pengelola.bank.edit', [
            'bank' => $bank
        ]);
    }

    public function update(BankRequest $request, Bank $bank)
    {
        $bank->update($request->all());

        return redirect()->back();
    }

    public function store(BankRequest $request)
    {
        Bank::create($request->all());

        return redirect()->route('bank.index');
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->route('bank.index');
    }
}
