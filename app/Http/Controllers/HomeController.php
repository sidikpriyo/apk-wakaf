<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $kampanye = Kampanye::aktif()->paginate(6);

        return view('home.index', [
            'kampanye' => $kampanye
        ]);
    }

    public function dashboard(Request $request)
    {
        return view('dashboard.index');
    }

    public function pengaturan(Request $request)
    {
        return view('pengaturan.index');
    }

    public function notifikasi(Request $request)
    {
        $user = User::find(auth()->id());
        $notifikasi = $user->notifications();

        return view('notifikasi.index', [
            'notifikasi' => $notifikasi
        ]);
    }
}
