<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horarios = [
        [
            'id' => 1, // Specify unique IDs or use auto-increment
            'name' => 'turno manana',
            'min_hr_entrada' => '07:00:00',
            'hr_entrada' => '08:00:00',
            'hr_entrada_min_tolerancia' => '08:10:00',
            'hr_entrada_min_retraso'=> '08:11:00',
            'hr_salida'=> '12:00:00',
            'hr_min_salida'=> '13:00:00',

        ],
        [
            'id' => 2, // Specify unique IDs or use auto-increment
            'name' => 'turno tarde',
            'min_hr_entrada' => '14:00:00',
            'hr_entrada' => '14:30:00',
            'hr_entrada_min_tolerancia' => '14:40:00',
            'hr_entrada_min_retraso'=> '14:41:00',
            'hr_salida'=> '18:30:00',
            'hr_min_salida'=> '19:00:00',
        ],
        [
            'id' => 3, // Specify unique IDs or use auto-increment
            'name' => 'turno continuo',
            'min_hr_entrada' => '07:00:00',
            'hr_entrada' => '08:00:00',
            'hr_entrada_min_tolerancia' => '08:10:00',
            'hr_entrada_min_retraso'=> '08:11:00',
            'hr_salida'=> '16:00:00',
            'hr_min_salida'=> '15:00:00',

        ],
        [
            'id' => 4, // Specify unique IDs or use auto-increment
            'name' => 'turno noche',
            'min_hr_entrada' => '15:00:00',
            'hr_entrada' => '16:00:00',
            'hr_entrada_min_tolerancia' => '16:10:00',
            'hr_entrada_min_retraso'=> '16:11:00',
            'hr_salida'=> '20:00:00',
            'hr_min_salida'=> '22:00:00',

        ]
    ];
    DB::table('horario')->insert($horarios);

    }
}
