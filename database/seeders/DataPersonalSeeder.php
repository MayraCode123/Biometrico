<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_personal = [
            [
                'id' => 1,
                'data_id_biometrico' => '4',
            ],
            [
                'id' => 2,
                'data_id_biometrico' => '5',
            ],
            [
                'id' => 3,
                'data_id_biometrico' => '6',
            ],
            [
                'id' => 4,
                'data_id_biometrico' => '8',
            ],
            [
                'id' => 5,
                'data_id_biometrico' => '11',
            ],
            [
                'id' => 6,
                'data_id_biometrico' => '12',
            ],
            [
                'id' => 7,
                'data_id_biometrico' => '14',
            ],
            [
                'id' => 8,
                'data_id_biometrico' => '17',
            ],
            [
                'id' => 9,
                'data_id_biometrico' => '20',
            ],
            [
                'id' => 10,
                'data_id_biometrico' => '21',
            ],
            [
                'id' => 11,
                'data_id_biometrico' => '22',
            ],
            [
                'id' => 12,
                'data_id_biometrico' => '26',
            ],
            [
                'id' => 13,
                'data_id_biometrico' => '27',
            ],
            [
                'id' => 14,
                'data_id_biometrico' => '28',
            ],
            [
                'id' => 15,
                'data_id_biometrico' => '29',
            ],

            [
                'id' => 16,
                'data_id_biometrico' => '30',
            ],
            [
                'id' => 17,
                'data_id_biometrico' => '32',
            ],
            [
                'id' => 18,
                'data_id_biometrico' => '33',
            ],
            [
                'id' => 19,
                'data_id_biometrico' => '36',
            ],
            [
                'id' => 20,
                'data_id_biometrico' => '38',
            ],
            [
                'id' => 21,
                'data_id_biometrico' => '40',
            ],
            [
                'id' => 22,
                'data_id_biometrico' => '41',
            ],
            [
                'id' => 23,
                'data_id_biometrico' => '43',
            ],
            [
                'id' => 24,
                'data_id_biometrico' => '44',
            ],
            [
                'id' => 25,
                'data_id_biometrico' => '45',
            ],
            [
                'id' => 26,
                'data_id_biometrico' => '46',
            ],
            [
                'id' => 27,
                'data_id_biometrico' => '47',
            ],
            [
                'id' => 28,
                'data_id_biometrico' => '48',
            ],
            [
                'id' => 29,
                'data_id_biometrico' => '49',
            ],


        ];
        DB::table('data_personal')->insert($data_personal);
    }
}
