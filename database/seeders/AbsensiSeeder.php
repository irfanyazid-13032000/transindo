<?php

namespace Database\Seeders;

use App\Models\Absensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $absensi = [
            [
                'id' => 1,
                'tanggal' => now()->format('Y-m-d'),
                'nama' => 'Rudi',
                'email' => 'rudi@mail.com',
                'posisi' => 'Laravel',
                'jam_masuk' => '08:00:00',
                'jam_keluar' => '17:00:00',
                'aktivitas' => 'Mengerjakan tugas Laravel',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'tanggal' => now()->format('Y-m-d'),
                'name' => 'Cindy',
                'email' => 'cindy@mail.com',
                'posisi' => 'Design',
                'jam_masuk' => '08:00:00',
                'jam_keluar' => '17:00:00',
                'aktivitas' => 'Mengerjakan tugas Design',
                'created_at' => now(),
            ],
        ];

        Absensi::insert($absensi);
    }
}
