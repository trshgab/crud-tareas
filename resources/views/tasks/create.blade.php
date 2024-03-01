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
                    <option value="">Seleccionar Estado</option> {{-- Opción por defecto --}}
                    @foreach($taskStatuses as $status)
                        <option value="{{ $status->id }}" {{ $status->id == 3 ? 'selected' : ''}}>
                            {{ $status->nombre }}
                        </option>
                    @endforeach 
                </select>
            </div>

            <div class="mb-4">
                <label for="task_creator" class="block text-sm font-medium text-gray-600">Creador:</label>
                <input type="text" name="task_creator" id="task_creator" class="mt-1 p-2 border rounded w-full" value={{Auth::user()->name}} @readonly(true)>
            </div>


            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-600">Responsable:</label>
                <select name="user_id" id="user_id" class="mt-1 p-2 border rounded w-full" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mt-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar Tarea</button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('tasks.index') }}" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Volver a la Lista</a>
        </div>
    </div>
@endsection
