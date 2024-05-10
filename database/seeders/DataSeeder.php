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
        $file = fopen(database_path('Marzo 2024.xlsx - Datos_Marzo.csv'), 'r');

        while (($data = fgetcsv($file)) !== false) {
            // Inserta los datos en la tabla 'data'
            DB::table('data')->insert([
                'id' => $data[0],
                'id_biometrico' => $data[1],
                'name' => $data[2],
                'time' => $data[3],
                'state' => $data[4],
                'type' => $data[5],
                'type_register' => $data[6],
            ]);
        }
        fclose($file);
    }
}
