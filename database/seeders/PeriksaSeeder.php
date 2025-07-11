<?php

namespace Database\Seeders;

use App\Models\JanjiPeriksa;
use App\Models\Periksa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $janji = JanjiPeriksa::first();

        $data = [
            [
                'id_janji_periksa' => $janji->id,
                'tgl_periksa' => now(),
                'catatan' => 'pasien mengalami demam ringan disarankan beristirahat',
                'biaya_periksa' => 75000,
            ],
        ];
        foreach ($data as $item) {
            Periksa::create($item);
        }
    }
}
