<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    //
    public static function defaultPermissions()
        {
            return [
                //roles
                'roles-listar','roles-crear','roles-editar','roles-borrar',
                //permissions
                'permissions-listar','permissions-crear','permissions-editar','permissions-borrar',
                //users
                'users-listar','users-crear','users-editar','users-borrar',                
                //registros
                'registros-listar','registros-crear','registros-editar','registros-borrar',              
                
            ];
        }
}