<?php

namespace App\Jobs\Pengelola;

use App\Models\User;
use App\Notifications\KampanyeNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifikasiKampanyeJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $lembaga;
    public $kampanye;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($lembaga, $kampanye)
    {
        $this->lembaga = $lembaga;
        $this->kampanye = $kampanye;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $lembaga = $this->lembaga;
        $kampanye = $this->kampanye;

        $pengelola = User::pengelola()->first();
        $pengelola->notify(new KampanyeNotification('Pengajuan Kampanye', $lembaga->name . ' mengajukan proposal penggalangan dana.', $kampanye->id));
    }
}
