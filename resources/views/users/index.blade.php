@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">    
        <h1 class="text-2xl font-semibold mb-6">Administración de Usuarios</h1>

        <table class="w-full border-collapse mb-6">
            <thead>
                <tr>
                    <th class="border p-2">#</th>
                    <th class="border p-2">Usuario</th>
                    <th class="border p-2">Correo</th>
                    <th class="border p-2">Rol</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border p-2">{{ $user->id }}</td>
                        <td class="border p-2">{{ $user->name }}</td>
                        <td class="border p-2">{{ $user->email}}</td>
                        <td class="border p-2">{{ $user->team->name}}</td>
                        <td class="border p-2">
                            <!-- Botón para ver la actividad -->
                            <form action="{{ route('users.show', $user->id) }}" method="get" class="inline">
                                @csrf
                                {{-- @method('show') --}}
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-eye"></i> Ver
                                </button>
                            </form>

                            <!-- Botón para editar la actividad -->
                            <form action="{{ route('users.edit', $user->id) }}" method="get" class="inline">
                                @csrf
                                {{-- @method('edit') --}}
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                            </form>

                            <!-- Botón para eliminar la actividad -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="inline">
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

        {{ $users->links() }}

        <div class="mt-4">
            <a href="{{ route('users.create')}}" class="text-blue-500">Crear Nuevo Usuario</a>
        </div>
    </div>
@endsection