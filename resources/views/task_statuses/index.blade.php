@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">    
        <h1 class="text-2xl font-semibold mb-6">Lista de Estados de Tarea</h1>

        <table class="w-full border-collapse mb-6">
            <thead>
                <tr>
                    {{-- <th class="border p-2">#</th> --}}
                    <th class="border p-2">Nombre</th>
                    <th class="border p-2">Descripción</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taskStatuses as $status)
                    <tr>
                        {{-- <td class="border p-2">{{ $status->id }}</td> --}}
                        <td class="border p-2">{{ $status->nombre }}</td>
                        <td class="border p-2">{{ $status->descripcion ?: 'Sin descripción' }}</td>
                        {{-- <td class="border p-2">
                            <a href="{{ route('task_statuses.show', $status->id) }}" class="text-blue-500 mr-2">Ver</a>
                            <a href="{{ route('task_statuses.edit', $status->id) }}" class="text-green-500">Editar</a>
                            <form action="{{ route('task_statuses.destroy', $status->id) }}" method="post" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-500">Eliminar</button>
                            </form>
                        </td> --}}
                        <td class="border p-2">
                            <!-- Botón para ver la actividad -->
                            <form action="{{ route('task_statuses.show', $status->id) }}" method="get" class="inline">
                                @csrf
                                {{-- @method('show') --}}
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-eye"></i> Ver
                                </button>
                            </form>

                            <!-- Botón para editar la actividad -->
                            <form action="{{ route('task_statuses.edit', $status->id) }}" method="get" class="inline">
                                @csrf
                                {{-- @method('edit') --}}
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                            </form>

                            <!-- Botón para eliminar la actividad -->
                            <form action="{{ route('task_statuses.destroy', $status->id) }}" method="post" class="inline">
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

        {{ $taskStatuses->links() }}

        <div class="mt-4">
            <a href="{{ route('task_statuses.create') }}" class="text-blue-500">Crear Nuevo Estado de Tarea</a>
        </div>
    </div>
@endsection
