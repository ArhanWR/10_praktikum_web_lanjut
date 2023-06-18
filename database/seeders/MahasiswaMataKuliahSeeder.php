<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa_matakuliah = [
            [
                'mahasiswa_id' => 123,
                'matakuliah_id' => 2,
                'nilai' => 95
            ],
            [
                'mahasiswa_id' => 123,
                'matakuliah_id' => 1,
                'nilai' => 86
            ]
        ];

        DB::table('mahasiswa_matakuliah')->insert($mahasiswa_matakuliah);
    }
}
