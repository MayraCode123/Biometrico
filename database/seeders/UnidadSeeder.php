<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unidad')->insert([
            ['name' => 'Sucre 1'],
            ['name' => 'Sucre 2'],
            ['name' => 'CCA']
        ]);
    }
}
