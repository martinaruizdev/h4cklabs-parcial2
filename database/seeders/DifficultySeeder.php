<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('difficulties')->insert([
            [
                'difficulty_id' => 1,
                'name' => 'Fácil',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'difficulty_id' => 2,
                'name' => 'Medio',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'difficulty_id' => 3,
                'name' => 'Difícil',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'difficulty_id' => 4,
                'name' => 'Extremo',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
