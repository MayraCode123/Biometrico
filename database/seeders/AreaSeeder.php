<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('area')->insert([
            ['name' => 'Marketing'],
            ['name' => 'Academicos'],
            ['name' => 'Direccion'],
            ['name' => 'Ti'],
        ]);
    }
}
