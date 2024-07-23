<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            DB::table('categories')->insert([
                ['name'=> 'Sport'],
                ['name'=> 'Law'],
                ['name'=> 'World'],
                ['name'=> 'Travel'],
            ]);
        }
}
