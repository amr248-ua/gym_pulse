@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <a href="{{ route('agregar_instalacion') }}" class="btn btn-primary float-right">Añadir Instalación</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instalaciones as $instalacion)
                        <tr>
                            <td @if($instalacion->bloqueado) style="text-decoration: line-through; color: red;" @endif>
                                {{ $instalacion->nombre }}
                            </td>
                            <td>
                                <form action="{{ route('ver_detalle', ['id' => $instalacion->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm">Ver Detalles</button>
                                </form>
                                
                                <form action="{{ route('bloquear_instalacion', ['id' => $instalacion->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Bloquear</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $instalaciones->links() }}
            </div>
        </div>
    </div>
</div>
@endsection