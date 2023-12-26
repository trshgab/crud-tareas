<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() // Muestra una lista de usuarios
    {
        $users = User::all(); // Obtengo todos los usuarios de la base de datos y los meto en una variable users(?)
        return view('users.index', compact('users'));
    }

    public function create() // Muestro el formulario para registrar un usuario 
    {
        return view('users.create');
    }

    public function store(Request $request) // Almaceno Usuarios en la base de datos
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|string|min:8',

        ]);

        // Crea un nuevo usuario en la Base de datos
        User::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),

        ]);

        return redirect()->route('users.index')->with('success', 'Usuario Registrado Correctamente'); // redirige a las lista de usuarios con un mensaje de exito
        
    }

    public function show(User $user) // Muestra un usuario especifico, por eso usa el <User $user>
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user) //Muestra el form para editar un usuario especifico
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user) // Actualiza un usuario en la base de datos
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|string|min:8',

        ]);
        
        $user->update([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),

        ]);

        return redirect()->route('users.index')->with('success', 'Usuario Actualizado Correctamente');
    }

    public function destroy(User $user) // Elimina un usuario
    {
        $user->delete(); // Elimina
        return redirect()->route('users.index')->with('sucess', 'Usuario Eliminado Exitosamente'); // Redirige
    }
}
