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
        // Pengelola
        $users = [
            [
                'email' => 'pengelola@wakaf.id',
                'name' => 'Pengelola',
                'role' => 'pengelola'
            ],
            [
                'email' => 'lembaga@wakaf.id',
                'name' => 'Lembaga',
                'role' => 'lembaga'
            ],
            [
                'email' => 'donatur@wakaf.id',
                'name' => 'Donatur',
                'role' => 'donatur'
            ]
        ];

        foreach ($users as $user) {
            User::updateOrCreate([
                'email' => $user['email']
            ], [
                'name' => $user['name'],
                'password' => Hash::make('rahasia'),
                'role' => $user['role'],
                'email_verified_at' => now()
            ]);
        }
    }
}
