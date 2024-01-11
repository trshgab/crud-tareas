@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Crear Nuevo Equipo</h1>

        <form action="{{ route('teams.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nombre del Equipo:</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <!-- Agregar checkbox para las páginas -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600">Páginas a las que se puede acceder:</label>
                <div class="mt-2">
                    <x-checkbox name="can_access_tasks" label="Tareas" /> 
                    <x-checkbox name="can_access_task_statuses" label="Estados de Tarea" />
                    <x-checkbox name="can_access_users" label="Usuarios" />
                    <x-checkbox name="can_access_user_activities" label="Actividades" />
                    <x-checkbox name="can_access_teams" label="Roles" />
                    
                </div>
            </div>

            <!-- Otras opciones relacionadas con la creación de equipos -->

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Crear Equipo</button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('teams.index') }}" class="text-blue-500">Volver a la Lista de Equipos</a>
        </div>
    </div>
@endsection
