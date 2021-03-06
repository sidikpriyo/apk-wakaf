<?php

namespace App\Jobs;

use App\Models\DonasiTransaksi;
use App\Models\MetodePembayaran;
use App\Models\Rekening;
use App\Models\RekeningDonasi;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DonasiJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $donasi;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($donasi)
    {
        $this->donasi = $donasi;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $donasi = $this->donasi;

            // Transaksi
            $nominal = $donasi->nominal;
            $donasi_id = $donasi->id;

            $pembayaran_id = $donasi->pembayaran_id;
            $metode_pembayaran = MetodePembayaran::select('pembayaran.kode as pembayaran', 'jenis_pembayaran.kode as jenis_pembayaran')->join('jenis_pembayaran', 'jenis_pembayaran.id', 'pembayaran.jenis_pembayaran_id')->where('pembayaran.id', $pembayaran_id)->first();
            if (!$metode_pembayaran) {
                throw new Exception('Metode pembayaran tidak ditemukan');
            }

            $pembayaran = $metode_pembayaran->pembayaran;
            $jenis_pembayaran = $metode_pembayaran->jenis_pembayaran;

            switch ($jenis_pembayaran) {
                case 'gateway':
                    $this->pembayaranVirtualAccount($donasi_id, $nominal, $pembayaran);
                    break;

                case 'transfer':
                    $this->pembayaranTransfer($donasi_id, $pembayaran);
                    break;

                default:
                    # code...
                    break;
            }
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
        }
    }

    private function pembayaranTransfer($donasi_id, $bank)
    {
        try {
            $rekening_id = Rekening::whereHas('bank', function ($query) use ($bank) {
                $query->where('kode', $bank);
            })->value('id');

            RekeningDonasi::create([
                'donasi_id' => $donasi_id,
                'rekening_id' => $rekening_id,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function pembayaranVirtualAccount($donasi_id, $nominal, $bank)
    {
        try {
            $url = "https://api.sandbox.midtrans.com/v2/charge";
            $payload = [];
            switch ($bank) {
                case 'bca':
                    $payload = [
                        "payment_type" => "bank_transfer",
                        "transaction_details" =>  [
                            "order_id" => $donasi_id,
                            "gross_amount" => $nominal
                        ],
                        "bank_transfer" => [
                            "bank" => "bca"
                        ]
                    ];
                    break;
                case 'bri':
                    $payload = [
                        "payment_type" => "bank_transfer",
                        "transaction_details" =>  [
                            "order_id" => $donasi_id,
                            "gross_amount" => $nominal
                        ],
                        "bank_transfer" => [
                            "bank" => "bca"
                        ]
                    ];
                    break;
                case 'bni':
                    $payload = [
                        "payment_type" => "bank_transfer",
                        "transaction_details" =>  [
                            "order_id" => $donasi_id,
                            "gross_amount" => $nominal
                        ],
                        "bank_transfer" => [
                            "bank" => "bca"
                        ]
                    ];
                    break;
                case 'mandiri':
                    $payload = [
                        "payment_type" => "echannel",
                        "transaction_details" => [
                            "order_id" => $donasi_id,
                            "gross_amount" => $nominal
                        ]
                    ];
                    break;

                default:
                    # code...
                    break;
            }

            $reponse = Http::acceptJson()->withHeaders([
                'Authorization' => 'Basic ' . base64_encode(config('app.mitrans')),
                'Content-Type' => 'application/json'
            ])->post($url, $payload);

            DonasiTransaksi::create([
                'donasi_id' => $donasi_id,
                'response' => $reponse->body()
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
