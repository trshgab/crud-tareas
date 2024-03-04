<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use App\Models\User;


class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }


    public function create()
    {
        $this->authorize('roles.create', Role::class);

        $permissions = Permission::all();
        $users = User::all();


        
        
        return view('roles.create', compact('permissions','users'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array',
        ]);
        
    
        $role = Role::create([
            'name' => $request->input('name'),
            
        ]);

        
        
        
        
        
        

        $permissions = $request->input('permissions',[]);
    
        $role->syncPermissions($permissions);
    
        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
        
    }

    public function show(Role $role)
    {
        $this->authorize('roles.show', Role::class);

        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('roles.show', compact('role', 'permissions', 'rolePermissions'));

    }

    public function edit(Role $role)
    {
        $this->authorize('roles.edit', Role::class);

        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));

        



    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'array', 
        ]);

        $role->update([
            'name' => $request->input('name'),
        ]);

        $permissions = $request->input('permissions', []);
        $role->syncPermissions($permissions);


        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente.');
    }

    public function destroy(Role $role)
    {
        $this->authorize('tasks.destroy', Role::class);
        $role->delete();


        
        return redirect()->route('roles.index')->with('error', 'Rol Eliminado Correctamente');
    }
}
