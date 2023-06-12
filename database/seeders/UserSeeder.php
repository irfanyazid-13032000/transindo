<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'id' => '1',
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('admin123'),
                'role' => 'Admin',
                'divisi_id' => 1,
                'no_hp' => '081234567890',
                'jenis_kelamin' => 'Laki-Laki',
                'nim' => '1234567890',
                'jenjang_pendidikan' => 'S1',
                'jurusan' => 'Teknik Informatika',
                'universitas' => 'Universitas Brawijaya',
                'surat_kontrak' => 'surat_kontrak.pdf',
                'tanggal_masuk' => '2021-05-05',
                'tanggal_keluar' => '2021-06-05',
                'status' => 'Aktif',
                'sertifikat' => '',
                'remember_token' => 'null',
                'created_at' => now(),
            ],
           
        ];

        User::insert($user);
    }
}
