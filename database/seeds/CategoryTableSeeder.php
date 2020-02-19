<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i < 9; $i++)
        {
            \App\Models\Category::create([
                'title' => $faker->word,
                'description' => $faker->sentence,
                'image' => "https://static.digitecgalaxus.ch/Files/1/4/5/0/2/6/5/1/8717418532055xxl.jpg?fit=inside%7C708:354&output-format=progressive-jpeg",
            ]);
        }
    }
}
