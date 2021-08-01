<?php

namespace App\Listeners;

use App\Events\KampanyeDipublikasi;
use App\Models\User;
use App\Notifications\KampanyeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class KirimNotifikasiLembaga implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(KampanyeDipublikasi $event)
    {
        try {
            $kampanye = $event->kampanye;
            $lembaga = User::find($kampanye->lembaga_id);
            $lembaga->notify(new KampanyeNotification('Persetujuan Publikasi', 'Kampanye yang anda ajukan telah disetujui', $kampanye->id));
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
        }
    }
}
