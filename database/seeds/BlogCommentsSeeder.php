<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;

class BlogCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Comment');
        $posts = Post::all();
        $postsC = count($posts);

        for($i = 1; $i <= $postsC; $i++) {
            DB::table('comments')->insert([
                'id' => $i,
                'post_id' => $i,
                'user_id' => 1,
                'likes' => $i,
                'dislikes' => $i,
                'content' => 'damn'
            ]);
        }
    }
}
