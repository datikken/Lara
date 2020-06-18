<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductFeedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_id');
            $table->string('name');
            $table->string('email');
            $table->boolean('recommendation');
            $table->string('plus');
            $table->string('minus');
            $table->text('feedback');
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
