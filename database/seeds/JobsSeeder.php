<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \Illuminate\Foundation\Testing\DatabaseMigrations;

class JobsTableSeeder extends Seeder
{
    use DatabaseMigrations;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('jobs')->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\Job::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for($i=0; $i<15; $i++){
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
