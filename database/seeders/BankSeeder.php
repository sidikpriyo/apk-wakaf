<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
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
                'nama' => 'BCA',
                'kode' => 'bca',
            ],
            [
                'nama' => 'BNI',
                'kode' => 'bni',
            ],
            [
                'nama' => 'BRI',
                'kode' => 'bri',
            ],
            [
                'nama' => 'Mandiri',
                'kode' => 'mandiri',
            ]
        ];

        foreach ($items as $item) {
            Bank::updateOrCreate([
                'kode' => $item['kode'],
            ], [
                'nama' => $item['nama'],
            ]);
        }
    }
}
