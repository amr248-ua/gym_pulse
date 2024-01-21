@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="text-dark mb-4">Cambiar precios de socios</h2>
        </div>
        <div class="col-12 d-flex justify-content-start">
            <a href="{{ route('recepcion.view') }}">
                <button class="btn btn-secondary" style="background-color: #DE0000; color: white; padding: 15px 30px; font-size: 1.25em; border: 2px solid white; border-radius: 10px; font-weight: bold; cursor: pointer;">
                    Saldo de usuarios
                </button>
            </a>
        </div>
    </div>
</div>

<div class="container-fluid mt-5 d-flex justify-content-between" style="width: 100%;">
    <div class="d-flex flex-column align-items-center" style="width: 48%; background-color: #000; color: #fff; padding: 20px; border-radius: 15px; position: relative;">
        <h3 class="text-center mb-3">Instalaciones</h3>
        <table class="table table-bordered text-center" style="width: 100%;">
            <thead>
                <tr>
                    <th>Instalación</th>
                    <th>Plazas</th>
                    <th>Precio socio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($instalaciones as $instalacion)
                    <tr>
                        <td>{{ $instalacion->nombre }}</td>
                        <td>{{ $instalacion->plazas }}</td>
                        <td>
                            <form action="{{ route('actualizar.precioIns', ['id' => $instalacion->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="text" name="precio_socio" value="{{ $instalacion->precio }}" class="text-center" />
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <div class="d-flex flex-column align-items-center" style="width: 48%; background-color: #000; color: #fff; padding: 20px; border-radius: 15px; position: relative;">
        <h3 class="text-center mb-3">Actividades</h3>
        <table class="table table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th>Actividad</th>
                    <th>Plazas</th>
                    <th>Precio socio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actividades as $actividad)
                    <tr>
                        <td>{{ $actividad->nombre }}</td>
                        <td>{{ $actividad->plazas }}</td>
                        <td>
                            <form action="{{ route('actualizar.precioAct', ['id' => $actividad->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="text" name="precio_socio" value="{{ $actividad->precio }}" class="text-center" />
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
