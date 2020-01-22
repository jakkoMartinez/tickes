<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Registro extends Model
{
    
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido','cedula','provincia','direccion','discapacidad','email','ticket','user_id','created_at'
    ];
     //Query Scope

     public function scopeCedula($query, $cedula)
     {
         if($cedula)
             return $query->where('cedula', 'LIKE', "%$cedula%");
     }
     public function scopeNombre($query, $nombre)
     {
         if($nombre)
             return $query->where('nombre', 'LIKE', "%$nombre%");
     }
 
     public function scopeApellido($query, $apellido)
     {
         if($apellido)
             return $query->where('apellido', 'LIKE', "%$apellido%");
     }
 
}
