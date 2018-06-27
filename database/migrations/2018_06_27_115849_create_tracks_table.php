<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('tracks')) {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_id');
            $table->foreign('c_id')->references('id')->on('checks');
            $table->dateTime('deadline');
            $table->string('content',1000)->collation('utf8_unicode_ci');
            $table->string('schedule',1000)->collation('utf8_unicode_ci');
            $table->string('cost',1000)->collation('utf8_unicode_ci');
            $table->string('benefit',1000)->collation('utf8_unicode_ci');
            $table->dateTime('reply_time');
            $table->string('result',20)->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('tracks');
    }
}
