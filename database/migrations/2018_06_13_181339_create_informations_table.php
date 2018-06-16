<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('infromations')) {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('position');
            $table->date('date_Arrival');
            $table->string('phone');
            $table->integer('o_id');
            $table->foreign('o_id')->references('id')->on('offices');
            $table->foreign('id')->references('id')->on('users');
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informations');
    }
}
