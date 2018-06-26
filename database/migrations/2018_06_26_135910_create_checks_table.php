<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('checks')) {
        Schema::create('checks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('s_id');
            $table->boolean('result');
            $table->string('description');
            $table->string('supporting_information');
            $table->foreign('s_id')->references('id')->on('schedules');
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
        Schema::dropIfExists('checks');
    }
}
