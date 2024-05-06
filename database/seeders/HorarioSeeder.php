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
            'min_hr_entrada' => '00:59:00',
            'hr_entrada' => '08:00:00',
            'hr_entrada_min_tolerancia' => '00:10:00',
            'hr_entrada_min_retraso'=> '00:10:00',
            'hr_salida'=> '12:00:00',
            'hr_min_salida'=> '00:59:00',

        ],
        [
            'id' => 2, // Specify unique IDs or use auto-increment
            'name' => 'turno tarde',
            'min_hr_entrada' => '00:30:00',
            'hr_entrada' => '14:30:00',
            'hr_entrada_min_tolerancia' => '00:10:00',
            'hr_entrada_min_retraso'=> '00:10:00',
            'hr_salida'=> '18:30:00',
            'hr_min_salida'=> '00:59:00',
        ],
        [
            'id' => 3, // Specify unique IDs or use auto-increment
            'name' => 'turno continuo',
            'min_hr_entrada' => '00:59:00',
            'hr_entrada' => '08:00:00',
            'hr_entrada_min_tolerancia' => '00:10:00',
            'hr_entrada_min_retraso'=> '00:10:00',
            'hr_salida'=> '16:00:00',
            'hr_min_salida'=> '00:59:00',

        ],


    ];
    DB::table('horario')->insert($horarios);

    }
}
