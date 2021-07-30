<?php

namespace App\Http\Controllers\Lembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index()
    {
        return view('lembaga.profil.index');
    }

    public function show()
    {
        return view('lembaga.profil.show');
    }

    public function store()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
