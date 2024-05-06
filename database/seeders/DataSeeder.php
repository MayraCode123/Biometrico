<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id'=>1,
                'id_biometrico'=>4,
                'name'=>'Fernando Flores',
                'time'=>'2024-03-01 07:39:07',
                'state'=>'Entrada',
                'type'=>'BIOMETRICO',
                'type_register'=>0
            ],
            [
                'id'=>2,
                'id_biometrico'=>4,
                'name'=>'Fernando Flores',
                'time'=>'2024-03-01 12:01:07',
                'state'=>'Salida',
                'type'=>'BIOMETRICO',
                'type_register'=>0
            ],
            [
                'id'=>3,
                'id_biometrico'=>4,
                'name'=>'Fernando Flores',
                'time'=>'2024-03-01 14:30:07',
                'state'=>'Entrada',
                'type'=>'BIOMETRICO',
                'type_register'=>0
            ],
            [
                'id'=>4,
                'id_biometrico'=>4,
                'name'=>'Fernando Flores',
                'time'=>'2024-03-01 18:30:07',
                'state'=>'Salida',
                'type'=>'BIOMETRICO',
                'type_register'=>0
            ],
            [
                'id'=>5,
                'id_biometrico'=>5,
                'name'=>'Maria Jose',
                'time'=>'2024-04-01 08:30:07',
                'state'=>'Entrada',
                'type'=>'BIOMETRICO',
                'type_register'=>0
            ],
            [
                'id'=>6,
                'id_biometrico'=>5,
                'name'=>'Maria Jose',
                'time'=>'2024-04-01 12:30:07',
                'state'=>'Salida',
                'type'=>'BIOMETRICO',
                'type_register'=>0
            ],
        ];

        DB::table('data')->insert($data);
    }
}
