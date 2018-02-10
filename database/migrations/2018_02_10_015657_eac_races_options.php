<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EacRacesOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eac_races_options', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('race_id');
            $table->string('trj1');
            $table->string('trj2');
            $table->string('trj3');
            $table->string('trj4');
            $table->string('trj5');
            $table->string('trj6');

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
