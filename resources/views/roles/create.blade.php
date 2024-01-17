@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Crear Nuevo Rol</h1>

        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nombre Del Rol:</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded w-full" required>
            </div>

              
            <div>

                <label for="permissions" class="block font-medium text-sm text-gray-700">Permisos De Creacion:</label>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex ">
                    @foreach($permissions as $permission)
                    @if(Str::contains($permission['name'], 'create'))
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                        <div class="flex items-center ps-3">
                            <input id="vue-checkbox-list" type="checkbox" name="permissions[]" value="{{ $permission['name'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="vue-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ $permission['display_name'] }}</label>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
                
            </div>

            <br>
            
            <div>
                
                <label for="permissions" class="block font-medium text-sm text-gray-700">Permisos De Edicion:</label>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex ">
                    @foreach($permissions as $permission)
                    @if(Str::contains($permission['name'], 'edit'))
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                        <div class="flex items-center ps-3">
                            <input id="vue-checkbox-list" type="checkbox" name="permissions[]" value="{{ $permission['name'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="vue-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ $permission['display_name'] }}</label>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
                
            </div>

            <br>
            
            <div>
                
                <label for="permissions" class="block font-medium text-sm text-gray-700">Permisos De Visualizacion:</label>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex ">
                    @foreach($permissions as $permission)
                    @if(Str::contains($permission['name'], 'show'))
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                        <div class="flex items-center ps-3">
                            <input id="vue-checkbox-list" type="checkbox" name="permissions[]" value="{{ $permission['name'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="vue-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ $permission['display_name'] }}</label>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
                
            </div>

            

            <br>


            <div>

                <label for="permissions" class="block font-medium text-sm text-gray-700">Permisos De Eliminación:</label>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex ">
                    @foreach($permissions as $permission)
                    @if(Str::contains($permission['name'], 'destroy'))
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                        <div class="flex items-center ps-3">
                            <input id="vue-checkbox-list" type="checkbox" name="permissions[]" value="{{ $permission['name'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="vue-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ $permission['display_name'] }}</label>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
                
            </div>

            <br>


            <div>

                <label for="permissions" class="block font-medium text-sm text-gray-700">Permisos De Navegación:</label>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex ">
                    @foreach($permissions as $permission)
                    @if(Str::contains($permission['name'], 'navbar'))
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                        <div class="flex items-center ps-3">
                            <input id="vue-checkbox-list" type="checkbox" name="permissions[]" value="{{ $permission['name'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="vue-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ $permission['display_name'] }}</label>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
                
            </div>

            {{-- 
                Selector de usuarios multiple (Innecesario?????)
                <div>
                <label for="users" class="block font-medium text-sm text-gray-700">Usuarios:</label>
                <select name="users[]" id="users" class="block w-full mt-1 p-2 border rounded" multiple>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div> --}}


            
            

            


                
            
            

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Guardar Tarea</button>
            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('roles.index') }}" class="text-blue-500">Volver a la Lista</a>
        </div>
    </div>
@endsection
