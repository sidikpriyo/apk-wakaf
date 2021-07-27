<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $kampanye = Kampanye::paginate(6);

        return view('home.index', [
            'kampanye' => $kampanye
        ]);
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
