<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KategoriSeeder::class);
        $this->call(StatusPembayaranSeeder::class);
        $this->call(JenisPembayaranSeeder::class);
        $this->call(MetodePembayaranSeeder::class);
        $this->call(UserSeeder::class);
    }
}
