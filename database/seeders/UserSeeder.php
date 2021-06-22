<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'pengelola@wakaf.id'
        ], [
            'name' => 'User Pengelola',
            'password' => Hash::make('rahasia'),
            'role' => 'pengelola',
            'email_verified_at' => now()
        ]);
    }
}
