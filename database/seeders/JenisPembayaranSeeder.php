<?php

namespace Database\Seeders;

use App\Models\JenisPembayaran;
use Illuminate\Database\Seeder;

class JenisPembayaranSeeder extends Seeder
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
                'nama' => 'Tunai',
                'kode' => 'tunai'
            ],
            [
                'nama' => 'Transfer Manual',
                'kode' => 'transfer'
            ],
            [
                'nama' => 'Payment Gateway',
                'kode' => 'gateway'
            ],
        ];

        foreach ($items as $item) {
            JenisPembayaran::updateOrCreate([
                'kode' => $item['kode'],
            ], [
                'nama' => $item['nama'],
            ]);
        }
    }
}
