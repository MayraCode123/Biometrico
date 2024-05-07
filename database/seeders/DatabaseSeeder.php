<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        AreaSeeder::class,
        UnidadSeeder::class,
        DateSeeder::class,
        //DataSeeder::class,
        HorarioSeeder::class,
        //data_horarioSeeder::class,

        // ...
    ]);


        \App\Models\User::factory()->create([
            'name' => 'John',
            'last_name' => 'Doe',
            'password' => 'password',
            'email' => 'test@example.com',
        ]);
    }
}
