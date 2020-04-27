<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAdresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_adresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('home');
            $table->string('wing');
            $table->string('building');
            $table->string('porch');
            $table->string('intercom');
            $table->string('floor');
            $table->string('flat');
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
