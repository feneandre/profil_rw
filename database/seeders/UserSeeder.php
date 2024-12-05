<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kecamatan;
use App\Models\Rw;
use App\Models\Rt;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat Kecamatan
        Kecamatan::create([
            'nama' => 'Admin Kecamatan',
            'email' => 'kecamatan@gmail.com',
            'password' => Hash::make('password123')
        ]);

        // Buat RW 1
        $rw1 = Rw::create([
            'nama' => 'RW 01',
            'email' => 'rw01@gmail.com',
            'password' => Hash::make('password123'),
            'nomor_rw' => '001',
            'kecamatan_id' => 1
        ]);

        // Buat RW 2
        $rw2 = Rw::create([
            'nama' => 'RW 02',
            'email' => 'rw02@gmail.com',
            'password' => Hash::make('password123'),
            'nomor_rw' => '002',
            'kecamatan_id' => 1
        ]);

        // Buat RT untuk RW 1
        Rt::create([
            'nama' => 'RT 01 RW 01',
            'email' => 'rt01rw01@gmail.com',
            'password' => Hash::make('password123'),
            'nomor_rt' => '001',
            'rw_id' => $rw1->id
        ]);

        Rt::create([
            'nama' => 'RT 02 RW 01',
            'email' => 'rt02rw01@gmail.com',
            'password' => Hash::make('password123'),
            'nomor_rt' => '002',
            'rw_id' => $rw1->id
        ]);

        // Buat RT untuk RW 2
        Rt::create([
            'nama' => 'RT 01 RW 02',
            'email' => 'rt01rw02@gmail.com',
            'password' => Hash::make('password123'),
            'nomor_rt' => '001',
            'rw_id' => $rw2->id
        ]);

        Rt::create([
            'nama' => 'RT 02 RW 02',
            'email' => 'rt02rw02@gmail.com',
            'password' => Hash::make('password123'),
            'nomor_rt' => '002',
            'rw_id' => $rw2->id
        ]);
    }
}