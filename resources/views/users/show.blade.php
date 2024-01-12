@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Detalles del Usuario</h1>

        <div>
            <p class="text-sm font-medium text-gray-600">Nombre:</p>
            <p class="mt-1">{{ $user->name}}</p>
        </div>

        <div class="mt-4">
            <p class="text-sm font-medium text-gray-600">Correo:</p>
            <p class="mt-1">{{ $user->email}}</p>
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

        <div class="mt-6">
            <a href="{{ route('users.index') }}" class="text-blue-500">Volver a la Lista</a>
        </div>
    </div>
@endsection
