<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class TestSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->longText('params')->nullable()->change();
            $table->longText('cape')->nullable()->change();
        });

        DB::statement('ALTER TABLE products ADD FULLTEXT fulltext_index (name, description, artikul, name_buh, params, cape, photo)');
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
