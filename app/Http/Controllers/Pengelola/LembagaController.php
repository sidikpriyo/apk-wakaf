<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index()
    {
        return view('pengelola.lembaga.index');
    }
}
