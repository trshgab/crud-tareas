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
        // $role1 = Role::create(['name'=>'Owner', 'team_id' => 1]);
        // $role2 = Role::create(['name'=>'Admin', 'team_id' => 2]);
        // $role3 = Role::create(['name'=>'User', 'team_id' => 3]);

        $role1 = Role::create(['name'=>'Owner', 'guard_name' => 'web']);


        $permission = Permission::create(['name' => 'tasks.create'])->assignRole($role1);
        $permission = Permission::create(['name' => 'tasks.show'])->assignRole($role1);
        $permission = Permission::create(['name' => 'tasks.edit'])->assignRole($role1);
        $permission = Permission::create(['name' => 'tasks.destroy'])->assignRole($role1);

        $permission = Permission::create(['name' => 'task_statuses.create'])->assignRole($role1);
        $permission = Permission::create(['name' => 'task_statuses.show'])->assignRole($role1);
        $permission = Permission::create(['name' => 'task_statuses.edit'])->assignRole($role1);
        $permission = Permission::create(['name' => 'task_statuses.destroy'])->assignRole($role1);
        
        $permission1 = Permission::create(['name' => 'users.create'])->assignRole($role1);
        $permission2 = Permission::create(['name' => 'users.show'])->assignRole($role1);
        $permission3 = Permission::create(['name' => 'users.edit'])->assignRole($role1);
        $permission4 = Permission::create(['name' => 'users.destroy'])->assignRole($role1);
        
        $permission1 = Permission::create(['name' => 'user_activities.create'])->assignRole($role1);
        $permission2 = Permission::create(['name' => 'user_activities.show'])->assignRole($role1);
        $permission3 = Permission::create(['name' => 'user_activities.edit'])->assignRole($role1);
        $permission4 = Permission::create(['name' => 'user_activities.destroy'])->assignRole($role1);

        //  $user= User::find(1);
          //dd($role1);
        //  $user->assignRole($role1);
        // $user= User::find(2);
        //dd($user);
         // $user->assignRole($role1, '1')->toSql();
         // User::find(3)->assignRole('User');

        $user = User::find(1);
        $user->assignRole($role1);

         


        

        
    }
}