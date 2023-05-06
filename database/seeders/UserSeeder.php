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
                'position' => 'Admin',
                'status' => 'Aktif',
                'remember_token' => 'null',
                'created_at' => now(),
            ],
            [
                'id' => '2',
                'name' => 'Silvia',
                'email' => 'silvia@mail.com',
                'password' => bcrypt('hrd123'),
                'role' => 'HRD',
                'position' => 'HRD',
                'status' => 'Aktif',
                'remember_token' => 'null',
                'created_at' => now(),
            ],
            [
                'id' => '3',
                'name' => 'Rudi',
                'email' => 'rudi@mail.com',
                'password' => bcrypt('rudi123'),
                'role' => 'Intern',
                'position' => 'Laravel',
                'status' => 'Aktif',
                'remember_token' => 'null',
                'created_at' => now(),
            ],
            [
                'id' => '4',
                'name' => 'Cindy',
                'email' => 'cindy@mail.com',
                'password' => bcrypt('cindy123'),
                'role' => 'Intern',
                'position' => 'Design',
                'status' => 'Aktif',
                'remember_token' => 'null',
                'created_at' => now(),
            ],
        ];

        User::insert($user);
    }
}
