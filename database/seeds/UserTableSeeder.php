<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('secret'),
        ]);

        $faker = Faker::create();
        foreach (range(1,10) as $index)
        {
            DB::table('users')->insert([
                'name'=> $faker->firstNameFemale,
                'email'=>$faker->email,
                'password'=> bcrypt('secret')
            ]);

        }
    }
}
