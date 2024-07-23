<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('posts')->insert([
                'title'=> $faker -> text(25),
                'image'=> 'https://baomoi.com/duc-dau-dan-mach-euro-2024-theo-buoc-chan-toni-kroos-c49499320.epi',
                'description'=> $faker -> text(50),
                'content'=> $faker -> text(),
                'view'=> rand(1,1000),
                'cate_id'=> rand(1,4)
            ]);
        }
    }
}
