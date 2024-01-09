@extends('layouts.app')

@section('content')
        <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">
        {{--<div class="bg-white p-6 rounded shadow-md mx-auto mt-10 ">--}}
            <h1 class="text-2xl font-semibold mb-6">Lista de Tareas</h1>

            <form action="{{ route('tasks.index') }}" method="GET" class="mb-4 flex">
                <div class="mr-4">
                    <label for="search" class="mr-2">Buscar por título:</label>
                    <input type="text" name="search" id="search" placeholder="Título" class="border p-2">
                </div>
            
                <div class="mr-4">
                    <label for="status" class="mr-2">Filtrar por estado:</label>
                    <select name="status_id" id="status" class="border p-2 w-60">
                        <option value="" selected>Seleccione un estado</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div>
                    <label for="day" class="mr-2">Filtrar por día:</label>
                    <input type="date" name="day" id="day" class="border p-2">
                </div>
            
                <button type="submit" class="bg-blue-500 text-white p-2 ml-2">Buscar</button>
            </form>

            <table class="w-full border-collapse mb-6">
                <thead>
                    <tr>
                        <th class="border p-2">Fecha y Hora</th>
                        <th class="border p-2">Título</th>
                        <th class="border p-2">Estado</th>
                        <th class="border p-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="border p-2">{{ $task->created_at }}</td>
                            <td class="border p-2">{{ $task->titulo }}</td>
                            <td class="border p-2" style="background-color: rgba({{ $task->status->color }}, 0.3);">{{ $task->status->nombre }}
                                <!-- Mostrar el estado de la tarea -->
                                @if ($task->status)
                                    
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
