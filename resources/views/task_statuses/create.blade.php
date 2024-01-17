@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Crear Nuevo Estado de Tarea</h1>

        <form action="{{ route('task_statuses.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-600">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 p-2 border rounded w-full"></textarea>
            </div>

            <div class="mb-4">
                <label for="color" class="block text-sm font-medium text-gray-600">Color:</label>
                <input type="color" name="color" id="color" class="mt-4 p-1 border rounded w-full">
            </div>

            <div class="mt-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Estado de Tarea</button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('task_statuses.index') }}" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Volver a la Lista</a>
        </div>
    </div>
@endsection


