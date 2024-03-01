@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">{{ $task->titulo }}</h1>

        <p class="mb-4">{{ $task->descripcion }}</p>

        <p class="mb-4">
            <strong>Estatus:</strong>
            <!-- Mostrar el estado de la tarea -->
            @if ($task->status)
                {{ $task->status->nombre }}
            @else
                Sin Estado
            @endif
        </p>

        <p class="mb-4">
            <strong>Descripción:</strong>
            {{ $task->descripcion }}.
        </p>

        <p class="mb-4">
            <strong>Fecha y Hora de Creación:</strong>
            {{ $task->created_at }}.
        </p>

        

        <div class="mt-4">
            <a href="{{ route('tasks.index') }}" class="text-blue-500">Volver a la Lista</a>
        </div>
    </div>
@endsection
