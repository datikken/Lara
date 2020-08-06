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
        for($i = 1; $i <= 11; $i++) {


           DB::table('abouts_years')->inser([
                'id' => $i,
                'year' => $faker->year,
                'content_id' => $i,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]);

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
