@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Crear Nueva Tarea</h1>

        <form action="{{ route('tasks.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-600">Título:</label>
                <input type="text" name="titulo" id="titulo" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-600">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 p-2 border rounded w-full"></textarea>
            </div>

            <div class="mb-4">
                <label for="estatus" class="block text-sm font-medium text-gray-600">Estado:</label>
                <select name="status_id" id="estatus" class="mt-1 p-2 border rounded w-full">
                    @foreach($taskStatuses as $status)
                        <option value="{{ $status->id }}" {{ $status->id == 3 ? 'selected' : ''}}> {{-- Por default es Pendiente --}}
                            {{ $status->nombre }}
                        </option>
                    @endforeach 
                    
                </select>
            </div>
            

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Guardar Tarea</button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('tasks.index') }}" class="text-blue-500">Volver a la Lista</a>
        </div>
    </div>
@endsection
