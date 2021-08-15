<?php

namespace App\Http\Controllers\Lembaga;

use App\Http\Controllers\Controller;
use App\Models\Pencairan;
use Illuminate\Http\Request;

class PencairanController extends Controller
{
    public function index()
    {
        return view('lembaga.pencairan.index');
    }

    public function show(Pencairan $pencairan)
    {
        return view('lembaga.pencairan.show', [
            'pencairan' => $pencairan
        ]);
    }
}
