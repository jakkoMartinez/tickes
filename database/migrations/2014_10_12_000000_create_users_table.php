<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');//id
            $table->string('name');//nombres
            $table->string('lastname');//apellidos
            $table->string('idcard',10)->unique();//cedula         
            $table->string('email')->unique();//email
            $table->timestamp('email_verified_at')->nullable();//verif email
            $table->string('password');//contraseña
            $table->rememberToken();
            $table->timestamps();

        });
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
