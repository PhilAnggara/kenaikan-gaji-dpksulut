<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Femmy Suluh',
            'email' => 'femmysuluh@gmail.com',
            'role' => 'Kepala Dinas',
            'password' => Hash::make('Admin123')
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => 'subbagian@gmail.com',
            'role' => 'Sub Bagian Kepegawaian',
            'password' => Hash::make('Admin123')
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => 'dinasdaearh@gmail.com',
            'role' => 'Dinas Daerah',
            'password' => Hash::make('Admin123')
        ]);
        User::create([
            'name' => 'Glen Hans Lengkong',
            'email' => 'glenlengkong@gmail.com',
            'role' => 'ASN Pemohon',
            'password' => Hash::make('Admin123')
        ]);
    }
}
