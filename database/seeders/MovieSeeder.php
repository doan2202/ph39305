<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->name,
                'poster' => '',
                'intro' => $faker->name,
                'release_date' => $faker->date('Y-m-d'),
                'genre_id' => $faker->numberBetween(1, 4),
            ]);
        }
    }

}
