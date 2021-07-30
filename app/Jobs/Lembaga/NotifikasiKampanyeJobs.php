<?php

namespace App\Jobs\Lembaga;

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

    public $kampanye;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($kampanye)
    {
        $this->kampanye = $kampanye;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $kampanye = $this->kampanye;
        $lembaga = User::find($kampanye->lembaga_id);
        $lembaga->notify(new KampanyeNotification('Persetujuan Publikasi', 'Kampanye yang anda ajukan telah disetujui', $kampanye->id));
    }
}
