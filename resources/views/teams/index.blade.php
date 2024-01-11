@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">    
        <h1 class="text-2xl font-semibold mb-6">Administración de Equipos</h1>

        <table class="w-full border-collapse mb-6">
            <thead>
                <tr>
                    <th class="border p-2">#</th>
                    <th class="border p-2">Nombre del Equipo</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td class="border p-2">{{ $team->id }}</td>
                        <td class="border p-2">{{ $team->name }}</td>
                        <td class="border p-2">
                            <form action="{{ route('teams.show', $team->id) }}" method="get" class="inline">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-eye"></i> Ver
                                </button>
                            </form>

                            <form action="{{ route('teams.edit', $team->id) }}" method="get" class="inline">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                            </form>

                            <form action="{{ route('teams.destroy', $team->id) }}" method="post" class="inline">
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

        {{ $teams->links() }}

        <div class="mt-4">
            <a href="{{ route('teams.create')}}" class="text-blue-500">Crear Nuevo Equipo</a>
        </div>
    </div>
@endsection
