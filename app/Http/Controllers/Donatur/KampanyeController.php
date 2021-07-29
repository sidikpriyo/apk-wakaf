<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\Kampanye;
use Illuminate\Http\Request;

class KampanyeController extends Controller
{
    public function index()
    {
        $kampanye = Kampanye::aktif()->paginate(6);
        return view('donatur.kampanye.index', [
            'kampanye' => $kampanye
        ]);
    }

    public function show($id)
    {
        $kampanye = Kampanye::with(['lembaga:id,name', 'donasi' => function ($query) {
            $query->selectRaw('donasi.id, donasi.kampanye_id, donasi.nominal, users.name')->join('users', 'donasi.donatur_id', 'users.id');
        }])->findOrFail($id);

        return view('donatur.kampanye.show', [
            'kampanye' => $kampanye
        ]);
    }
}
