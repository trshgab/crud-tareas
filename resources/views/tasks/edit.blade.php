@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Editar Tarea</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-600">Título:</label>
                <input type="text" name="titulo" id="titulo" class="mt-1 p-2 border rounded w-full" value="{{ $task->titulo }}" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-600">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 p-2 border rounded w-full" required>{{ $task->descripcion }}</textarea>
            </div>

            <div class="mb-4">
                <label for="estatus" class="block text-sm font-medium text-gray-600">Estatus:</label>
                <select name="status_id" id="estatus" class="mt-1 p-2 border rounded w-full">
                    <!-- Aquí debes llenar las opciones del select según tus estados de tarea -->
                    <!-- Ejemplo -->
                    <option value="1" {{ $task->status_id == 1 ? 'selected' : '' }}>En Proceso</option>
                    <option value="2" {{ $task->status_id == 2 ? 'selected' : '' }}>Completada</option>
                    <!-- Fin del ejemplo -->
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Actualizar Tarea</button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('tasks.index') }}" class="text-blue-500">Volver a la Lista</a>
        </div>
    </div>
@endsection
