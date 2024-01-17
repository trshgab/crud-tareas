@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">
        <h1 class="text-2xl font-semibold mb-6">Registro de Actividades de Usuarios</h1>

        <form action="{{ route('user_activities.index') }}" method="GET" class="mb-4 flex">
                <div class="mr-4">
                    <label for="search" class="mr-2">Buscar por Usuario:</label>
                    <input type="text" name="search" id="search" placeholder="Nombre de Usuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="mr-4">
                    <label for="action_type" class="mr-2">Filtrar por Acción:</label>
                    <input type="text" name="action_type" id="action_type" placeholder="Tipo de Acción" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

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
                    <br>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                
            
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-400">
                    <tr>
                        
                        <th scope="col" class="px-6 py-3">Fecha y Hora</th>
                        <th scope="col" class="px-6 py-3">Usuario</th>
                        <th scope="col" class="px-6 py-3">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userActivities as $activity)
                        <tr>
                            
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $activity->created_at }}</td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $activity->user->name }}</td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $activity->action_type }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
    

        {{ $userActivities->links() }}

        
    </div>
@endsection
