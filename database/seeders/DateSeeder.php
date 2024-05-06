<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = [
            [
                'id' => 1,
                'name' => 'marzo',
                'date' => '2024-03-02',
            ],
            [
                'id' => 2,
                'name' => 'abril',
                'date' => '2024-04-02',
            ],
            [
                'id' => 3,
                'name' => 'mayo',
                'date' => '2024-05-02',
            ],
            [
                'id' => 4,
                'name' => 'junio',
                'date' => '2024-06-02',
            ],

        ];
        DB::table('date')->insert($date);
    }
}
