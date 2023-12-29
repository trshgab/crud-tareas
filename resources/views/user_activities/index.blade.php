@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">
        <h1 class="text-2xl font-semibold mb-6">Registro de Actividades de Usuarios</h1>

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

        <div class="mt-4">
            <!-- Agrega aquí enlaces adicionales o botones según sea necesario -->
        </div>
    </div>
@endsection
