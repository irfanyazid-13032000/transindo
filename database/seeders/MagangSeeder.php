<?php

namespace Database\Seeders;

use App\Models\Magang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $magang = [
            [
                'nama' => 'Rizky',
                'divisi' => 'Laravel',
                'email' => 'rizky@gmail.com',
                'no_hp' => '081234567890',
                'nim' => '1234567890',
                'jenjang_pendidikan' => 'S1',
                'jurusan' => 'Teknik Informatika',
                'universitas' => 'Universitas Brawijaya',
                'surat_kontrak' => 'surat_kontrak.pdf',
                'tanggal_masuk' => '2021-05-05',
                'tanggal_keluar' => '2021-06-05',
                'status' => 'Aktif',
                'sertifikat' => '',
            ],
            [
                'nama' => 'Rizal',
                'divisi' => 'Content Creator',
                'email' => 'rizal@gmail.com',
                'no_hp' => '081234567890',
                'nim' => '1234567890',
                'jenjang_pendidikan' => 'S1',
                'jurusan' => 'Desain Komunikasi Visual',
                'universitas' => 'Universitas Halu Oleo',
                'surat_kontrak' => 'surat_kontrak.pdf',
                'tanggal_masuk' => '2021-05-05',
                'tanggal_keluar' => '2021-06-05',
                'status' => 'Nonaktif',
                'sertifikat' => 'sertifikat.pdf',
            ],
        ];

        Magang::insert($magang);
    }
}
