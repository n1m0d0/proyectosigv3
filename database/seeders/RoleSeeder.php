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
        $role = Role::create(['name' => 'persona']);
        $role = Role::create(['name' => 'empresa']);
        $role = Role::create(['name' => 'oficial']);
        $role = Role::create(['name' => 'admin']);
    }
}
