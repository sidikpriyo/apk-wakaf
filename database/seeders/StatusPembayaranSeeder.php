<?php

namespace Database\Seeders;

use App\Models\StatusPembayaran;
use Illuminate\Database\Seeder;

class StatusPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'nama' => 'Menunggu Pembayaran',
                'kode' => 'pending',
            ],
            [
                'nama' => 'Pembayaran Terverifikasi',
                'kode' => 'settlement',
            ],
            [
                'nama' => 'Menunggu Verifikasi',
                'kode' => 'capture',
            ],
            [
                'nama' => 'Pembayaran Ditolak',
                'kode' => 'deny',
            ],
            [
                'nama' => 'Pembayaran Dibatalkan',
                'kode' => 'cancel',
            ],
            [
                'nama' => 'Transaksi Kadaluarsa',
                'kode' => 'expire',
            ],
            [
                'nama' => 'Transaksi Gagal',
                'kode' => 'failure',
            ],
            [
                'nama' => 'Pembayaran Dikembalikan',
                'kode' => 'refund',
            ],
            [
                'nama' => 'Pembayaran Ditarik',
                'kode' => 'chargeback',
            ],
            [
                'nama' => 'Sebagian Dikembalikan',
                'kode' => 'partial_refund',
            ],
            [
                'nama' => 'Sebagian Ditarik',
                'kode' => 'partial_chargeback',
            ],
            [
                'nama' => 'Transaksi Disetujui',
                'kode' => 'authorize',
            ],
        ];

        foreach ($items as $item) {
            StatusPembayaran::updateOrCreate([
                'kode' => $item['kode'],
            ], [
                'nama' => $item['nama'],
            ]);
        }
    }
}
