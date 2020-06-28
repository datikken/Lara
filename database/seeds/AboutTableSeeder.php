<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\About');
        for($i = 0; $i <= 10; $i++) {

            DB::table('abouts')->insert([
                'year' => $faker->year,
                'heading' => $faker->sentence,
                'description' => $faker->sentence,
                'text' => implode($faker->paragraphs(5)),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]);
        }
    }
}
