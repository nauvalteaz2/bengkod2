<?php

namespace Database\Seeders;

use App\Models\JadwalPeriksa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokter = User::where('role', 'dokter')->first();

        $jadwals = [
            [
                'id_dokter' => $dokter->id,
                'hari' => 'senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '12:00:00',
                'status' => true,
            ],
            [
                'id_dokter' => $dokter->id,
                'hari' => 'jumat',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '12:00:00',
                'status' => false,
            ],
        ];
        foreach ($jadwals as $jadwal) {
            JadwalPeriksa::create($jadwal);
        }
    }
}
