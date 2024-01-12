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


        

        $permission = Permission::create(['name' => 'tasks.create'])->syncRoles([$rol_owner,$rol_admin, $rol_user]);
        $permission = Permission::create(['name' => 'tasks.show'])->syncRoles([$rol_owner,$rol_admin, $rol_user]);
        $permission = Permission::create(['name' => 'tasks.edit'])->syncRoles([$rol_owner,$rol_admin, $rol_user]);
        $permission = Permission::create(['name' => 'tasks.destroy'])->syncRoles([$rol_owner,$rol_admin]);
        $permission = Permission::create(['name' => 'tasks.navbar'])->syncRoles([$rol_owner,$rol_admin, $rol_user]);

        $permission = Permission::create(['name' => 'task_statuses.create'])->syncRoles([$rol_owner]);
        $permission = Permission::create(['name' => 'task_statuses.show'])->syncRoles([$rol_owner,$rol_admin]);
        $permission = Permission::create(['name' => 'task_statuses.edit'])->assignRole($rol_owner);
        $permission = Permission::create(['name' => 'task_statuses.destroy'])->assignRole($rol_owner);
        $permission = Permission::create(['name' => 'task_statuses.navbar'])->syncRoles([$rol_owner,$rol_admin, $rol_user]);
        
        $permission = Permission::create(['name' => 'users.create'])->syncRoles([$rol_owner]);
        $permission = Permission::create(['name' => 'users.show'])->syncRoles([$rol_owner,$rol_admin]);
        $permission = Permission::create(['name' => 'users.edit'])->assignRole($rol_owner);
        $permission = Permission::create(['name' => 'users.destroy'])->assignRole($rol_owner);
        $permission = Permission::create(['name' => 'users.navbar'])->syncRoles([$rol_owner,$rol_admin]);
        
        $permission = Permission::create(['name' => 'user_activities.create'])->assignRole($rol_owner);
        $permission = Permission::create(['name' => 'user_activities.show'])->syncRoles([$rol_owner,$rol_admin]);
        $permission = Permission::create(['name' => 'user_activities.edit'])->assignRole($rol_owner);
        $permission = Permission::create(['name' => 'user_activities.destroy'])->assignRole($rol_owner);
        $permission = Permission::create(['name' => 'user_activities.navbar'])->assignRole($rol_owner);

        

        

         


        

        
    }
}