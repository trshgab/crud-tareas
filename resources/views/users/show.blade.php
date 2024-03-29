@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Detalles del Usuario</h1>

        <div>
            <p class="text-sm font-medium text-gray-600">Nombre:</p>
            <p class="mt-1">{{ $user->name }}</p>
        </div>

        <div class="mt-4">
            <p class="text-sm font-medium text-gray-600">Correo:</p>
            <p class="mt-1">{{ $user->email }}</p>
        </div>

        <div class="mt-4">
            <p class="text-sm font-medium text-gray-600">Rol:</p>
            <p class="mt-1">
                @forelse ($user->roles as $role)
                    {{ $role->name }}                              
                @empty
                    Sin Rol
                @endforelse
            </p>
        </div>

        
        <!-- Formulario para cambiar la contraseña -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Cambiar Contraseña</h2>
            <form action="{{ route('users.updatePassword', $user) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="newPassword" class="block text-sm font-medium text-gray-700">Nueva Contraseña:</label>
                    <input type="password" name="newPassword" id="newPassword" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                
                <div class="mb-4">
                    <label for="newPassword_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Nueva Contraseña:</label>
                    <input type="password" name="newPassword_confirmation" id="newPassword_confirmation" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Cambiar Contraseña</button>
            </form>
        </div>
        <div class="mt-6">
            <a href="{{ route('users.index') }}" class="text-blue-500">Volver a la Lista</a>
        </div>
    </div>
@endsection
