<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,20) as $index)
        {
            DB::table('categories')->insert([
                'name'=>$faker->name,
                'description'=>$faker->text
            ]);
        }

    }
}
