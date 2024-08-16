<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = ['master', 'admin', 'kepsek', 'wakasek', 'gmapel', 'walas', 'siswa'];
        $names = ['Abdul Madjid', 'Ramdani Trias Sumiarsa', 'Damudin', 'Ebah Habibah', 'Otong Sunahdi', 'Tabiin', 'Azzam Ikbara Al-Madjid'];

        $default = [
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ];

        foreach ($users as $index => $value) {
            $name = $names[$index];
            $email = strtolower(str_replace(' ', '_', $name)) . '@gmail.com';

            User::create([...$default, ...[
                'name' => $name,
                'email' => $email,
            ]])->assignRole($value);
        }
    }
}
