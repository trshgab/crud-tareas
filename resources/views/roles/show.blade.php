@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Detalles del Rol</h1>

        <div>
            <p class="text-sm font-medium text-gray-600">Nombre:</p>
            <p class="mt-1">{{ $role->name }}</p>
        </div>

        <div class="mt-4">
            <p class="mb-2 text-lg font-semibold text-gray-900">Permisos:</p>
            <ul class="max-w-md space-y-1 text-gray-500 list-inside">
                @forelse ($permissions as $permission)
                    <li class="flex items-center">
                        @if ($role->permissions->contains($permission))
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                        @else
                            <svg class="w-3.5 h-3.5 me-2 text-red-500 dark:text-red-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.707 13.293a1 1 0 0 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293a1 1 0 0 1 0 1.414Z"/>
                            </svg>
                        @endif
                        {{ $permission->display_name }}
                    </li>
                @empty
                    <li class="flex items-center">Sin Permisos</li>
                @endforelse
            </ul>
        </div>

        <div class="mt-6">
            <a href="{{ route('roles.index') }}" class="text-blue-500">Volver a la Lista</a>
        </div>
    </div>
@endsection
