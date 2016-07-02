<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JobsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('job_tag')->delete();

        $jobs = DB::table('jobs')->lists('id');
        $tags = DB::table('tags')->lists('id');

        for($i=0; $i<4; $i++){
            \App\JobTag::create(array(
                'job_id'    => $faker->randomElement($jobs),
                'tag_id'    => $faker->randomElement($tags)
            ));
        }
    }
}
