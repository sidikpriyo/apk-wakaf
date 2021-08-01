<?php

namespace App\Listeners;

use App\Events\KampanyeDibuat;
use App\Models\User;
use App\Notifications\KampanyeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class KirimNotifikasiPengelola implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(KampanyeDibuat $event)
    {
        try {
            $kampanye = $event->kampanye;
            $lembaga = User::find($kampanye->lembaga_id);

            $pengelola = User::pengelola()->first();
            $pengelola->notify(new KampanyeNotification('Pengajuan Kampanye', $lembaga->name . ' mengajukan proposal penggalangan dana.', $kampanye->id));
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
        }
    }
}
