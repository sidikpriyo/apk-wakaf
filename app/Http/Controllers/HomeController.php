<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        //Init
        $kategori_id = $request->get('kategori');
        $search = $request->get('search');

        $kategori = Kategori::get(['id', 'nama']);
        $kampanye = Kampanye::when($kategori_id, function ($query) use ($kategori_id) {
            $query->where('kategori_id', $kategori_id);
        })->when($search, function ($query) use ($search) {
            $query->where('nama', 'LIKE', "%" . $search . "%");
        })->aktif()->paginate(6);

        return view('home.index', [
            'kampanye' => $kampanye,
            'kategori' => $kategori,
            'search' => $search
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
        $notifikasi = [];
        $type = 'unread';

        switch ($request->get('type')) {
            case 'all':
                $notifikasi = $user->notifications()->paginate();
                $type = 'all';
                break;
            case 'unread':
                $notifikasi = $user->unreadNotifications()->paginate();
                $type = 'unread';
                break;
            default:
                $notifikasi = $user->unreadNotifications()->paginate();
                $type = 'unread';
                break;
        }

        return view('notifikasi.index', [
            'notifikasi' => $notifikasi,
            'type' => $type,
            'user' => $user,
        ]);
    }

    public function buka($id)
    {
        $user = User::find(auth()->id());
        $notifikasi = $user->notifications()->find($id);
        if (!$notifikasi) {
            abort(404);
        }

        if (is_null($notifikasi->read_at)) {
            $notifikasi->markAsRead();
        }

        $link = '/';
        switch ($notifikasi->data['type']) {
            case 'kampanye':
                $link = $user->role === 'lembaga' ? route('lembaga-kampanye.show', ['kampanye' => $notifikasi->data['external_id']]) : route('pengelola-kampanye.show', ['kampanye' => $notifikasi->data['external_id']]);
                break;

            case 'donasi':
                $link = route('donatur-donasi.show', ['donasi' => $notifikasi->data['external_id']]);
                break;

            default:
                # code...
                break;
        }

        return redirect()->to($link);
    }
}
