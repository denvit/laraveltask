<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('jobs')->delete();

        for($i=0; $i<7; $i++){
            $token = str_random(20);
            \App\Job::create(array(
                'email'                 => $faker->email,
                'title'                 => $faker->jobTitle,
                'description'           => $faker->text(200),
                'location'              => $faker->city,
                'token'                 => $token
            ));
        }
    }
}
