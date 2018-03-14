<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EacSubscribe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eac_subscribes', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id');
            $table->integer('race_id');
            $table->decimal('race_value', 8,2);
            $table->enum('blouse_height', ['P', 'M', 'G', 'GG']);
            $table->enum('terms', ['agree', 'degree']);


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
