@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Editar Estado de Tarea</h1>

        <form action="{{ route('task_statuses.update', $taskStatus->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 p-2 border rounded w-full" value="{{ $taskStatus->nombre }}" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-600">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 p-2 border rounded w-full">{{ $taskStatus->descripcion }}</textarea>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Actualizar Estado de Tarea</button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('task_statuses.index') }}" class="text-blue-500">Volver a la Lista</a>
        </div>
    </div>
@endsection
