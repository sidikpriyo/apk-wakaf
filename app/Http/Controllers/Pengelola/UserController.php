<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function donatur(Request $request)
    {
        return view('user.donatur');
    }

    public function lembaga(Request $request)
    {
        return view('user.lembaga');
    }
}
