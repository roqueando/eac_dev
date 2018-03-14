<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EacSubscribeOpt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eac_subscribes', function (Blueprint $table) {
            $table->enum("status", ['paid', 'canceled', 'waiting']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eac_subscribes', function (Blueprint $table) {
            //
        });
    }
}
