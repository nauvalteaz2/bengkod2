<?php

namespace Database\Seeders;

use App\Models\obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obats = [
            [
                'nama_obat' => 'Paracetamol',
                'kemasan' => 'tablet',
                'harga' => 5000,
            ],
            [
                'nama_obat' => 'Amoxcilin',
                'kemasan' => 'kapsul',
                'harga' => 10000,
            ],
            [
                'nama_obat' => 'Ibuprofen',
                'kemasan' => 'tablet',
                'harga' => 7000,
            ],
            [
                'nama_obat' => 'cetirizine',
                'kemasan' => 'tablet',
                'harga' => 8000,
            ],
        ];
        foreach ($obats as $obat) {
            obat::create($obat);
        }
    }
}
