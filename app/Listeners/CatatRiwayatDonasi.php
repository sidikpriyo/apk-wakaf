<?php

namespace App\Listeners;

use App\Events\DonasiDikonfirmasi;
use App\Models\RiwayatDonasi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CatatRiwayatDonasi implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(DonasiDikonfirmasi $event)
    {
        try {
            RiwayatDonasi::create([
                'status_pembayaran_id' => $event->donasi->status_pembayaran_id,
                'donasi_id' => $event->donasi->id,
            ]);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
        }
    }
}
