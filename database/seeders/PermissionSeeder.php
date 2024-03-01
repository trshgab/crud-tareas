<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Cargando Permisos');

        $permission = Permission::create(['name' => 'tasks.create', 'display_name' => 'Crear Tareas'])->syncRoles(['Owner','Admin','User']);
        $permission = Permission::create(['name' => 'tasks.show', 'display_name' => 'Mostrar Tareas'])->syncRoles(['Owner','Admin','User']);
        $permission = Permission::create(['name' => 'tasks.edit', 'display_name' => 'Editar Tareas'])->syncRoles(['Owner','Admin']);;
        $permission = Permission::create(['name' => 'tasks.destroy', 'display_name' => 'Eliminar Tareas'])->syncRoles(['Owner','Admin']);
        $permission = Permission::create(['name' => 'tasks.navbar', 'display_name' => 'Ver Tareas'])->syncRoles(['Owner','Admin','User']);

        $permission = Permission::create(['name' => 'task_statuses.create', 'display_name' => 'Crear Estados de Tareas'])->syncRoles(['Owner']);
        $permission = Permission::create(['name' => 'task_statuses.show', 'display_name' => 'Mostrar Estados de Tareas'])->syncRoles(['Owner','Admin']);
        $permission = Permission::create(['name' => 'task_statuses.edit', 'display_name' => 'Editar Estados de Tareas'])->assignRole('Owner');
        $permission = Permission::create(['name' => 'task_statuses.destroy', 'display_name' => 'Eliminar Estados de Tareas'])->assignRole('Owner');
        $permission = Permission::create(['name' => 'task_statuses.navbar', 'display_name' => 'Ver Estados de Tareas'])->syncRoles(['Owner','Admin','User']);
        
        $permission = Permission::create(['name' => 'users.create', 'display_name' => 'Crear Usuarios'])->syncRoles(['Owner']);
        $permission = Permission::create(['name' => 'users.show', 'display_name' => 'Mostrar Usuarios'])->syncRoles(['Owner','Admin']);
        $permission = Permission::create(['name' => 'users.edit', 'display_name' => 'Editar Usuarios'])->assignRole('Owner');
        $permission = Permission::create(['name' => 'users.destroy', 'display_name' => 'Eliminar Usuarios'])->assignRole('Owner');
        $permission = Permission::create(['name' => 'users.navbar', 'display_name' => 'Ver Usuarios'])->syncRoles(['Owner','Admin']);
        
        $permission = Permission::create(['name' => 'user_activities.create', 'display_name' => 'Crear Actividades de Usuario'])->assignRole('Owner');
        $permission = Permission::create(['name' => 'user_activities.show', 'display_name' => 'Mostrar Actividades de Usuario'])->syncRoles(['Owner','Admin']);
        $permission = Permission::create(['name' => 'user_activities.edit', 'display_name' => 'Editar Actividades de Usuario'])->assignRole('Owner');
        $permission = Permission::create(['name' => 'user_activities.destroy', 'display_name' => 'Eliminar Actividades de Usuario'])->assignRole('Owner');
        $permission = Permission::create(['name' => 'user_activities.navbar', 'display_name' => 'Ver Actividades de Usuario'])->syncRoles(['Owner','Admin']);

        $permission = Permission::create(['name' => 'roles.create', 'display_name' => 'Crear Roles'])->assignRole('Owner');
        $permission = Permission::create(['name' => 'roles.show', 'display_name' => 'Mostrar Roles'])->syncRoles(['Owner','Admin']);
        $permission = Permission::create(['name' => 'roles.edit', 'display_name' => 'Editar Roles'])->assignRole('Owner');
        $permission = Permission::create(['name' => 'roles.destroy', 'display_name' => 'Eliminar Roles'])->assignRole('Owner');
        $permission = Permission::create(['name' => 'roles.navbar', 'display_name' => 'Ver Roles'])->assignRole('Owner');

        

    }
}
