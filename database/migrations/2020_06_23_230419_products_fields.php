<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->text('uuid')->after('price');
            $table->integer('currency_code')->after('uuid');
            $table->text('name_econom')->after('currency_code');
            $table->json('bro_color')->after('name_econom');
            $table->json('bro_counter_brand')->after('bro_color');
            $table->json('bro_brand')->after('bro_counter_brand');
            $table->json('params')->after('bro_brand');
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
