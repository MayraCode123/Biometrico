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
            'tipo' => 'Horario Continuo',
            'time_i' => '08:00:00',
            'time_f' => '16:00:00',
            'state' => 'activo',
            'date_id'=> 2,

        ],
        [
            'id' => 2,
            'tipo' => 'Turno Mañana',
            'time_i' => '08:00:00',
            'time_f' => '12:00:00',
            'state' => 'activo',
            'date_id'=> 2,
        ],
        [
            'id' => 3,
            'tipo' => 'Turno Tarde',
            'time_i' => '14:30:00',
            'time_f' => '18:30:00',
            'state' => 'activo',
            'date_id'=> 3,

        ],
        [
            'id' => 4,
            'tipo' => 'Horario Nocturno',
            'time_i' => '16:00:00',
            'time_f' => '20:00:00',
            'state' => 'activo',
            'date_id'=> 4,

        ],

    ];
    DB::table('horario')->insert($horarios);

    }
}
