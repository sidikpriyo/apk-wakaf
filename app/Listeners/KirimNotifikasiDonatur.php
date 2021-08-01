<?php

namespace App\Listeners;

use App\Events\DonasiDikonfirmasi;
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
    public function handle(DonasiDikonfirmasi $event)
    {
        try {
            $donasi = $event->donasi;
            // $donatur = User::find($donasi->donatur_id);
            // $donatur->notify(new DonasiNotification())
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
        }
    }
}
