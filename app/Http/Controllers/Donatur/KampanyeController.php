<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\Kampanye;
use App\Models\MetodePembayaran;
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
        }])->withCount(['donasi'])->findOrFail($id);

        return view('donatur.kampanye.show', [
            'kampanye' => $kampanye
        ]);
    }

    public function wakaf(Kampanye $kampanye)
    {
        $pembayaran = MetodePembayaran::selectRaw('pembayaran.id, pembayaran.nama, pembayaran.kode, jenis_pembayaran.kode as jenis_pembayaran')->join('jenis_pembayaran', 'jenis_pembayaran.id', 'pembayaran.jenis_pembayaran_id')->get()->toArray();
        $metode_pembayaran = $this->array_group_by($pembayaran, function ($item) {
            return $item['jenis_pembayaran'];
        });

        dd($metode_pembayaran);

        return view('donatur.kampanye.wakaf', [
            'kampanye' => $kampanye,
            'pembayaran' => $metode_pembayaran,
        ]);
    }

    private function array_group_by(array $arr, callable $key_selector)
    {
        $result = array();
        foreach ($arr as $i) {
            $key = call_user_func($key_selector, $i);
            $result[$key][] = $i;
        }
        return $result;
    }
}
