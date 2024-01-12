<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\UserActivity;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index() // Muestra una lista de usuarios
    {
        $users = User::latest()->paginate(10);; // Obtengo todos los usuarios de la base de datos y los meto en una variable users(?)
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

        // Crea un nuevo usuario en la Base de datos
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'current_team_id' => $request->input('current_team_id'),
        ]);

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'action_type' => 'Creación de Usuario',
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario Registrado Correctamente'); // redirige a las lista de usuarios con un mensaje de exito
        
    }

    public function show(User $user) // Muestra un usuario especifico, por eso usa el <User $user>
    {

        $this->authorize('users.show', User::class);
        $roles = Role::pluck('name', 'id');

        return view('users.show', compact('user','roles'));

    }
    public function edit(User $user) //Muestra el form para editar un usuario especifico
    {
        $this->authorize('users.edit', User::class);
        // $user = User::find($user);
        // $users = User::all(); // Futuro selector 
        $roles = Role::pluck('name', 'id');

        return view('users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user) // Actualiza un usuario en la base de datos
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            //'password' => 'required|string|min:8',
            'current_team_id' => 'required|max:1'

        ]);
        
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            //'password' => bcrypt($request->input('password')),
            'current_team_id' => $request->input('current_team_id'),

        ]);

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'action_type' => 'Edicion De Usuario',
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario Actualizado Correctamente');
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
}
