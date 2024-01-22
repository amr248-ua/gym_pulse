@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user()->webmaster)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Añadir instalacion</button>
            @endif
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva instalación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Tu formulario aquí -->
                            <form method="post" action="{{route('nueva_instalacion')}}" enctype="multipart/form-data">
                                @csrf
                                <!-- Campos del formulario -->
                                <input type="text" name="nombre" placeholder="Nombre" required>
                                <input type="number" min=1 name="plazas" placeholder="Plazas" required>
                                <input type="hidden" name="horario" value="9:00-22:00">
                                <input type="hidden" name="maxTiempo" value=60>
                                <input type="number" id="precio" name="precio" step="0.01" min="0" placeholder="Ingrese el precio" required>
                                <input type="file" name="imagen" accept="image/*">
                                <button type="submit" class="btn btn-success">Añadir</button>
                            </form>
                        </div>
                    </div>
                </div>
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
                            <td>
                                <span @if($instalacion->bloqueado) style="text-decoration: line-through; color: red;" @endif>
                                    {{ $instalacion->nombre }}
                                </span>
                            </td>
                            <td class="text-right">
                                @csrf
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{ $instalacion->id }}">Ver Detalles</button>
                                <form action="{{ route('bloquear_instalacion', ['id' => $instalacion->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <span @if($instalacion->bloqueado)>Desbloquear</span>@endif
                                        @if($instalacion->bloqueado==0)>Bloquear</span>@endif
                                    </button>
                                </form>

                                <!-- Modal Detalles -->
                                <div class="modal fade" id="exampleModal{{ $instalacion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalles de la instalación</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Tu formulario aquí -->
                                                <div class="col-md-12 text-center">
                                                    <div class="card text-white bg-dark mx-auto">
                                                        <img src="{{ asset($instalacion->imagen) }}" class="card-img-top img-fluid" alt="{{ $instalacion->nombre }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-3">{{ $instalacion->nombre }}</h5>
                                                            <p class="card-text">{{ $instalacion->descripcion }}</p>
                                                            @if($instalacion->bloqueado)
                                                                <p class="card-text">Instalación bloqueada</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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