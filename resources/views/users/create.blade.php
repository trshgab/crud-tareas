@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Crear Nuevo Usuario</h1>

        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nombre:</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Correo:</label>
                <input type="email" name="email" id="email" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Contraseña:</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <div class="mb-4">
                <label for="current_team_id" class="block text-sm font-medium text-gray-600">Rol:</label>
                <select name="current_team_id" id="current_team_id" class="mt-1 p-2 border rounded w-full" required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}">{{ $role }}</option>
                    @endforeach
                </select>
            </div>

            

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Crear Usuario</button>
            </div>


        </form>

        <div class="mt-4">
            <a href="{{ route('users.index') }}" class="text-blue-500">Volver a la Lista</a>
        </div>
    </div>
@endsection
