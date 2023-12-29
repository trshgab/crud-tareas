@extends('layouts.app')

@section('content')
        <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">
        {{--<div class="bg-white p-6 rounded shadow-md mx-auto mt-10 ">--}}
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
                            <td class="border p-2">{{ $task->created_at }}</td>
                            <td class="border p-2">{{ $task->titulo }}</td>
                            <td class="border p-2">
                                <!-- Mostrar el estado de la tarea -->
                                @if ($task->status)
                                    {{ $task->status->nombre }}
                                @else
                                    Sin Estado
                                @endif
                            </td>
                            {{-- <td class="border p-2">
                                <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 mr-2">Ver</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-green-500">Editar</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-500">Eliminar</button>
                                </form>
                            </td> --}}
                            <td class="border p-2">
                                <!-- Botón para ver la actividad -->
                                <form action="{{ route('tasks.show', $task->id) }}" method="get" class="inline">
                                    @csrf
                                    {{-- @method('show') --}}
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-eye"></i> Ver
                                    </button>
                                </form>
    
                                <!-- Botón para editar la actividad -->
                                <form action="{{ route('tasks.edit', $task->id) }}" method="get" class="inline">
                                    @csrf
                                    {{-- @method('edit') --}}
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-edit"></i> Editar
                                    </button>
                                </form>
    
                                <!-- Botón para eliminar la actividad -->
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $tasks->links() }}

            <div class="mt-4">
                <a href="{{ route('tasks.create') }}" class="text-blue-500">Crear Nueva Tarea</a>
            </div>
        </div>
@endsection
