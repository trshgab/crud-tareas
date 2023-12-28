@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">    
        <h1 class="text-2xl font-semibold mb-6">Administración de Usuarios</h1>

        <table class="w-full border-collapse mb-6">
            <thead>
                <tr>
                    <th class="border p-2">#</th>
                    <th class="border p-2">Usuario</th>
                    <th class="border p-2">Correo</th>
                    <th class="border p-2">Rol</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border p-2">{{ $user->id }}</td>
                        <td class="border p-2">{{ $user->name }}</td>
                        <td class="border p-2">{{ $user->email}}</td>
                        <td class="border p-2">{{ $user->team->name}}</td>
                        <td class="border p-2">
                            <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 mr-2">Ver</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="text-green-500">Editar</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-500">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <a href="{{ route('users.create')}}" class="text-blue-500">Crear Nuevo Usuario</a>
        </div>
    </div>
@endsection