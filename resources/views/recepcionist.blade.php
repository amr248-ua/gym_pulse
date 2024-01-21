@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="text-dark mb-4">Añadir saldo a un usuario</h2>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('recepcionIns.view') }}">
                <button class="btn btn-secondary" style="background-color: #DE0000; color: white; padding: 15px 30px; font-size: 1.25em; border: 2px solid white; border-radius: 10px; font-weight: bold; cursor: pointer;">
                    Instalaciones y Actividades
                </button>
            </a>
        </div>
    </div>
</div>

<div class="container-fluid mt-5 d-flex flex-column align-items-center" style="width: 700px; background-color: #000; color: #fff; padding: 20px; border-radius: 15px; position: relative;">
    <form class="d-flex" action="{{ route('buscarUsuario') }}" method="GET">
        <input class="form-control me-2" type="search" name="nombre_usuario" placeholder="Buscar usuario" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Buscar</button>
    </form>

    @if(isset($usuarios) && count($usuarios) > 0)
    <table class="table table-bordered mt-3" style="background-color: #fff; color: #000; width: 100%;">
        <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellidos</th>
                <th class="text-center">Usuario</th>
                <th class="text-center">Saldo Actual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td class="text-center">{{ $usuario->nombre }}</td>
                <td class="text-center">{{ $usuario->apellidos }}</td>
                <td class="text-center">{{ $usuario->usuario }}</td>
                <td class="text-center">
                    <form action="{{ route('actualizarSaldo', $usuario->id) }}" method="POST" class="d-flex flex-column align-items-center">
                        @csrf
                        @method('PUT')
                        <input style="width: 100px;" type="text" name="saldo_actual" value="{{ $usuario->saldo }}" class="form-control mx-auto mb-2"/>
                        <button class="btn btn-primary" type="submit">Actualizar Saldo</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $usuarios->links() }}
    </div>
    @endif
</div>
@endsection
