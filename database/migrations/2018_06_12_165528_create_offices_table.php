<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('offices')) {
        Schema::create('offices', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->integer('level');
            $table->integer('supervisior')->nullable();
            $table->integer('upper_office')->nullable();
            $table->primary('id');
            $table->foreign('supervisior')->references('id')->on('users');
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
        Schema::dropIfExists('offices');
    }
}
