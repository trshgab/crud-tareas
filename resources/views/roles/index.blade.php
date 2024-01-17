@extends('layouts.app')

@section('content')
        <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">
        {{--<div class="bg-white p-6 rounded shadow-md mx-auto mt-10 ">--}}
            <h1 class="text-2xl font-semibold mb-6">Administracion de Roles</h1>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-400">
                        <tr>
                            
                            <th scope="col" class="px-6 py-3">Nombre de Rol</th>
                            <th scope="col" class="px-6 py-3">Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr class="bg-gray-200 border-b ">
                                
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $role->name }}</td>
                                
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <!-- Botón para ver la actividad -->
                                    <form action="{{ route('roles.show', $role->id) }}" method="get" class="inline">
                                        @csrf
                                        {{-- @method('show') --}}
                                        <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                            <i class="fas fa-eye"></i> Ver
                                        </button>
                                    </form>
        
                                    <!-- Botón para editar la actividad -->
                                    <form action="{{ route('roles.edit', $role->id) }}" method="get" class="inline">
                                        @csrf
                                        {{-- @method('edit') --}}
                                        <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
        
                                    <!-- Botón para eliminar la actividad -->
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="inline">
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
            
            @can('roles.create')
                <div class="mt-4">
                    <a href="{{ route('roles.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Nuevo Rol</a>
                </div>
            @endcan 

            
            
        </div>
@endsection
