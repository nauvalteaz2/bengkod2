<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $polis = ['Umum', 'Gigi', 'Anak', 'Kandungan'];

        foreach ($polis as $poli) {
            \App\Models\Poli::create(['nama_poli' => $poli]);
        }
    }
}
