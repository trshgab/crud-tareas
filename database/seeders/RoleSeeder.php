<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Cargando Roles');
        // $rol_owner = Role::create(['name'=>'Owner', 'team_id' => 1]);
        // $rol_admin = Role::create(['name'=>'Admin', 'team_id' => 2]);
        // $rol_admin = Role::create(['name'=>'User', 'team_id' => 3]);

        $rol_owner = Role::create(['name'=>'Owner', 'guard_name' => 'web']);
        $rol_admin = Role::create(['name'=>'Admin', 'guard_name' => 'web']);
        $rol_user = Role::create(['name'=>'User', 'guard_name' => 'web']);


        

        
                
    }
}