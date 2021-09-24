<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'persona']); // joven
        $role = Role::create(['name' => 'empresa']); // unidad economica
        $role = Role::create(['name' => 'oficial']); // oficial operativo
        $role = Role::create(['name' => 'responsable']); // responsable tecnico
        $role = Role::create(['name' => 'fiduciario']); // efiduciario
        $role = Role::create(['name' => 'admin']); // administrador del sistema
    }
}
