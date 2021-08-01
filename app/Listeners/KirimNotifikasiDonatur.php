<?php

namespace App\Listeners;

use App\Events\DonasiEvent;
use App\Models\MetodePembayaran;
use App\Models\StatusPembayaran;
use App\Models\User;
use App\Notifications\DonasiNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class KirimNotifikasiDonatur implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(DonasiEvent $event)
    {
        try {
            $donasi = $event->donasi;
            $status_pembayaran = StatusPembayaran::where('id', $donasi->status_pembayaran_id)->value('nama');
            $metode_pembayaran = MetodePembayaran::where('id', $donasi->pembayaran_id)->value('nama');

            // Kirim Notifikasi
            $donatur = User::find($donasi->donatur_id);
            $donatur->notify(new DonasiNotification($status_pembayaran, 'Donasi sebesar Rp ' . number_format($donasi->nominal) . ' dengan metode ' . $metode_pembayaran, $donasi->id));
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
        }
    }
}
