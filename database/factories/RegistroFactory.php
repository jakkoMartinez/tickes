<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Registro;
use Faker\Generator as Faker;

$factory->define(Registro::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->name,
        'apellido' => $faker->lastname,
        'cedula' => Str::random(10),
        'provincia' => $faker->city,
        'direccion' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        
    ];
});
/*
 $table->bigIncrements('id');
            $table->string('nombre',60);//apellidos
            $table->string('apellido',60);//apellidos
            $table->string('cedula',10)->unique();//cedula
            $table->string('provincia',30);//apellidos
            $table->string('direccion');//apellidos
            $table->boolean('discapacidad')->default(false);//apellidos           
            $table->string('email')->unique();//email
            $table->boolean('ticket')->default(false);//entrega de ticket
            $table->integer('user_id')->default(false);//entrega de ticket
            $table->timestamps();

*/