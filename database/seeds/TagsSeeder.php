<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('tags')->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\Tag::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $tags = ['php', 'javascript', 'mysql', 'html', 'css', 'vuejs', 'angularjs', 'laravel', 'amazon ws'];

        for($i=0; $i<15; $i++){
            \App\Tag::create(array(
                'title' => $faker->randomElement($tags)
            ));
        }
    }
}
