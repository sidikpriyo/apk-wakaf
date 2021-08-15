<?php

namespace App\Jobs;

use App\Models\Riwayat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class RiwayatDonasiJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $donatur_id;
    private $kategori_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($donatur_id, $kategori_id)
    {
        $this->donatur_id = $donatur_id;
        $this->kategori_id = $kategori_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $riwayat = Riwayat::firstOrCreate([
                'donatur_id' => $this->donatur_id,
                'kategori_id' => $this->kategori_id,
            ]);

            $riwayat->increment('donasi');
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
        }
    }
}
