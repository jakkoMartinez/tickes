<?php
use App\Role;
use App\User;
use App\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('¿Desea actualizar la migración antes de sembrar? Borrará todos los datos antiguos?')) {
            $this->command->call('migrate:refresh');
            $this->command->warn("Datos borrados, Iniciando la base de datos en blanco.");
           
        }
        // Seed the default permissions
        $permissions = Permission::defaultPermissions();
        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }
        $this->command->info('Permisos predeterminados agregados.');
        // Confirm roles needed
        if ($this->command->confirm('Crear roles para el usuario,los valores predeterminados son Administrador y Usuario? [y|N]', true)) {
            // Ask for roles from input
            $input_roles = ('Administrador,Usuario');
            // Explode roles
            $roles_array = explode(',', $input_roles);
            // add roles
            foreach($roles_array as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);
                if( $role->name == 'Administrador' ) {
                    // assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Al administrador se otorgó todos los permisos');
                } else {
                    // for others by default only read access
                    $role->syncPermissions(Permission::where('name', 'LIKE', '%-listar')->get());
                }
                // create one user for each role
                //$this->createUser($role);
            }
            $this->command->info('Roles ' . $input_roles . ' agregado exitosamente');
        } else {
            Role::firstOrCreate(['name' => 'Usuario']);
            $this->command->info('Solo se agregó la función de usuario predeterminada.');
        }
        $this->call(RegistrosTableSeeder::class);
            
    }        
}
