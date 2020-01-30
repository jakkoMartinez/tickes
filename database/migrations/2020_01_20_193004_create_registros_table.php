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
            $table->string('nombre',60);//nombres
            $table->string('apellido',60);//apellidos
            $table->string('cedula',10)->unique();//cedula
            $table->string('provincia',30);//ciudad
            //$table->string('direccion');//apellidos
            $table->string('discapacidad',2)->default('NO');//discapacidad           
            $table->string('email')->unique();//email
            $table->boolean('ticket')->default(false);//entrega de ticket
            $table->integer('user_id')->nullable();//usuario que entrega de ticket
            //$table->integer('ticketzona_id')->nullable();//zona de ticket
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
