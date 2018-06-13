<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('projects')) {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Year');
            $table->string('Audit_scope',1000);
            $table->string('Audit_focus',1000);
            $table->string('Audit_class',2);
            $table->string('Status',10);
            $table->integer('NumberOfYear');
            $table->timestamps();
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
        Schema::dropIfExists('projects');
    }
}
