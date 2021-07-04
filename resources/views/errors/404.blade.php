@extends('errors.layout')
@section('content')
<div class="text-center">
    <h1 class="text-white display-1 font-weight-bold">404</h1>
    <p class="text-white mt-4 mb-4"><strong>Acceso denegado!</strong><br>  El recurso que buscas no existe.</p>
    <a href="{{url()->previous()}}" class="btn btn-outline-warning">Regresar</a>
</div>
@endsection