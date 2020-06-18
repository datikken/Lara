<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostsComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_id');
            $table->string('user_id');
            $table->string('likes');
            $table->string('dislikes');
            $table->date('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
