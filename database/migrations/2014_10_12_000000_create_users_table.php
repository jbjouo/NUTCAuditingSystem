<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('users')) {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('Account',10)->primary()->comment('帳號');
            $table->string('Password',100);
            $table->string('Name',20)->collation('utf8_unicode_ci');
            $table->string('Email',200);
            $table->char('AuthCode',10)->collation('utf8_unicode_ci');
            $table->boolean('IsNewMember',1);
            $table->integer('Role');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
