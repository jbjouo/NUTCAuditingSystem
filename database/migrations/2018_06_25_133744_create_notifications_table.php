<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('notifications')) {
        Schema::create('notifications', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('u_id');
            $table->string('content',200)->collation('utf8_unicode_ci');
            $table->string('url',100);
            $table->timestamps();
            $table->foreign('u_id')->references('id')->on('users');
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
        Schema::dropIfExists('notifications');
    }
}
