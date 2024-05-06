<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_horario = [
            [
                'data_id' => 1,
                'horario_id' => 1
            ],
            [
                'data_id' => 2,
                'horario_id' => 2
            ],
            [
                'data_id' => 3,
                'horario_id' => 2
            ],
            [
                'data_id' => 4,
                'horario_id' => 2
            ],
            [
                'data_id' => 5,
                'horario_id' => 3
            ],
            [
                'data_id' => 6,
                'horario_id' => 4
            ],

        ];
        DB::table('data_horario')->insert($data_horario);
    }
}
