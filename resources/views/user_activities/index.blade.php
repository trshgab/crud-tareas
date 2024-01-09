@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">
        <h1 class="text-2xl font-semibold mb-6">Registro de Actividades de Usuarios</h1>

        <form action="{{ route('user_activities.index') }}" method="GET" class="mb-4 flex">
                <div class="mr-4">
                    <label for="search" class="mr-2">Buscar por Usuario:</label>
                    <input type="text" name="search" id="search" placeholder="Nombre de Usuario" class="border p-2">
                </div>

                <div class="mr-4">
                    <label for="action_type" class="mr-2">Filtrar por Acción:</label>
                    <input type="text" name="action_type" id="action_type" placeholder="Tipo de Acción" class="border p-2">
                </div>

                <div class="mr-4">
                    <label for="day" class="mr-2">Filtrar por Día:</label>
                    <input type="date" name="day" id="day" class="border p-2">
                </div>

            <button type="submit" class="bg-blue-500 text-white p-2 ml-2">Buscar</button>
        </form>

        <table class="w-full border-collapse mb-6">
            <thead>
                <tr>
                    <th class="border p-2">#</th>
                    <th class="border p-2">Fecha y Hora</th>
                    <th class="border p-2">Usuario</th>
                    <th class="border p-2">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userActivities as $activity)
                    <tr>
                        <td class="border p-2">{{ $activity->id }}</td>
                        <td class="border p-2">{{ $activity->created_at }}</td>
                        <td class="border p-2">{{ $activity->user->name }}</td>
                        <td class="border p-2">{{ $activity->action_type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $userActivities->links() }}

        <div class="mt-4">
            
        </div>
    </div>
@endsection
