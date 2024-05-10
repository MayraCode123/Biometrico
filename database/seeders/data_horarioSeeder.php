<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class data_horarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_horario = [
            [
                'id' => 1,
                'data_id_biometrico' => 4,
                'horario_id' => 1,
            ],
            [
                'id' => 2, // Cambia el valor de id para que sea único
                'data_id_biometrico' => 4,
                'horario_id' => 2,
            ],
            [
                'id' => 3,
                'data_id_biometrico' => 5,
                'horario_id' => 1,
            ],
            [
                'id' => 4, // Cambia el valor de id para que sea único
                'data_id_biometrico' => 5,
                'horario_id' => 2,
            ],

        ];
        DB::table('data_horario')->insert($data_horario);
    }
}
