<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('schedules')) {
        Schema::create('schedules', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('P_id');
            $table->foreign('P_id')->references('project')->on('id');
            $table->integer('O_id');
            $table->integer('Item_project');
            $table->string('Category',1000)->collation('utf8_unicode_ci');
            $table->string('Focus',1000)->collation('utf8_unicode_ci');
            $table->dateTime('Start_date');
            $table->dateTime('End_date');
            $table->integer('Audit_user');
            $table->foreign('Audit_user')->references('user')->on('id');
            $table->boolean('Issend',1);
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
        Schema::dropIfExists('schedule');
    }
}
