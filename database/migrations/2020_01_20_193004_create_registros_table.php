<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',60);//apellidos
            $table->string('apellido',60);//apellidos
            $table->string('cedula',10)->unique();//cedula
            $table->string('provincia',30);//apellidos
            $table->string('direccion');//apellidos
            $table->boolean('discapacidad')->default(false);//apellidos           
            $table->string('email')->unique();//email
            $table->boolean('ticket')->default(false);//entrega de ticket
            $table->integer('user_id')->nullable();//entrega de ticket
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
        Schema::dropIfExists('registros');
    }
}
