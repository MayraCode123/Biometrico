<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cargo = [
            [
                'id' => 1, // Specify unique IDs or use auto-increment
                'name' => 'Ejecutivo de Desarrollo',

            ],
            [
                'id' => 2, // Specify unique IDs or use auto-increment
                'name' => 'Ejecutivo Contable',

            ],
            [
                'id' => 3, // Specify unique IDs or use auto-increment
                'name' => 'Ejecutivo Academico',

            ],
            [
                'id' => 4, // Specify unique IDs or use auto-increment
                'name' => 'Ejecutivo Marketing',

            ],
            [
                'id' => 5, // Specify unique IDs or use auto-increment
                'name' => 'Supervisor Gestion Empresarial',

            ],
            [
                'id' => 6, // Specify unique IDs or use auto-increment
                'name' => 'Supervisor Talento Humano',

            ],
        ];
        DB::table('cargo')->insert($cargo);
    }
}
