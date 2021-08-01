<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Rekening;
use Illuminate\Database\Seeder;

class RekeningSeeder extends Seeder
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
                'nama' => 'Nama Rekening',
                'nomor' => '0000-0000-000-000',
                'kode' => 'bca',
            ],
            [
                'nama' => 'Nama Rekening',
                'nomor' => '0000-0000-000-000',
                'kode' => 'bni',
            ],
            [
                'nama' => 'Nama Rekening',
                'nomor' => '0000-0000-000-000',
                'kode' => 'bri',
            ],
            [
                'nama' => 'Nama Rekening',
                'nomor' => '0000-0000-000-000',
                'kode' => 'mandiri',
            ]
        ];

        foreach ($items as $item) {
            $bank_id = Bank::where('kode', $item['kode'])->value('id');

            Rekening::updateOrCreate([
                'nomor' => $item['nomor'],
                'bank_id' => $bank_id
            ], [
                'nama' => $item['nama'],
            ]);
        }
    }
}
