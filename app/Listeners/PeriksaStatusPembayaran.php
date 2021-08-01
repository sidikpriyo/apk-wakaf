<?php

namespace App\Listeners;

use App\Events\DonasiDikonfirmasi;
use App\Models\Kampanye;
use App\Models\StatusPembayaran;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class PeriksaStatusPembayaran implements ShouldQueue
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
            $status_pembayaran = StatusPembayaran::where('id', $donasi->status_pembayaran_id)->value('kode');

            switch ($status_pembayaran) {
                case 'pending':
                    # code...
                    break;
                case 'settlement':
                    $this->verifikasiPembayaran($donasi);
                    break;
                case 'capture':
                    # code...
                    break;
                case 'deny':
                    # code...
                    break;
                case 'cancel':
                    # code...
                    break;
                case 'expire':
                    $this->tutupPembayaran($donasi);
                    break;
                case 'failure':
                    # code...
                    break;
                case 'refund':
                    # code...
                    break;
                case 'chargeback':
                    # code...
                    break;
                case 'partial_refund':
                    # code...
                    break;
                case 'partial_chargeback':
                    # code...
                    break;
                case 'authorize':
                    # code...
                    break;
                default:
                    # code...
                    break;
            }
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
        }
    }

    private function verifikasiPembayaran($donasi)
    {
        $kampanye = Kampanye::find($donasi->kampanye_id);
        $kampanye->increment('terkumpul', $donasi->nominal);
    }

    private function tutupPembayaran($donasi)
    {
        $donasi->update([
            'expired_at' => now()
        ]);
    }
}
