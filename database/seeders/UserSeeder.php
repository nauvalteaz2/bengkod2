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
        $users = [
            [
                'nama' => 'Dr. andi',
                'email' => 'andi@gmail.com',
                'password' => Hash::make('andi123'),
                'role' => 'dokter',
                'alamat' => 'Jl. abcd no 123',
                'no_ktp' => '1234567890123456',
                'no_hp' => '08123812831',
                'poli' => 'Umum',
            ],
            [
                'nama' => 'tirta',
                'email' => 'tirta@gmail.com',
                'password' => Hash::make('tirta123'),
                'role' => 'pasien',
                'alamat' => 'Jl. abcd no 123',
                'no_ktp' => '1234567890123456',
                'no_hp' => '08123812831',
                'poli' => 'Umum',
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
