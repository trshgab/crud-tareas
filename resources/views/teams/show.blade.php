@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Detalles del Equipo</h1>

        <div>
            <p class="text-sm font-medium text-gray-600">Nombre del Equipo:</p>
            <p class="mt-1">{{ $team->name }}</p>
        </div>

        <!-- Otras opciones relacionadas con la visualización de detalles de equipos -->

        <div class="mt-6">
            <a href="{{ route('teams.index') }}" class="text-blue-500">Volver a la Lista de Equipos</a>
        </div>
    </div>
@endsection
