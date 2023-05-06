<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisi = [
            [
                'id' => 1,
                'nama' => 'Laravel',
                'jumlah_anggota' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'nama' => 'HRD',
                'jumlah_anggota' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'nama' => 'Content Creator',
                'jumlah_anggota' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'nama' => 'Content Research',
                'jumlah_anggota' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'nama' => 'Social Media',
                'jumlah_anggota' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'nama' => 'Design',
                'jumlah_anggota' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 7,
                'nama' => 'Moderator',
                'jumlah_anggota' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 8,
                'nama' => 'Public Relation',
                'jumlah_anggota' => 0,
                'created_at' => now(),
            ],
        ];

        Divisi::insert($divisi);
    }
}
