<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1,10) as $index)
        {
            DB::table('posts')->insert([
                'title'=>$faker->title,
                'content'=>$faker->text,
                'category_id'=>$faker->numberBetween(1,10),
                'user_id'=>$faker->numberBetween(1,10)
            ]);

        }
    }
}
