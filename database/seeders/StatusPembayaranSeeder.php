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
                'id' => 1,
                'nama' => 'Menunggu Pembayaran',
                'kode' => 'pending',
            ],
            [
                'id' => 2,
                'nama' => 'Pembayaran Terverifikasi',
                'kode' => 'settlement',
            ],
            [
                'id' => 3,
                'nama' => 'Menunggu Verifikasi',
                'kode' => 'capture',
            ],
            [
                'id' => 4,
                'nama' => 'Pembayaran Ditolak',
                'kode' => 'deny',
            ],
            [
                'id' => 5,
                'nama' => 'Pembayaran Dibatalkan',
                'kode' => 'cancel',
            ],
            [
                'id' => 6,
                'nama' => 'Transaksi Kadaluarsa',
                'kode' => 'expire',
            ],
            [
                'id' => 7,
                'nama' => 'Transaksi Gagal',
                'kode' => 'failure',
            ],
            [
                'id' => 8,
                'nama' => 'Pembayaran Dikembalikan',
                'kode' => 'refund',
            ],
            [
                'id' => 9,
                'nama' => 'Pembayaran Ditarik',
                'kode' => 'chargeback',
            ],
            [
                'id' => 10,
                'nama' => 'Sebagian Dikembalikan',
                'kode' => 'partial_refund',
            ],
            [
                'id' => 11,
                'nama' => 'Sebagian Ditarik',
                'kode' => 'partial_chargeback',
            ],
            [
                'id' => 12,
                'nama' => 'Transaksi Disetujui',
                'kode' => 'authorize',
            ],
        ];

        foreach ($items as $item) {
            StatusPembayaran::updateOrCreate([
                'id' => $item['id'],
            ], [
                'kode' => $item['kode'],
                'nama' => $item['nama'],
            ]);
        }
    }
}
