@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Lista de Tareas</h1>

        <table class="w-full border-collapse mb-6">
            <thead>
                <tr>
                    <th class="border p-2">#</th>
                    <th class="border p-2">Título</th>
                    <th class="border p-2">Estatus</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="border p-2">{{ $task->id }}</td>
                        <td class="border p-2">{{ $task->titulo }}</td>
                        <td class="border p-2">
                            <!-- Mostrar el estado de la tarea -->
                            @if ($task->status)
                                {{ $task->status->nombre }}
                            @else
                                Sin Estado
                            @endif
                        </td>
                        <td class="border p-2">
                            <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 mr-2">Ver</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-green-500">Editar</a>
                            <!-- Puedes agregar más acciones según tus necesidades -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <a href="{{ route('tasks.create') }}" class="text-blue-500">Crear Nueva Tarea</a>
        </div>
    </div>
@endsection
