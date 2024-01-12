@extends('layouts.app')

@section('content')
        <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">
        {{--<div class="bg-white p-6 rounded shadow-md mx-auto mt-10 ">--}}
            <h1 class="text-2xl font-semibold mb-6">Administracion de Rolwes</h1>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">Nombre de Rol</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr class="bg-gray-200 border-b ">
                                <td  scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $task->created_at }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $task->titulo }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" style="background-color: rgba({{ $task->status->color }}, 0.5);">{{ $task->status->nombre }}
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
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
            </div>
            {{ $tasks->links() }}
            @can('tasks.create')
                <div class="mt-4">
                    <a href="{{ route('tasks.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Nueva Tarea</a>
                </div>
            @endif

            
            
        </div>
@endsection
