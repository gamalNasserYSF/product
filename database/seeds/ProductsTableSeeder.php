<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
            $product = \App\Models\Product::create([
                'title' => $faker->word,
                'description' => $faker->sentence,
				'image' => "https://static.digitecgalaxus.ch/Files/1/4/5/0/2/6/5/1/8717418532055xxl.jpg?fit=inside%7C708:354&output-format=progressive-jpeg",
            ]);

            $product->attributes()->create([
                'color' => $faker->colorName,
                'size' => $faker->randomNumber(),
                'price' => $faker->randomNumber(),
            ]);

            $product->categories()->attach(
               $i
            );
        }
    }
}
