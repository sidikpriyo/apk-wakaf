<?php

namespace App\Http\Controllers\API;

use App\Events\DonasiEvent;
use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\StatusPembayaran;
use Illuminate\Http\Request;

class NotifikasiPembayaranController extends Controller
{
    public function api(Request $request)
    {
        try {
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$serverKey = config('app.mitrans');
            $notif = new \Midtrans\Notification();

            $transaction = $notif->transaction_status;
            $donasi_id = $notif->order_id;

            $donasi = tap(Donasi::find($donasi_id))->update([
                'status_pembayaran_id' => $this->getStatusPembayaran($transaction)
            ]);

            event(new DonasiEvent($donasi));
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 400);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menerima update'
        ], 200);
    }

    private function getStatusPembayaran($kode)
    {
        return StatusPembayaran::where('kode', $kode)->value('id');
    }
}
