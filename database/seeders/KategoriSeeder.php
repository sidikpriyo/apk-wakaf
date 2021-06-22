<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
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
                'nama' => 'Pendidikan',
                'kode' => 'pendidikan',
            ],
            [
                'nama' => 'Kesehatan',
                'kode' => 'kesehatan',
            ],
            [
                'nama' => 'Sosial',
                'kode' => 'sosial',
            ],
            [
                'nama' => 'Ekonomi',
                'kode' => 'ekonomi',
            ],
            [
                'nama' => 'Fasilitas Keagamaan',
                'kode' => 'agama',
            ],
            [
                'nama' => 'Lainnya',
                'kode' => 'lainnya',
            ],
        ];

        foreach ($items as $item) {
            Kategori::updateOrCreate([
                'kode' => $item['kode'],
            ], [
                'nama' => $item['nama'],
            ]);
        }
    }
}
