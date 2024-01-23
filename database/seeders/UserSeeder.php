<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
            'nip' => '199901012017051001',
            'email' => 'subbagian@gmail.com',
            'telp' => '081234567890',
            'tgl_lahir' => Carbon::create('1999', '01', '01'),
            'jenis_kelamin' => 'Laki-laki',
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
            'nip' => '199901012017051001',
            'email' => 'glenlengkong@gmail.com',
            'telp' => '081234567890',
            'tgl_lahir' => Carbon::create('1999', '01', '01'),
            'jenis_kelamin' => 'Laki-laki',
            'role' => 'ASN Pemohon',
            'password' => Hash::make('Admin123')
        ]);
    }
}
