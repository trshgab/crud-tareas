@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Editar Equipo</h1>

        <form action="{{ route('teams.update', $team->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nombre del Equipo:</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded w-full" value="{{ $team->name }}" required>
            </div>

            <!-- Otras opciones relacionadas con la edición de equipos -->

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Actualizar Equipo</button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('teams.index') }}" class="text-blue-500">Volver a la Lista de Equipos</a>
        </div>
    </div>
@endsection
