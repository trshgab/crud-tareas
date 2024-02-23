<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\UserActivity;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() // Muestra una lista de usuarios
    {
        $users = User::oldest()->paginate(10);; // Obtengo todos los usuarios de la base de datos y los meto en una variable users(?)
        return view('users.index', compact('users'));
    }

    public function create() // Muestro el formulario para registrar un usuario 
    {
        $this->authorize('users.create', User::class);
        $roles = Role::pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    public function store(Request $request) // Almaceno Usuarios en la base de datos
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'current_team_id' => 'required|max:1'
        ]);

        // Crea un nuevo usuario en la base de datos
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'current_team_id' => $request->input('current_team_id'),
        ]);

        // Asignar el rol al usuario
        if ($request->has('current_team_id')) {
            $role = Role::findById($request->input('current_team_id'));
            $user->assignRole($role);
        }

        // Crear una actividad de usuario
        UserActivity::create([
            'user_id' => auth()->user()->id,
            'action_type' => 'Creación de Usuario',
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario registrado correctamente');
    }

    public function show(User $user) // Muestra un usuario especifico, por eso usa el <User $user>
    {

        $this->authorize('users.show', User::class);
        $roles = Role::pluck('name', 'id');

        return view('users.show', compact('user','roles'));

    }
    public function edit(User $user)
    {
        $this->authorize('users.edit', User::class);
        $roles = Role::pluck('name', 'id');
        $selectedRole = $user->roles->pluck('id')->toArray(); // Obtener el ID del rol actual del usuario
        return view('users.edit', compact('user', 'roles', 'selectedRole'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
    
        // Actualizar los datos básicos del usuario
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
    
        // Asignar el nuevo rol al usuario
        if ($request->has('current_team_id')) {
            $role = Role::findById($request->input('current_team_id'));
            $user->syncRoles([$role]);
        }
    
        // Crear una actividad de usuario
        UserActivity::create([
            'user_id' => auth()->user()->id,
            'action_type' => 'Edición de Usuario',
        ]);
    
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user) // Elimina un usuario
    {
        $this->authorize('users.create', User::class);
        $user->delete(); // Elimina

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'action_type' => 'Eliminación de Usuario',
        ]);

        return redirect()->route('users.index')->with('sucess', 'Usuario Eliminado Exitosamente'); // Redirige
    }
    public function updatePassword(Request $request, User $user)
    {
        // Validar los datos del formulario
        $request->validate([
            'newPassword' => 'required|string|min:8|confirmed', // La regla "confirmed" verifica si el campo de confirmación coincide con el campo de nueva contraseña
        ]);

        // Actualizar la contraseña del usuario
        $user->update([
            'password' => bcrypt($request->newPassword),
        ]);

        // Redirigir de vuelta a la vista de detalles del usuario con un mensaje de éxito
        return redirect()->route('users.show', $user)->with('success', 'Contraseña actualizada exitosamente');
    }

}
