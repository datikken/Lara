<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Post_Comments;

$factory->define(Post_Comments::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'post_id' => 1,
        'content' => $faker->sentence,
        'likes' => 0,
        'dislikes' => 0
    ];
});
