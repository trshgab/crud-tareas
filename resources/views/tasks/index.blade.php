@extends('layouts.app')

@section('content')
        <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">
        {{--<div class="bg-white p-6 rounded shadow-md mx-auto mt-10 ">--}}
            <h1 class="text-2xl font-semibold mb-6">Lista de Tareas</h1>

            <form action="{{ route('tasks.index') }}" method="GET" class="mb-4 flex">
                <div class="mr-4">
                    <label for="search" class="mr-2">Buscar por título:</label>
                    <input type="text" name="search" id="search" placeholder="Título" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            
                <div class="mr-4">
                    <label for="status" class="mr-2">Filtrar por estado:</label>
                    <select name="status_id" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Seleccione un estado</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <script>
                    $(document).ready(function() {
                        $('#status').select2({
                            placeholder: 'Seleccione un estado',
                            allowClear: true // Esto permite borrar la selección
                        });
                    });
                </script> --}}
                
                
            
                <div class="mr-4">
                    
                    <label for="day" class="mr-2">Filtrar por día:</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                          </svg>
                        </div>
                        <input datepicker datepicker-format="yyyy/mm/dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" name="day" id="day">
                    </div>
                      
                </div>
                
                <div class="mr-4">
                    <label for="user_id" class="mr-2">Filtrar por Responsable:</label>
                    <select name="user_id" id="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Seleccione un responsable</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mr-4">
                    <br>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                </div>
            </form>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Fecha y Hora</th>
                            <th scope="col" class="px-6 py-3">Título</th>
                            <th scope="col" class="px-6 py-3">Creador</th>
                            <th scope="col" class="px-6 py-3">Estado</th>
                            <th scope="col" class="px-6 py-3">Responsable</th>
                            <th scope="col" class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr class="bg-gray-200 border-b ">
                                <td  scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $task->created_at }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $task->titulo }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $task->task_creator }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" style="background-color: rgba({{ $task->status->color }}, 0.5);">{{ $task->status->nombre }}
                                    <!-- Mostrar el estado de la tarea -->
                                    @if ($task->status)
                                        
                                    @else
                                        Sin Estado
                                    @endif
                                </td>

                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $task->creator->name }} <!-- Muestra el nombre del responsable -->
                                </td>
                               
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <!-- Botón para ver la actividad -->
                                    <form action="{{ route('tasks.show', $task->id) }}" method="get" class="inline">
                                        @csrf
                                        {{-- @method('show') --}}
                                        <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                            <i class="fas fa-eye"></i> Ver
                                        </button>
                                    </form>
        
                                    <!-- Botón para editar la actividad -->
                                    <form action="{{ route('tasks.edit', $task->id) }}" method="get" class="inline">
                                        @csrf
                                        {{-- @method('edit') --}}
                                        <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
        
                                    <!-- Botón para eliminar la actividad -->
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
            @if(session('success'))
                <div class="bg-green-200 border-green-500 text-green-800 border-l-4 p-4 mt-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        
            {{ $tasks->links() }}
            @can('tasks.create')
                <div class="mt-4">
                    <a href="{{ route('tasks.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Nueva Tarea</a>
                </div>
            @endif

            
            
        </div>
@endsection


