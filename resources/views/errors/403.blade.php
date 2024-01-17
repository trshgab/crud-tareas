@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">
    <h1 class="text-2xl font-semibold mb-6">Acceso no autorizado</h1>
    <p><i class="fa fa-circle-exclamation"></i> No tienes permisos para acceder a esta página.</p>
    <br>
    <a href="{{ url()->previous() }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Volver</a>
</div>
@endsection
