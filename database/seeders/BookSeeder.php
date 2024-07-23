<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'thumbnail' => 'https://baomoi.com/duc-dau-dan-mach-euro-2024-theo-buoc-chan-toni-kroos-c49499320.epi',
                'author' => $faker->name,
                'publisher' => $faker->company,
                'publication' => $faker->date('Y-m-d'),
                'price' => $faker->randomFloat(2, 10, 100),
                'quantity' => $faker->numberBetween(1, 100),
                'category_id' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
