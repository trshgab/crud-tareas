@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">    

        <h1 class="text-2xl font-semibold mb-6">Lista de Estados de Tarea</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead>
                    <tr>
                        {{-- <th class="border p-2">#</th> --}}
                        <th class="border p-2">Nombre</th>
                        <th class="border p-2">Descripción</th>
                        <th class="border p-2">Estado</th>
                        <th class="border p-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taskStatuses as $status)
                        <tr>
                            <td class="border p-2">{{ $status->nombre }}</td>
                            <td class="border p-2">{{ $status->descripcion ?: 'Sin descripción' }}</td>
                            <td class="border p-2" style="background-color: rgb({{ $status->color }}, 0.3);">{{ $status->nombre }}</td>

                            <td class="border p-2">

                                <form action="{{ route('task_statuses.show', $status->id) }}" method="get" class="inline">
                                    @csrf

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-eye"></i> Ver
                                    </button>
                                </form>


                                <form action="{{ route('task_statuses.edit', $status->id) }}" method="get" class="inline">
                                    @csrf

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
        </div>

        {{ $taskStatuses->links() }}

        <div class="mt-4">
            <a href="{{ route('task_statuses.create') }}" class="text-blue-500">Crear Nuevo Estado de Tarea</a>
        </div>
    </div>
@endsection
