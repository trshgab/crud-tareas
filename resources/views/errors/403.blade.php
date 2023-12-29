@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow-md mx-auto w-5/6 mt-10">
    <h1 class="text-2xl font-semibold mb-6">Acceso no autorizado</h1>
    <p><i class="fa fa-circle-exclamation"></i> No tienes permisos para acceder a esta página.</p>
    <br>
    <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
</div>
@endsection
