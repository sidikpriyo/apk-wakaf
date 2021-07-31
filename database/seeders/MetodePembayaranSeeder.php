<?php

namespace Database\Seeders;

use App\Models\JenisPembayaran;
use App\Models\MetodePembayaran;
use Illuminate\Database\Seeder;

class MetodePembayaranSeeder extends Seeder
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
                'nama' => 'Pembayaran Ditempat',
                'kode' => 'tunai',
                'jenis_pembayaran' => 'tunai'
            ],
            [
                'nama' => 'Transfer BCA',
                'kode' => 'tranfer_bca',
                'jenis_pembayaran' => 'transfer'
            ],
            [
                'nama' => 'Transfer Mandiri',
                'kode' => 'tranfer_mandiri',
                'jenis_pembayaran' => 'transfer'
            ],
            [
                'nama' => 'Transfer BNI',
                'kode' => 'tranfer_bni',
                'jenis_pembayaran' => 'transfer'
            ],
            [
                'nama' => 'Transfer BRI',
                'kode' => 'tranfer_bri',
                'jenis_pembayaran' => 'transfer'
            ],
            [
                'nama' => 'BCA Virtual Account',
                'kode' => 'bca',
                'jenis_pembayaran' => 'gateway'
            ],
            [
                'nama' => 'Mandiri Virtual Account',
                'kode' => 'mandiri',
                'jenis_pembayaran' => 'gateway'
            ],
            [
                'nama' => 'BNI Virtual Account',
                'kode' => 'bni',
                'jenis_pembayaran' => 'gateway'
            ],
            [
                'nama' => 'BRI Virtual Account',
                'kode' => 'bri',
                'jenis_pembayaran' => 'gateway'
            ],
        ];

        foreach ($items as $item) {
            $jenis_pembayaran_id = JenisPembayaran::where('kode', $item['jenis_pembayaran'])->value('id');

            MetodePembayaran::updateOrCreate([
                'jenis_pembayaran_id' => $jenis_pembayaran_id,
                'kode' => $item['kode'],
            ], [
                'nama' => $item['nama'],
            ]);
        }
    }
}
