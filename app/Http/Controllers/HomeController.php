<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        return view('home.index');
    }

    public function dashboard(Request $request)
    {
        return view('dashboard.index');
    }

    public function setting(Request $request)
    {
        return view('setting.index');
    }
}
